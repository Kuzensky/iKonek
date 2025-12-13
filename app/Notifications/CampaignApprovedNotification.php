<?php

namespace App\Notifications;

use App\Models\Fundraiser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CampaignApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $fundraiser;
    public $tries = 3;
    public $timeout = 30;

    /**
     * Create a new notification instance.
     */
    public function __construct(Fundraiser $fundraiser)
    {
        $this->fundraiser = $fundraiser;
        $this->onQueue('emails');
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
                    ->subject('Your Campaign Has Been Approved!')
                    ->greeting('Great News, ' . $notifiable->first_name . '!')
                    ->line('Your fundraising campaign "' . $this->fundraiser->title . '" has been approved and is now live.')
                    ->line('Your campaign is now visible to all visitors and can receive contributions.')
                    ->action('View Your Campaign', url('/fundraisers/' . $this->fundraiser->id))
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
            'status' => $this->fundraiser->status,
        ];
    }
}
