<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminHospitalController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/fundraisers', [FundraiserController::class, 'index'])->name('fundraisers.index');

// Redirect old .html URLs
Route::get('/fundraisers/fundraisers.html', function () {
    return redirect()->route('fundraisers.index');
});

Route::get('/fundraisers/{fundraiser}', [FundraiserController::class, 'show'])->name('fundraisers.show');

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard (Session 3)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Donation History
    Route::get('/history', function () {
        return view('history');
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
    Route::get('/donations/schedule', function () {
        return view('donations.schedule');
    })->name('donations.schedule');

    Route::get('/donations/schedule/step2', function () {
        return view('donations.step2');
    })->name('donations.step2');

    Route::get('/donations/schedule/step3', function () {
        return view('donations.step3');
    })->name('donations.step3');

    Route::get('/donations/confirmation', function () {
        return view('donations.confirmation');
    })->name('donations.confirmation');

    // Start Fundraiser Flow
    Route::get('/fundraisers/create', function () {
        return view('fundraisers.create.step1');
    })->name('fundraisers.create');

    Route::get('/fundraisers/create/step2', function () {
        return view('fundraisers.create.step2');
    })->name('fundraisers.create.step2');

    Route::get('/fundraisers/create/step3', function () {
        return view('fundraisers.create.step3');
    })->name('fundraisers.create.step3');

    Route::get('/fundraisers/create/step4', function () {
        return view('fundraisers.create.step4');
    })->name('fundraisers.create.step4');

    Route::get('/fundraisers/success', function () {
        return view('fundraisers.create.success');
    })->name('fundraisers.success');

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
        Route::resource('hospitals', AdminHospitalController::class)->except(['show']);
        Route::post('/logout', [App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('logout');
    });
});

require __DIR__.'/auth.php';
