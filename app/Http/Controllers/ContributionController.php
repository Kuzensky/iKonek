<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContributionRequest;
use App\Models\Fundraiser;
use App\Models\FundraiserContribution;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function index()
    {
        $contributions = FundraiserContribution::forUser(auth()->id())
            ->with('fundraiser')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('contributions.index', compact('contributions'));
    }

    public function store(StoreContributionRequest $request, Fundraiser $fundraiser)
    {
        $contribution = FundraiserContribution::create([
            'fundraiser_id' => $fundraiser->id,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'reference_number' => $request->reference_number,
            'notes' => $request->notes,
        ]);

        return redirect()->route('fundraisers.show', $fundraiser)
            ->with('success', 'Thank you for your contribution! It will be verified shortly.');
    }

    public function show(FundraiserContribution $contribution)
    {
        if ($contribution->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('contributions.show', compact('contribution'));
    }

    public function verify(FundraiserContribution $contribution)
    {
        $contribution->update([
            'status' => 'verified',
            'verified_by' => auth()->id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Contribution verified successfully!');
    }
}
