<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\FundraiserSessionController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminHospitalController;
use App\Http\Controllers\Admin\AdminFundraiserController;
use App\Http\Controllers\Admin\AdminContributionController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    // Fetch featured or active fundraisers for the homepage
    $fundraisers = \App\Models\Fundraiser::where('status', \App\Models\Fundraiser::STATUS_ACTIVE)
        ->where('end_date', '>=', now())
        ->with('creator')
        ->orderBy('is_featured', 'desc')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    // Transform campaigns data for JavaScript
    $campaigns = $fundraisers->map(function($fundraiser) {
        $organizerName = $fundraiser->organizer_name ?? ($fundraiser->creator ? trim($fundraiser->creator->first_name . ' ' . $fundraiser->creator->last_name) : 'Anonymous');
        $location = $fundraiser->beneficiary_address ? ' • ' . $fundraiser->beneficiary_address : '';

        return [
            'id' => $fundraiser->id,
            'title' => $fundraiser->title,
            'organizer' => $organizerName . $location,
            'category' => $fundraiser->getCategoryDisplayName(),
            'raised' => (float) $fundraiser->current_amount,
            'goal' => (float) $fundraiser->goal_amount,
            'supporters' => $fundraiser->contributors_count ?? 0,
            'daysLeft' => max(0, $fundraiser->daysRemaining)
        ];
    });

    // Calculate stats for hero cards
    $totalActiveCampaigns = \App\Models\Fundraiser::where('status', \App\Models\Fundraiser::STATUS_ACTIVE)
        ->where('end_date', '>=', now())
        ->count();

    $urgentCampaigns = \App\Models\Fundraiser::where('status', \App\Models\Fundraiser::STATUS_ACTIVE)
        ->where('end_date', '>=', now())
        ->where('end_date', '<=', now()->addDays(7))
        ->count();

    $totalRaisedThisMonth = \App\Models\Fundraiser::where('status', \App\Models\Fundraiser::STATUS_ACTIVE)
        ->where('created_at', '>=', now()->startOfMonth())
        ->sum('current_amount');

    // Calculate total partner hospitals
    $totalPartnerHospitals = \App\Models\Hospital::where('is_active', true)->count();

    // Fetch active hospitals for the homepage
    $hospitalRecords = \App\Models\Hospital::where('is_active', true)
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();

    // Transform hospitals data for JavaScript
    $hospitals = $hospitalRecords->map(function($hospital) {
        return [
            'id' => $hospital->id,
            'name' => $hospital->name,
            'category' => $hospital->region ?? 'Hospital', // Using region as category for now
            'location' => $hospital->address . ', ' . $hospital->city,
            'region' => $hospital->region ?? 'Philippines',
            'phone' => $hospital->contact_number ?? 'N/A',
            'hours' => $hospital->operating_hours ?? 'Please contact for hours',
            'availability' => $hospital->is_active ? 'Available Today' : 'Contact for availability'
        ];
    });

    return view('welcome', compact('campaigns', 'totalActiveCampaigns', 'urgentCampaigns', 'totalRaisedThisMonth', 'totalPartnerHospitals', 'hospitals'));
})->name('home');

Route::get('/fundraisers', [FundraiserController::class, 'index'])->name('fundraisers.index');

// Redirect old .html URLs
Route::get('/fundraisers/fundraisers.html', function () {
    return redirect()->route('fundraisers.index');
});

// Create and success routes must come BEFORE {fundraiser} to avoid matching as an ID
Route::get('/fundraisers/create', function () {
    return redirect()->route('fundraisers.create.step1');
})->middleware(['auth', 'verified'])->name('fundraisers.create');

Route::get('/fundraisers/success', function () {
    return view('fundraisers.create.success');
})->middleware(['auth', 'verified'])->name('fundraisers.success');

