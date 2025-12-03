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
}
