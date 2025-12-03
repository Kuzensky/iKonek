<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppointmentCancelled implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $appointmentId;
    public $userId;

    /**
     * Create a new event instance.
     */
    public function __construct($appointment)
    {
        $this->appointmentId = $appointment->id;
        $this->userId = $appointment->user_id;

        // Create notification for the user
        Notification::createForUser(
            $appointment->user_id,
            'appointment_reminder',
            'Appointment Cancelled',
            "Your blood donation appointment has been cancelled. You can schedule a new appointment anytime."
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
            new PrivateChannel('user.' . $this->userId),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'appointment_id' => $this->appointmentId,
        ];
    }
}
