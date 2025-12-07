<?php

namespace App\Events;

use App\Models\BloodDonation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DonationStatusChanged implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $donation;
    public $oldStatus;
    public $newStatus;

    public $queue = 'broadcasts';
    public $connection = 'database';
    public $tries = 3;

    /**
     * Create a new event instance.
     */
    public function __construct(BloodDonation $donation, $oldStatus, $newStatus)
    {
        $this->donation = $donation;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $newStatus;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.' . $this->donation->user_id),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'DonationStatusChanged';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'donation_id' => $this->donation->id,
            'old_status' => $this->oldStatus,
            'new_status' => $this->newStatus,
            'hospital_name' => $this->donation->hospital->name,
            'lives_impacted' => $this->donation->lives_impacted,
            'total_donations' => $this->donation->user->total_donations,
            'total_lives_impacted' => $this->donation->user->total_lives_impacted,
        ];
    }
}
