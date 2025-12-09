<?php

namespace App\Events;

use App\Models\FundraiserContribution;
use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContributionVerified implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contribution;

    public function __construct(FundraiserContribution $contribution)
    {
        $this->contribution = $contribution;

        // Create notification for the user
        Notification::createForUser(
            $contribution->user_id,
            'contribution_verified',
            'Contribution Verified',
            "Your ₱" . number_format($contribution->amount, 0) . " contribution to '{$contribution->fundraiser->title}' has been verified. Thank you for supporting this cause!"
        );
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.' . $this->contribution->user_id),
            new PrivateChannel('admin.dashboard'),
            new Channel('fundraiser.' . $this->contribution->fundraiser_id),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'contribution_id' => $this->contribution->id,
            'fundraiser_id' => $this->contribution->fundraiser_id,
            'amount' => $this->contribution->amount,
            'fundraiser_title' => $this->contribution->fundraiser->title,
            'total_contributions' => $this->contribution->user->total_contributions,
            'fundraiser_current_amount' => $this->contribution->fundraiser->current_amount,
            'fundraiser_contributors_count' => $this->contribution->fundraiser->contributors_count,
        ];
    }
}
