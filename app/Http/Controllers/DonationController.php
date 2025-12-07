<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\Hospital;
use App\Http\Requests\StoreDonationRequest;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function schedule()
    {
        $hospitals = Hospital::where('is_active', true)
            ->orderBy('name')
            ->get();

        // Pass hospitals with blood types as JSON for JavaScript
        $hospitalsJson = $hospitals->map(function ($hospital) {
            return [
                'id' => $hospital->id,
                'name' => $hospital->name,
                'city' => $hospital->city,
                'blood_types_available' => $hospital->blood_types_available ?? []
            ];
        });

        return view('donations.schedule', compact('hospitals', 'hospitalsJson'));
    }

    public function index(Request $request)
    {
        $query = BloodDonation::forUser(auth()->id())
            ->with(['hospital', 'appointment']);

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $donations = $query->orderBy('donation_date', 'desc')
            ->paginate(15);

        return view('donations.index', compact('donations'));
    }

    public function show(BloodDonation $donation)
    {
        if ($donation->user_id !== auth()->id()) {
            abort(403);
        }

        return view('donations.show', compact('donation'));
    }

    public function store(StoreDonationRequest $request)
    {
        $donation = BloodDonation::create([
            'user_id' => auth()->id(),
            'hospital_id' => $request->hospital_id,
            'appointment_id' => $request->appointment_id,
            'donation_date' => $request->donation_date,
            'blood_type' => auth()->user()->blood_type,
            'status' => 'completed',
            'notes' => $request->notes,
        ]);

        return redirect()->route('donations.index')
            ->with('success', 'Donation recorded successfully!');
    }
}
