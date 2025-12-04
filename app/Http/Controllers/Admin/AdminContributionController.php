<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FundraiserContribution;
use Illuminate\Http\Request;

class AdminContributionController extends Controller
{
    public function verify(Request $request, FundraiserContribution $contribution)
    {
        if ($contribution->status === 'verified') {
            return redirect()->back()->with('error', 'Contribution is already verified');
        }

        if ($contribution->status === 'rejected') {
            return redirect()->back()->with('error', 'Cannot verify a rejected contribution');
        }

        $contribution->status = 'verified';
        $contribution->verified_at = now();
        $contribution->verified_by = auth()->guard('admin')->id();
        $contribution->save();

        // The FundraiserContribution model's boot method will automatically
        // update the fundraiser's current_amount

        return redirect()->route('admin.fundraising.index', ['tab' => 'donations'])
            ->with('success', 'Contribution verified successfully');
    }

    public function reject(Request $request, FundraiserContribution $contribution)
    {
        $request->validate([
            'notes' => 'required|string|max:500',
        ], [
            'notes.required' => 'Please provide a reason for rejection',
        ]);

        if ($contribution->status === 'verified') {
            return redirect()->back()->with('error', 'Cannot reject a verified contribution');
        }

        if ($contribution->status === 'rejected') {
            return redirect()->back()->with('error', 'Contribution is already rejected');
        }

        $contribution->status = 'rejected';
        $contribution->notes = $request->notes;
        $contribution->verified_by = auth()->guard('admin')->id();
        $contribution->verified_at = now();
        $contribution->save();

        return redirect()->route('admin.fundraising.index', ['tab' => 'donations'])
            ->with('success', 'Contribution rejected');
    }
}
