<?php

namespace App\Notifications;

use App\Models\Fundraiser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CampaignSubmittedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $fundraiser;

    /**
     * Create a new notification instance.
     */
    public function __construct(Fundraiser $fundraiser)
    {
        $this->fundraiser = $fundraiser;
        $this->queue = 'emails';
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
        return (new MailMessage)
            ->subject('Campaign Submitted Successfully - Under Review')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Thank you for submitting your fundraising campaign: "' . $this->fundraiser->title . '"')
            ->line('Your campaign is currently under review by our team.')
            ->line('**Campaign Details:**')
            ->line('• Goal Amount: ₱' . number_format($this->fundraiser->goal_amount, 2))
            ->line('• Category: ' . ucfirst(str_replace('_', ' ', $this->fundraiser->category)))
            ->line('• Duration: ' . $this->fundraiser->campaign_duration_days . ' days')
            ->line('We will notify you once your campaign has been reviewed and approved. This usually takes 1-3 business days.')
            ->action('View Campaign Status', route('dashboard'))
            ->line('If you have any questions, please contact our support team.')
            ->line('Thank you for making a difference with iKonek!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'fundraiser_id' => $this->fundraiser->id,
            'title' => $this->fundraiser->title,
            'goal_amount' => $this->fundraiser->goal_amount,
            'category' => $this->fundraiser->category,
            'status' => $this->fundraiser->status,
            'message' => 'Your campaign "' . $this->fundraiser->title . '" has been submitted and is under review.',
        ];
    }
}