Route::get('/fundraisers/{fundraiser}', [FundraiserController::class, 'show'])->name('fundraisers.show');

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard (Session 3)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', function () {
        $user = auth()->user();

        return view('profile.show', [
            'user' => $user,
            'totalDonations' => $user->total_donations,
            'totalLivesImpacted' => $user->total_lives_impacted,
            'totalContributions' => $user->total_contributions,
        ]);
    })->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Donation History
    Route::get('/history', function () {
        $user = auth()->user();

        // Get upcoming (pending) donations with appointments
        $scheduledDonations = $user->donations()
            ->with(['hospital:id,name,address,city', 'appointment'])
            ->where('status', 'pending')
            ->whereHas('appointment', function($query) {
                $query->where('appointment_date', '>=', now());
            })
            ->get()
            ->sortBy(function($donation) {
                return $donation->appointment->appointment_date ?? now();
            });

        // Get past (verified) donations
        $completedDonations = $user->donations()
            ->with('hospital:id,name,address,city')
            ->where('status', 'verified')
            ->orderBy('donation_date', 'desc')
            ->get();

        // Get fundraiser contributions
        $contributions = $user->contributions()
            ->with('fundraiser:id,title')
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate statistics
        $totalDonations = $user->donations()->count();
        $totalContributions = $contributions->sum('amount');
        $campaignsSupported = $contributions->pluck('fundraiser_id')->unique()->count();
        $memberSince = $user->created_at->format('M Y');

        // Calculate time as donor
        $accountAge = $user->created_at->diffForHumans(['parts' => 2]);

        // Gold Donor progress (20 donations = Gold status)
        $donationsToGold = max(0, 20 - $totalDonations);
        $goldProgress = min(100, ($totalDonations / 20) * 100);

        return view('history', compact(
            'scheduledDonations',
            'completedDonations',
            'contributions',
            'totalDonations',
            'totalContributions',
            'campaignsSupported',
            'memberSince',
            'accountAge',
            'donationsToGold',
            'goldProgress'
        ));
    })->name('history');

    // Redirects for old .html URLs (for backwards compatibility)
    Route::get('/donations/schedule-donation.html', function () {
        return redirect()->route('donations.schedule');
    });
    Route::get('/donations/schedule-donation-step2.html', function () {
        return redirect()->route('donations.step2');
    });
    Route::get('/donations/schedule-donation-step3.html', function () {
        return redirect()->route('donations.step3');
    });
    Route::get('/donations/schedule-donation-confirmation.html', function () {
        return redirect()->route('donations.confirmation');
    });

    // Schedule Donation Flow
    Route::get('/donations/schedule', [App\Http\Controllers\DonationController::class, 'schedule'])->name('donations.schedule');

    Route::get('/donations/schedule/step2', function () {
        return view('donations.step2');
    })->name('donations.step2');

    Route::get('/donations/schedule/step3', function () {
        return view('donations.step3');
    })->name('donations.step3');

    Route::get('/donations/confirmation', function () {
        return view('donations.confirmation');
    })->name('donations.confirmation');

    // Start Fundraiser Flow (Session-based multi-step)
    Route::prefix('fundraisers/create')->name('fundraisers.create.')->group(function () {
        Route::get('/step1', [FundraiserSessionController::class, 'step1'])->name('step1');
        Route::post('/step1', [FundraiserSessionController::class, 'storeStep1'])->name('step1.store');

        Route::get('/step2', [FundraiserSessionController::class, 'step2'])->name('step2');
        Route::post('/step2', [FundraiserSessionController::class, 'storeStep2'])->name('step2.store');

        Route::get('/step3', [FundraiserSessionController::class, 'step3'])->name('step3');
        Route::post('/step3', [FundraiserSessionController::class, 'storeStep3'])->name('step3.store');

        Route::get('/step4', [FundraiserSessionController::class, 'step4'])->name('step4');
        Route::post('/review', [FundraiserSessionController::class, 'review'])->name('review');
        Route::post('/submit', [FundraiserSessionController::class, 'submit'])->name('submit');

        Route::post('/clear-session', [FundraiserSessionController::class, 'clearSession'])->name('clearSession');
    });

    // Appointments (Session 1)
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::post('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');

    // Donations (Session 1)
    Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
    Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/donations/{donation}', [DonationController::class, 'show'])->name('donations.show');

    // Hospitals (Session 1)
    Route::get('/hospitals', [HospitalController::class, 'index'])->name('hospitals.index');
    Route::get('/hospitals/{hospital}', [HospitalController::class, 'show'])->name('hospitals.show');

    // Fundraisers (Session 2)
    Route::post('/fundraisers', [FundraiserController::class, 'store'])->name('fundraisers.store');
    Route::patch('/fundraisers/{fundraiser}', [FundraiserController::class, 'update'])->name('fundraisers.update');

    // Contributions (Session 2)
    Route::get('/contributions', [ContributionController::class, 'index'])->name('contributions.index');
    Route::post('/fundraisers/{fundraiser}/contributions', [ContributionController::class, 'store'])->name('contributions.store');
    Route::get('/contributions/{contribution}', [ContributionController::class, 'show'])->name('contributions.show');
    Route::post('/contributions/{contribution}/verify', [ContributionController::class, 'verify'])->name('contributions.verify');

    // Notifications (Session 3)
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Login Routes (Guest)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'login']);
    });

    // Admin Protected Routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('hospitals', AdminHospitalController::class)->only(['index', 'store', 'update', 'destroy']);

        // Donation Management
        Route::get('/donations', [App\Http\Controllers\Admin\AdminDonationController::class, 'index'])->name('donations.index');
        Route::post('/donations/{donation}/update-status', [App\Http\Controllers\Admin\AdminDonationController::class, 'updateStatus'])->name('donations.updateStatus');

        // Fundraising Management
        Route::get('/fundraising', [AdminFundraiserController::class, 'index'])->name('fundraising.index');
        Route::get('/fundraising/{fundraiser}', [AdminFundraiserController::class, 'show'])->name('fundraising.show');
        Route::post('/fundraising/{fundraiser}/update-status', [AdminFundraiserController::class, 'updateStatus'])->name('fundraising.updateStatus');
        Route::post('/fundraising/{fundraiser}/toggle-featured', [AdminFundraiserController::class, 'toggleFeatured'])->name('fundraising.toggleFeatured');
        Route::post('/contributions/{contribution}/verify', [AdminContributionController::class, 'verify'])->name('contributions.verify');
        Route::post('/contributions/{contribution}/reject', [AdminContributionController::class, 'reject'])->name('contributions.reject');

        // Settings Management
        Route::get('/settings', [App\Http\Controllers\Admin\AdminSettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings/general', [App\Http\Controllers\Admin\AdminSettingsController::class, 'updateGeneral'])->name('settings.updateGeneral');
        Route::post('/settings/password', [App\Http\Controllers\Admin\AdminSettingsController::class, 'updatePassword'])->name('settings.updatePassword');

        Route::post('/logout', [App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('logout');
    });
});

require __DIR__.'/auth.php';
