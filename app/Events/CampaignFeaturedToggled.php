<?php

namespace App\Events;

use App\Models\Fundraiser;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CampaignFeaturedToggled implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fundraiser;

    public $queue = 'broadcasts';
    public $connection = 'database';
    public $tries = 3;

    /**
     * Create a new event instance.
     */
    public function __construct(Fundraiser $fundraiser)
    {
        $this->fundraiser = $fundraiser;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('campaigns.featured'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'CampaignFeaturedToggled';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'fundraiser_id' => $this->fundraiser->id,
            'title' => $this->fundraiser->title,
            'is_featured' => $this->fundraiser->is_featured,
            'current_amount' => $this->fundraiser->current_amount,
            'goal_amount' => $this->fundraiser->goal_amount,
            'progress_percentage' => $this->fundraiser->progress_percentage,
        ];
    }
}
