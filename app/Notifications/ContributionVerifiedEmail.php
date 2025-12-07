<?php

namespace App\Notifications;

use App\Models\FundraiserContribution;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContributionVerifiedEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $contribution;
    public $queue = 'emails';
    public $connection = 'database';
    public $tries = 3;
    public $timeout = 30;

    /**
     * Create a new notification instance.
     */
    public function __construct(FundraiserContribution $contribution)
    {
        $this->contribution = $contribution;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $fundraiser = $this->contribution->fundraiser;

        return (new MailMessage)
                    ->subject('Your Contribution Has Been Verified!')
                    ->greeting('Hello ' . $notifiable->first_name . ',')
                    ->line('Your contribution of ₱' . number_format($this->contribution->amount, 2) . ' to "' . $fundraiser->title . '" has been verified!')
                    ->line('Campaign progress: ' . number_format($fundraiser->progress_percentage, 0) . '%')
                    ->line('Total raised: ₱' . number_format($fundraiser->current_amount, 2) . ' of ₱' . number_format($fundraiser->goal_amount, 2))
                    ->action('View Campaign', url('/fundraisers/' . $fundraiser->id))
                    ->line('Thank you for your generosity and compassion!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'contribution_id' => $this->contribution->id,
            'fundraiser_id' => $this->contribution->fundraiser_id,
            'fundraiser_title' => $this->contribution->fundraiser->title,
            'amount' => $this->contribution->amount,
        ];
    }
}
