<?php

namespace App\Events;

use App\Models\Hospital;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HospitalUpdated implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $hospital;
    public $changedFields;

    public $queue = 'broadcasts';
    public $connection = 'database';
    public $tries = 3;

    /**
     * Create a new event instance.
     */
    public function __construct(Hospital $hospital, array $changedFields = [])
    {
        $this->hospital = $hospital;
        $this->changedFields = $changedFields;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('hospitals.updates'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'HospitalUpdated';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'hospital_id' => $this->hospital->id,
            'name' => $this->hospital->name,
            'status' => $this->hospital->status,
            'changed_fields' => $this->changedFields,
        ];
    }
}
