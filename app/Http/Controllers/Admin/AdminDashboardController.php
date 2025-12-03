<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Hospital;
use App\Models\BloodDonation;
use App\Models\FundraiserContribution;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_donors' => User::count(),
            'total_users' => User::count(),
            'active_hospitals' => Hospital::where('is_active', true)->count(),
            'total_raised' => FundraiserContribution::where('status', 'verified')->sum('amount'),
            'verified_donations' => BloodDonation::where('status', 'verified')->count(),
            'pending_donations' => BloodDonation::where('status', 'pending')->count(),
            'failed_donations' => BloodDonation::where('status', 'rejected')->count(),
        ];

        // Get monthly blood donations for chart
        $monthlyDonations = BloodDonation::selectRaw('EXTRACT(MONTH FROM donation_date) as month, COUNT(*) as count')
            ->whereRaw('EXTRACT(YEAR FROM donation_date) = ?', [date('Y')])
            ->groupByRaw('EXTRACT(MONTH FROM donation_date)')
            ->pluck('count', 'month')
            ->toArray();

        // Get blood type distribution
        $bloodTypeDistribution = User::selectRaw('blood_type, COUNT(*) as count')
            ->whereNotNull('blood_type')
            ->groupBy('blood_type')
            ->pluck('count', 'blood_type')
            ->toArray();

        // Get top partner hospitals
        $topHospitals = Hospital::withCount('donations')
            ->orderBy('donations_count', 'desc')
            ->limit(5)
            ->get();

        // Get recent blood donations
        $recentDonations = BloodDonation::with(['user', 'hospital'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'monthlyDonations',
            'bloodTypeDistribution',
            'topHospitals',
            'recentDonations'
        ));
    }
}
