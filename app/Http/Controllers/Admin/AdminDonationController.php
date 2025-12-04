<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodDonation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDonationController extends Controller
{
    /**
     * Display the donation management page with tabs.
     */
    public function index(Request $request)
    {
        // Donation tab filters
        $search = $request->get('search');
        $status = $request->get('status');
        $bloodType = $request->get('blood_type');

        // Get donations with relationships
        $donations = BloodDonation::with(['user', 'hospital', 'appointment'])
            ->search($search)
            ->byStatus($status)
            ->byBloodType($bloodType)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // Calculate stats
        $stats = [
            'total_users' => User::count(),
            'active_users' => User::whereNotNull('email_verified_at')
                ->orWhereHas('donations', function($q) {
                    $q->where('donation_date', '>=', now()->subMonths(6));
                })
                ->count(),
            'total_donations' => BloodDonation::count(),
            'pending_donations' => BloodDonation::pending()->count(),
        ];

        // User tab filters
        $userSearch = $request->get('user_search');
        $verificationStatus = $request->get('verification_status');
        $userBloodType = $request->get('user_blood_type');

        $users = User::query();

        // Search by name or email
        if ($userSearch) {
            $users->where(function($q) use ($userSearch) {
                $q->where('first_name', 'like', "%{$userSearch}%")
                  ->orWhere('last_name', 'like', "%{$userSearch}%")
                  ->orWhere('email', 'like', "%{$userSearch}%");
            });
        }

        // Filter by verification status
        if ($verificationStatus === 'verified') {
            $users->whereNotNull('email_verified_at');
        } elseif ($verificationStatus === 'unverified') {
            $users->whereNull('email_verified_at');
        }

        // Filter by blood type
        if ($userBloodType && $userBloodType !== '' && $userBloodType !== 'all') {
            $users->where('blood_type', $userBloodType);
        }

        $users = $users->withCount(['donations' => function($query) {
            $query->where('status', 'verified');
        }])
        ->orderBy('created_at', 'desc')
        ->paginate(15, ['*'], 'users_page');

        return view('admin.donations.index', compact('donations', 'stats', 'users'));
    }

    /**
     * Update the status of a donation.
     */
    public function updateStatus(Request $request, BloodDonation $donation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,verified,failed,cancelled',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Update status
        $donation->status = $validated['status'];

        // Append notes if provided (don't overwrite existing notes)
        if (!empty($validated['notes'])) {
            $existingNotes = $donation->notes ? $donation->notes . "\n\n" : '';
            $timestamp = now()->format('Y-m-d H:i:s');
            $statusLabel = $donation->getStatusDisplayName();
            $donation->notes = $existingNotes . "[{$timestamp}] Status updated to {$statusLabel}: {$validated['notes']}";
        }

        // Set donation_date when verified (if not already set)
        if ($validated['status'] === 'verified' && !$donation->donation_date) {
            $donation->donation_date = now();
        }

        $donation->save();

        return redirect()
            ->route('admin.donations.index')
            ->with('success', 'Donation status updated successfully.');
    }
}
