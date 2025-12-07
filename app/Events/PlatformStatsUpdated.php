<?php

namespace App\Events;

use App\Models\User;
use App\Models\BloodDonation;
use App\Models\Hospital;
use App\Models\Fundraiser;
use App\Models\FundraiserContribution;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class PlatformStatsUpdated implements ShouldBroadcast, ShouldQueue
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
     * Determine if this event should broadcast.
     */
    public function broadcastWhen(): bool
    {
        // Throttle: Only broadcast if no broadcast in last 5 seconds
        $key = 'broadcast.platform.stats.last';
        if (Cache::has($key)) {
            return false;
        }

        Cache::put($key, true, 5); // 5 seconds throttle
        return true;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('platform.stats'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'PlatformStatsUpdated';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return Cache::remember('platform.stats.data', 300, function () {
            return [
                'active_donors' => User::count(),
                'lives_saved' => BloodDonation::where('status', 'verified')->sum('lives_impacted') ?? 0,
                'partner_hospitals' => Hospital::where('is_active', true)->count(),
                'active_campaigns' => Fundraiser::where('status', 'active')
                    ->where('end_date', '>=', now())
                    ->count(),
                'total_raised' => FundraiserContribution::where('status', 'verified')->sum('amount') ?? 0,
            ];
        });
    }
}
