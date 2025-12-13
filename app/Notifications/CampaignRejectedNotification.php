<?php

namespace App\Notifications;

use App\Models\Fundraiser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CampaignRejectedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $fundraiser;
    public $notes;

    /**
     * Create a new notification instance.
     */
    public function __construct(Fundraiser $fundraiser, $notes = null)
    {
        $this->fundraiser = $fundraiser;
        $this->notes = $notes;

        // Configure queue settings
        $this->onQueue('emails');
        $this->onConnection('database');
    }

    /**
     * Get the number of times the job may be attempted.
     */
    public $tries = 3;

    /**
     * Get the number of seconds before the job should timeout.
     */
    public $timeout = 30;

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
        $message = (new MailMessage)
                    ->subject('Campaign Status Update Required')
                    ->greeting('Hello ' . $notifiable->first_name . ',')
                    ->line('Your fundraising campaign "' . $this->fundraiser->title . '" has been ' . str_replace('_', ' ', $this->fundraiser->status) . '.');

        if ($this->notes) {
            $message->line('Reason: ' . $this->notes);
        }

        return $message->line('Please review our campaign guidelines and make necessary adjustments.')
                    ->action('Review Guidelines', url('/guidelines'))
                    ->line('If you have questions, please contact our support team.');
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
            'notes' => $this->notes,
        ];
    }
}
