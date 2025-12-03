<?php

namespace App\Events;

use App\Models\Fundraiser;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FundraiserProgressUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fundraiser;

    public function __construct(Fundraiser $fundraiser)
    {
        $this->fundraiser = $fundraiser;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('fundraiser.' . $this->fundraiser->id),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'fundraiser_id' => $this->fundraiser->id,
            'current_amount' => $this->fundraiser->current_amount,
            'goal_amount' => $this->fundraiser->goal_amount,
            'progress_percentage' => $this->fundraiser->progress_percentage,
        ];
    }
}
