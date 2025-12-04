<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Hospital;
use App\Models\BloodDonation;
use App\Models\Fundraiser;
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

        // Get fundraising analytics
        $fundraisingAnalytics = $this->getFundraisingAnalytics();

        return view('admin.dashboard', compact(
            'stats',
            'monthlyDonations',
            'bloodTypeDistribution',
            'topHospitals',
            'recentDonations',
            'fundraisingAnalytics'
        ));
    }

    private function getFundraisingAnalytics()
    {
        // Calculate Total Donors (unique verified contributors)
        $totalDonors = \DB::table('fundraiser_contributions')
            ->where('status', 'verified')
            ->selectRaw('COUNT(DISTINCT user_id) as count')
            ->value('count') ?? 0;

        $totalDonorsLastMonth = \DB::table('fundraiser_contributions')
            ->where('status', 'verified')
            ->where('verified_at', '<', now()->startOfMonth())
            ->selectRaw('COUNT(DISTINCT user_id) as count')
            ->value('count') ?? 0;

        $donorsGrowth = $totalDonorsLastMonth > 0
            ? (($totalDonors - $totalDonorsLastMonth) / $totalDonorsLastMonth) * 100
            : 0;

        // Calculate Total Contributions This Week (all statuses)
        $contributionsThisWeek = FundraiserContribution::where('created_at', '>=', now()->startOfWeek())
            ->count();

        // Calculate Active Campaigns
        $activeCampaigns = Fundraiser::where('status', 'active')
            ->where('end_date', '>=', now())
            ->count();

        $pendingCampaigns = Fundraiser::where('status', 'pending_review')->count();

        // Calculate Total Raised
        $totalRaised = FundraiserContribution::where('status', 'verified')->sum('amount');

        $totalRaisedLastMonth = FundraiserContribution::where('status', 'verified')
            ->where('verified_at', '<', now()->startOfMonth())
            ->sum('amount');

        $raisedGrowth = $totalRaisedLastMonth > 0
            ? (($totalRaised - $totalRaisedLastMonth) / $totalRaisedLastMonth) * 100
            : 0;

        // Get Monthly Fundraising Data (last 6 months)
        $monthlyFundraising = FundraiserContribution::selectRaw('
                EXTRACT(YEAR FROM verified_at) as year,
                EXTRACT(MONTH FROM verified_at) as month,
                SUM(amount) as total_amount
            ')
            ->where('status', 'verified')
            ->where('verified_at', '>=', now()->subMonths(6)->startOfMonth())
            ->whereNotNull('verified_at')
            ->groupByRaw('EXTRACT(YEAR FROM verified_at), EXTRACT(MONTH FROM verified_at)')
            ->orderByRaw('EXTRACT(YEAR FROM verified_at), EXTRACT(MONTH FROM verified_at)')
            ->get();

        // Create a map of monthly data
        $monthlyMap = [];
        foreach ($monthlyFundraising as $item) {
            $key = sprintf('%04d-%02d', $item->year, $item->month);
            $monthlyMap[$key] = $item->total_amount;
        }

        // Fill in missing months with zeros
        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $key = $date->format('Y-m');
            $monthlyData[] = [
                'month' => $date->format('M'),
                'amount' => $monthlyMap[$key] ?? 0
            ];
        }

        // Get Category Statistics
        $categoryStats = Fundraiser::selectRaw('
                category,
                COUNT(*) as campaign_count,
                SUM(current_amount) as total_raised
            ')
            ->whereIn('status', ['active', 'completed'])
            ->groupBy('category')
            ->get();

        $totalCategoryRaised = $categoryStats->sum('total_raised');

        $categoryData = [];
        $categoryColorMap = [
            'medical' => 'pink',
            'disaster_relief' => 'blue',
            'education' => 'purple',
            'community' => 'green'
        ];

        $categoryDisplayNames = [
            'medical' => 'Medical Emergency',
            'disaster_relief' => 'Disaster Relief',
            'education' => 'Educational Support',
            'community' => 'Community Projects'
        ];

        foreach (['medical', 'disaster_relief', 'education', 'community'] as $category) {
            $stat = $categoryStats->firstWhere('category', $category);
            $categoryData[] = [
                'category' => $category,
                'display_name' => $categoryDisplayNames[$category],
                'total_raised' => $stat->total_raised ?? 0,
                'campaign_count' => $stat->campaign_count ?? 0,
                'percentage' => $totalCategoryRaised > 0
                    ? (($stat->total_raised ?? 0) / $totalCategoryRaised) * 100
                    : 0,
                'icon_color' => $categoryColorMap[$category]
            ];
        }

        // Get Recent Campaigns
        $recentCampaigns = Fundraiser::with([
                'creator:id,first_name,last_name,email',
                'contributions'
            ])
            ->whereIn('status', ['active', 'pending_review'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function($campaign) {
                // Calculate unique donor count using COUNT(DISTINCT)
                $donorCount = \DB::table('fundraiser_contributions')
                    ->where('fundraiser_id', $campaign->id)
                    ->where('status', 'verified')
                    ->selectRaw('COUNT(DISTINCT user_id) as count')
                    ->value('count') ?? 0;

                return [
                    'id' => $campaign->id,
                    'title' => $campaign->title,
                    'creator_name' => $campaign->creator->first_name . ' ' . $campaign->creator->last_name,
                    'goal_amount' => $campaign->goal_amount,
                    'current_amount' => $campaign->current_amount,
                    'progress_percentage' => $campaign->goal_amount > 0
                        ? min(($campaign->current_amount / $campaign->goal_amount) * 100, 100)
                        : 0,
                    'donor_count' => $donorCount,
                    'status' => $campaign->status,
                    'category' => $campaign->category
                ];
            });

        return [
            'stats' => [
                'total_donors' => [
                    'value' => $totalDonors,
                    'growth' => $donorsGrowth,
                    'comparison' => 'vs last month'
                ],
                'contributions_this_week' => [
                    'value' => $contributionsThisWeek,
                    'period' => 'This week'
                ],
                'active_campaigns' => [
                    'value' => $activeCampaigns,
                    'pending' => $pendingCampaigns
                ],
                'total_raised' => [
                    'value' => $totalRaised,
                    'growth' => $raisedGrowth
                ]
            ],
            'monthlyData' => $monthlyData,
            'categoryData' => $categoryData,
            'recentCampaigns' => $recentCampaigns
        ];
    }
}
