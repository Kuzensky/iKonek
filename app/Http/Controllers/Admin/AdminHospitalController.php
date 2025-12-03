<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;

class AdminHospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');
        $region = $request->get('region');

        $hospitals = Hospital::query()
            ->search($search)
            ->byStatus($status)
            ->byRegion($region)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $stats = [
            'total' => Hospital::count(),
            'blood_banks' => Hospital::whereNotNull('blood_types_available')
                ->whereRaw("blood_types_available::text != '[]'")
                ->count(),
            'pending' => Hospital::pending()->count(),
            'total_capacity' => Hospital::sum('bed_capacity'),
        ];

        $regions = Hospital::select('region')
            ->distinct()
            ->orderBy('region')
            ->pluck('region');

        return view('admin.hospitals.index', compact('hospitals', 'stats', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'operating_hours' => 'nullable|string|max:255',
            'blood_types_available' => 'nullable|array',
            'blood_types_available.*' => 'in:O+,O-,A+,A-,B+,B-,AB+,AB-',
            'bed_capacity' => 'nullable|integer|min:0',
            'monthly_capacity' => 'nullable|integer|min:0',
            'status' => 'required|in:active,pending,inactive',
        ]);

        // Sync is_active with status for backwards compatibility
        $validated['is_active'] = $validated['status'] === 'active';

        Hospital::create($validated);

        return redirect()
            ->route('admin.hospitals.index')
            ->with('success', 'Hospital created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'operating_hours' => 'nullable|string|max:255',
            'blood_types_available' => 'nullable|array',
            'blood_types_available.*' => 'in:O+,O-,A+,A-,B+,B-,AB+,AB-',
            'bed_capacity' => 'nullable|integer|min:0',
            'monthly_capacity' => 'nullable|integer|min:0',
            'status' => 'required|in:active,pending,inactive',
        ]);

        // Sync is_active with status for backwards compatibility
        $validated['is_active'] = $validated['status'] === 'active';

        $hospital->update($validated);

        return redirect()
            ->route('admin.hospitals.index')
            ->with('success', 'Hospital updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        // Check if hospital has relationships
        if ($hospital->appointments()->count() > 0 || $hospital->donations()->count() > 0) {
            return back()->with('error', 'Cannot delete hospital with existing appointments or donations.');
        }

        $hospital->delete();

        return redirect()
            ->route('admin.hospitals.index')
            ->with('success', 'Hospital deleted successfully.');
    }
}
