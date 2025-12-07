<?php

namespace App\Events;

use App\Models\User;
use App\Models\BloodDonation;
use App\Models\Hospital;
use App\Models\FundraiserContribution;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminDashboardStatsUpdated implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $queue = 'broadcasts';
    public $connection = 'database';
    public $tries = 3;

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('admin.dashboard'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'AdminDashboardStatsUpdated';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'total_donors' => User::count(),
            'total_users' => User::count(),
            'active_hospitals' => Hospital::where('is_active', true)->count(),
            'total_raised' => FundraiserContribution::where('status', 'verified')->sum('amount') ?? 0,
            'verified_donations' => BloodDonation::where('status', 'verified')->count(),
            'pending_donations' => BloodDonation::where('status', 'pending')->count(),
            'timestamp' => now()->toIso8601String(),
        ];
    }
}
