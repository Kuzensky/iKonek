<?php

namespace App\Events;

use App\Models\Hospital;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HospitalCreated implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $hospital;

    public $queue = 'broadcasts';
    public $connection = 'database';
    public $tries = 3;

    /**
     * Create a new event instance.
     */
    public function __construct(Hospital $hospital)
    {
        $this->hospital = $hospital;
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
        return 'HospitalCreated';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'hospital_id' => $this->hospital->id,
            'name' => $this->hospital->name,
            'city' => $this->hospital->city,
            'region' => $this->hospital->region,
            'status' => $this->hospital->status,
            'is_blood_bank' => $this->hospital->isBloodBank(),
            'total_hospitals' => Hospital::where('is_active', true)->count(),
        ];
    }
}
