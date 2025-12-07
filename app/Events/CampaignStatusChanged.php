<?php

namespace App\Events;

use App\Models\Fundraiser;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CampaignStatusChanged implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fundraiser;
    public $oldStatus;
    public $newStatus;
    public $adminNotes;

    public $queue = 'broadcasts';
    public $connection = 'database';
    public $tries = 3;

    /**
     * Create a new event instance.
     */
    public function __construct(Fundraiser $fundraiser, $oldStatus, $newStatus, $adminNotes = null)
    {
        $this->fundraiser = $fundraiser;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $newStatus;
        $this->adminNotes = $adminNotes;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.' . $this->fundraiser->user_id),
            new Channel('campaigns.updates'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'CampaignStatusChanged';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'fundraiser_id' => $this->fundraiser->id,
            'title' => $this->fundraiser->title,
            'old_status' => $this->oldStatus,
            'new_status' => $this->newStatus,
            'status_display' => ucfirst(str_replace('_', ' ', $this->newStatus)),
            'admin_notes' => $this->adminNotes,
            'is_featured' => $this->fundraiser->is_featured,
        ];
    }
}
