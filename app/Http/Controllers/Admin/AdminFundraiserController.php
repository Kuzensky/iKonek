<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fundraiser;
use App\Models\FundraiserContribution;
use Illuminate\Http\Request;

class AdminFundraiserController extends Controller
{
    public function index(Request $request)
    {
        // Determine active tab
        $activeTab = $request->get('tab', 'campaigns');

        // Calculate stats
        $stats = [
            'total_campaigns' => Fundraiser::count(),
            'active_campaigns' => Fundraiser::where('status', Fundraiser::STATUS_ACTIVE)->count(),
            'pending_campaigns' => Fundraiser::where('status', Fundraiser::STATUS_PENDING_REVIEW)->count(),
            'total_raised' => Fundraiser::sum('current_amount'),
        ];

        // Campaigns Tab
        $campaignsQuery = Fundraiser::with('creator')
            ->orderBy('created_at', 'desc');

        // Apply filters for campaigns
        if ($request->filled('search')) {
            $campaignsQuery->search($request->search);
        }

        if ($request->filled('status')) {
            $campaignsQuery->byStatus($request->status);
        }

        if ($request->filled('category')) {
            $campaignsQuery->byCategory($request->category);
        }

        $campaigns = $campaignsQuery->paginate(10, ['*'], 'campaigns_page');

        // Donations Tab
        $donationsQuery = FundraiserContribution::with(['fundraiser', 'user'])
            ->orderBy('created_at', 'desc');

        // Apply filters for donations
        if ($request->filled('donation_search')) {
            $donationsQuery->whereHas('user', function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->donation_search}%")
                  ->orWhere('last_name', 'like', "%{$request->donation_search}%")
                  ->orWhere('email', 'like', "%{$request->donation_search}%");
            });
        }

        if ($request->filled('donation_status')) {
            $donationsQuery->where('status', $request->donation_status);
        }

        $donations = $donationsQuery->paginate(10, ['*'], 'donations_page');

        // Get status and category options for filters
        $statuses = [
            Fundraiser::STATUS_DRAFT => 'Draft',
            Fundraiser::STATUS_PENDING_REVIEW => 'Pending Review',
            Fundraiser::STATUS_ACTIVE => 'Active',
            Fundraiser::STATUS_COMPLETED => 'Completed',
            Fundraiser::STATUS_CANCELLED => 'Cancelled',
            Fundraiser::STATUS_SUSPENDED => 'Suspended',
        ];

        $categories = [
            Fundraiser::CATEGORY_MEDICAL => 'Medical',
            Fundraiser::CATEGORY_DISASTER => 'Disaster Relief',
            Fundraiser::CATEGORY_EDUCATION => 'Education',
            Fundraiser::CATEGORY_COMMUNITY => 'Community',
            Fundraiser::CATEGORY_OTHER => 'Other',
        ];

        $donationStatuses = [
            'pending' => 'Pending',
            'verified' => 'Verified',
            'rejected' => 'Rejected',
        ];

        return view('admin.fundraising.index', compact(
            'activeTab',
            'stats',
            'campaigns',
            'donations',
            'statuses',
            'categories',
            'donationStatuses'
        ));
    }

    public function show(Fundraiser $fundraiser)
    {
        $fundraiser->load(['creator', 'contributions']);

        // Return JSON for AJAX requests
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'id' => $fundraiser->id,
                'title' => $fundraiser->title,
                'description' => $fundraiser->description,
                'story' => $fundraiser->story,
                'status' => $fundraiser->status,
                'status_display' => $fundraiser->getStatusDisplayName(),
                'status_badge_class' => $fundraiser->getStatusBadgeClass(),
                'category' => $fundraiser->category,
                'category_display' => $fundraiser->getCategoryDisplayName(),
                'category_badge_class' => $fundraiser->getCategoryBadgeClass(),
                'goal_amount' => $fundraiser->goal_amount,
                'goal_amount_formatted' => number_format($fundraiser->goal_amount, 0),
                'current_amount' => $fundraiser->current_amount,
                'current_amount_formatted' => number_format($fundraiser->current_amount, 0),
                'progress_percentage' => round($fundraiser->progress_percentage, 1),
                'contributors_count' => $fundraiser->verifiedContributions()->distinct('user_id')->count('user_id'),
                'beneficiary_name' => $fundraiser->beneficiary_name,
                'beneficiary_contact' => $fundraiser->beneficiary_contact,
                'beneficiary_address' => $fundraiser->beneficiary_address,
                'start_date' => $fundraiser->start_date->format('M d, Y'),
                'end_date' => $fundraiser->end_date->format('M d, Y'),
                'created_date' => $fundraiser->created_at->format('Y-m-d'),
                'deadline' => $fundraiser->end_date->format('Y-m-d'),
                'is_featured' => $fundraiser->is_featured,
                'creator_name' => $fundraiser->creator->name ?? trim($fundraiser->creator->first_name . ' ' . $fundraiser->creator->last_name),
                'creator_email' => $fundraiser->creator->email ?? '',
                'created_at' => $fundraiser->created_at->format('M d, Y'),
            ]);
        }

        return view('admin.fundraising.show', compact('fundraiser'));
    }

    public function updateStatus(Request $request, Fundraiser $fundraiser)
    {
        $request->validate([
            'status' => 'required|in:active,completed,suspended,cancelled',
            'notes' => 'nullable|string|max:1000',
        ]);

        $oldStatus = $fundraiser->status;
        $newStatus = $request->status;

        // Validation checks
        if ($newStatus === Fundraiser::STATUS_ACTIVE && !$fundraiser->canBeActivated()) {
            return redirect()->back()->with('error', 'This campaign cannot be activated in its current state.');
        }

        if ($newStatus === Fundraiser::STATUS_SUSPENDED && !$fundraiser->canBeSuspended()) {
            return redirect()->back()->with('error', 'Only active campaigns can be suspended.');
        }

        if ($newStatus === Fundraiser::STATUS_COMPLETED && !$fundraiser->canBeCompleted()) {
            return redirect()->back()->with('error', 'Only active or suspended campaigns can be marked as completed.');
        }

        if ($newStatus === Fundraiser::STATUS_CANCELLED && !$fundraiser->canBeCancelled()) {
            return redirect()->back()->with('error', 'This campaign cannot be cancelled in its current state.');
        }

        $fundraiser->status = $newStatus;

        // Append notes if provided
        if ($request->notes) {
            $timestamp = now()->format('Y-m-d H:i:s');
            $adminName = auth()->guard('admin')->user()->name;
            $noteEntry = "\n[{$timestamp}] Status changed from {$oldStatus} to {$newStatus} by {$adminName}: {$request->notes}";
            $fundraiser->notes = ($fundraiser->notes ?? '') . $noteEntry;
        }

        $fundraiser->save();

        // Dispatch real-time events
        event(new \App\Events\CampaignStatusChanged($fundraiser, $oldStatus, $newStatus, $request->notes));

        if ($newStatus === Fundraiser::STATUS_ACTIVE) {
            event(new \App\Events\PlatformStatsUpdated());
        }

        event(new \App\Events\AdminDashboardStatsUpdated());

        // Send email notifications
        if ($newStatus === Fundraiser::STATUS_ACTIVE) {
            $fundraiser->creator->notify(new \App\Notifications\CampaignApprovedNotification($fundraiser));
        } elseif (in_array($newStatus, [Fundraiser::STATUS_SUSPENDED, Fundraiser::STATUS_CANCELLED])) {
            $fundraiser->creator->notify(new \App\Notifications\CampaignRejectedNotification($fundraiser, $request->notes));
        }

        return redirect()->route('admin.fundraising.index')
            ->with('success', "Campaign status updated to " . $fundraiser->getStatusDisplayName());
    }

    public function toggleFeatured(Fundraiser $fundraiser)
    {
        $isFeatured = $fundraiser->toggleFeatured();

        // Broadcast featured campaign change to all visitors
        event(new \App\Events\CampaignFeaturedToggled($fundraiser));

        $message = $isFeatured
            ? 'Campaign has been marked as featured.'
            : 'Campaign has been removed from featured.';

        return redirect()->back()->with('success', $message);
    }
}
