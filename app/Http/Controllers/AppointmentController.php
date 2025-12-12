<?php

namespace App\Http\Controllers;

use App\Events\AppointmentCreated;
use App\Events\AppointmentCancelled;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\BloodDonation;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::forUser(auth()->id())
            ->with('hospital')
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create([
            'user_id' => auth()->id(),
            'hospital_id' => $request->hospital_id,
            'appointment_date' => $request->appointment_date,
            'end_time' => $request->end_time,
            'status' => 'confirmed',
            'notes' => $request->notes,
        ]);

        // Automatically create a pending BloodDonation record
        BloodDonation::create([
            'user_id' => auth()->id(),
            'hospital_id' => $request->hospital_id,
            'appointment_id' => $appointment->id,
            'donation_date' => $request->appointment_date,
            'blood_type' => auth()->user()->blood_type ?? 'Unknown',
            'status' => BloodDonation::STATUS_PENDING,
            'notes' => 'Scheduled appointment - awaiting completion',
        ]);

        // Load hospital relationship for response
        $appointment->load('hospital');

        // Broadcast event
        event(new AppointmentCreated($appointment));

        // Return JSON for AJAX requests
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Appointment scheduled successfully!',
                'appointment' => $appointment
            ], 201);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Appointment scheduled successfully!');
    }

    public function show(Appointment $appointment)
    {
        if ($appointment->user_id !== auth()->id()) {
            abort(403);
        }

        $appointment->load('hospital', 'user');

        return view('appointments.show', compact('appointment'));
    }

    public function cancel(Appointment $appointment)
    {
        if ($appointment->user_id !== auth()->id()) {
            abort(403);
        }

        $appointment->cancel();

        // Also mark the corresponding BloodDonation as cancelled
        $bloodDonation = BloodDonation::where('appointment_id', $appointment->id)->first();
        if ($bloodDonation) {
            $bloodDonation->update([
                'status' => BloodDonation::STATUS_CANCELLED,
                'notes' => ($bloodDonation->notes ? $bloodDonation->notes . "\n\n" : '') . 'Appointment cancelled by user on ' . now()->format('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Appointment cancelled successfully.');
    }
}
