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

class DonationVerified implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $donation;

    /**
     * Create a new event instance.
     */
    public function __construct($donation)
    {
        $this->donation = $donation;

        // Create notification for the user
        $livesImpacted = $donation->lives_impacted ?? 3;
        Notification::createForUser(
            $donation->user_id,
            'donation_thank_you',
            'Thank You for Donating!',
            "Your blood donation has been verified. You've potentially saved {$livesImpacted} lives. Thank you for your generosity!"
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
            new PrivateChannel('user.' . $this->donation->user_id),
        ];
    }

    public function broadcastWith(): array
    {
        $user = $this->donation->user;

        return [
            'donation_id' => $this->donation->id,
            'lives_impacted' => $this->donation->lives_impacted,
            'new_total_donations' => $user->total_donations,
            'new_total_lives' => $user->total_lives_impacted,
        ];
    }
}
