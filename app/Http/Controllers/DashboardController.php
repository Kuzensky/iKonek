<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\FundraiserContribution;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $stats = [
            'total_donations' => $user->total_donations,
            'total_lives_impacted' => $user->total_lives_impacted,
            'total_contributions' => $user->total_contributions,
            'unread_notifications_count' => $user->unread_notifications_count,
        ];

        $nextAppointment = $user->next_appointment;

        $recentDonations = BloodDonation::where('user_id', $user->id)
            ->with('hospital')
            ->orderBy('donation_date', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($donation) {
                $donation->activity_type = 'donation';
                $donation->activity_date = $donation->donation_date;
                return $donation;
            });

        $recentContributions = FundraiserContribution::where('user_id', $user->id)
            ->with('fundraiser')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($contribution) {
                $contribution->activity_type = 'contribution';
                $contribution->activity_date = $contribution->created_at;
                return $contribution;
            });

        $recentActivity = $recentDonations
            ->concat($recentContributions)
            ->sortByDesc('activity_date')
            ->take(5);

        return view('dashboard', compact('stats', 'nextAppointment', 'recentActivity'));
    }

    public function getStats()
    {
        $user = auth()->user();

        return response()->json([
            'total_donations' => $user->total_donations,
            'total_lives_impacted' => $user->total_lives_impacted,
            'total_contributions' => $user->total_contributions,
            'unread_notifications_count' => $user->unread_notifications_count,
        ]);
    }

    public function getActivity()
    {
        $user = auth()->user();

        $recentDonations = BloodDonation::where('user_id', $user->id)
            ->with('hospital')
            ->orderBy('donation_date', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($donation) {
                return [
                    'type' => 'donation',
                    'date' => $donation->donation_date,
                    'hospital' => $donation->hospital->name,
                    'status' => $donation->status,
                    'lives_impacted' => $donation->lives_impacted,
                ];
            });

        $recentContributions = FundraiserContribution::where('user_id', $user->id)
            ->with('fundraiser')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($contribution) {
                return [
                    'type' => 'contribution',
                    'date' => $contribution->created_at,
                    'fundraiser' => $contribution->fundraiser->title,
                    'amount' => $contribution->amount,
                    'status' => $contribution->status,
                ];
            });

        $activity = $recentDonations
            ->concat($recentContributions)
            ->sortByDesc('date')
            ->take(5)
            ->values();

        return response()->json($activity);
    }
}
