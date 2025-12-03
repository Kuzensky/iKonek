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

        return view('fundraisers', compact('fundraisers'));
    }

    public function store(StoreFundraiserRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['status'] = 'active';

        $fundraiser = Fundraiser::create($data);

        return redirect()->route('fundraisers.show', $fundraiser)
            ->with('success', 'Fundraiser created successfully!');
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
