<?php

namespace App\Http\Controllers;

use App\Events\AppointmentCreated;
use App\Events\AppointmentCancelled;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
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

        // Broadcast event
        event(new AppointmentCreated($appointment));

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

        return redirect()->route('dashboard')
            ->with('success', 'Appointment cancelled successfully.');
    }
}
