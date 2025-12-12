<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundraiserRequest;
use App\Models\Fundraiser;
use Illuminate\Http\Request;

class FundraiserController extends Controller
{
    public function index(Request $request)
    {
        $query = Fundraiser::active()->with('creator');

        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }

        if ($request->has('search')) {
            $query->search($request->search);
        }

        $fundraisers = $query->orderBy('created_at', 'desc')
            ->paginate(12);

        // Fetch user's own campaigns (all statuses)
        $myCampaigns = auth()->check()
            ? Fundraiser::where('user_id', auth()->id())
                ->orderBy('created_at', 'desc')
                ->get()
            : collect();

        return view('fundraisers', compact('fundraisers', 'myCampaigns'));
    }

    public function store(StoreFundraiserRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending'; // Set to pending for admin approval
        $data['current_amount'] = 0; // Initialize current amount
        $data['is_featured'] = false; // Not featured by default

        $fundraiser = Fundraiser::create($data);

        // Dispatch events for real-time updates
        event(new \App\Events\PlatformStatsUpdated());
        event(new \App\Events\AdminDashboardStatsUpdated());

        // Send notification to user
        $fundraiser->creator->notify(
            new \App\Notifications\CampaignSubmittedNotification($fundraiser)
        );

        return redirect()->route('fundraisers.success')
            ->with('success', 'Your fundraiser has been submitted for review!');
    }

    public function show(Fundraiser $fundraiser)
    {
        $fundraiser->load(['creator', 'verifiedContributions.user']);

        return view('campaigns.show', compact('fundraiser'));
    }

    public function update(StoreFundraiserRequest $request, Fundraiser $fundraiser)
    {
        if ($fundraiser->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $fundraiser->update($request->validated());

        return redirect()->route('fundraisers.show', $fundraiser)
            ->with('success', 'Fundraiser updated successfully!');
    }
}
