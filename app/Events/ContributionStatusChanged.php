<?php

namespace App\Events;

use App\Models\FundraiserContribution;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContributionStatusChanged implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contribution;
    public $oldStatus;
    public $newStatus;

    public $queue = 'broadcasts';
    public $connection = 'database';
    public $tries = 3;

    /**
     * Create a new event instance.
     */
    public function __construct(FundraiserContribution $contribution, $oldStatus, $newStatus)
    {
        $this->contribution = $contribution;
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
            new PrivateChannel('user.' . $this->contribution->user_id),
            new Channel('fundraiser.' . $this->contribution->fundraiser_id),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'ContributionStatusChanged';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'contribution_id' => $this->contribution->id,
            'fundraiser_id' => $this->contribution->fundraiser_id,
            'fundraiser_title' => $this->contribution->fundraiser->title,
            'old_status' => $this->oldStatus,
            'new_status' => $this->newStatus,
            'amount' => $this->contribution->amount,
            'user_total_contributions' => $this->contribution->user->total_contributions,
        ];
    }
}
