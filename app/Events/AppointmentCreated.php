<?php

namespace App\Events;

use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppointmentCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $appointment;

    /**
     * Create a new event instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;

        // Create notification for the user
        Notification::createForUser(
            $appointment->user_id,
            'appointment_reminder',
            'Appointment Confirmed',
            "Your blood donation appointment at {$appointment->hospital->name} is confirmed for " .
            $appointment->appointment_date->format('F j, Y \a\t g:i A') . "."
        );
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.' . $this->appointment->user_id),
        ];
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'appointment_id' => $this->appointment->id,
            'hospital' => $this->appointment->hospital->name,
            'date' => $this->appointment->appointment_date->format('F j, Y'),
            'time' => $this->appointment->appointment_date->format('g:i A'),
            'confirmation_code' => $this->appointment->confirmation_code,
        ];
    }
}
