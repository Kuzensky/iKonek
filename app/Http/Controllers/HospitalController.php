<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(Request $request)
    {
        $query = Hospital::active();

        // Search by city
        if ($request->has('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        $hospitals = $query->orderBy('name')->get();

        return view('hospitals.index', compact('hospitals'));
    }

    public function show(Hospital $hospital)
    {
        return view('hospitals.show', compact('hospital'));
    }

    public function apiIndex()
    {
        $hospitals = Hospital::where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'city', 'region', 'status', 'is_active', 'blood_types_available']);

        return response()->json([
            'hospitals' => $hospitals
        ]);
    }
}
