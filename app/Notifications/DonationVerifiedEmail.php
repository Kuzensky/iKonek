<?php

namespace App\Notifications;

use App\Models\BloodDonation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationVerifiedEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $donation;
    public $queue = 'emails';
    public $connection = 'database';
    public $tries = 3;
    public $timeout = 30;

    /**
     * Create a new notification instance.
     */
    public function __construct(BloodDonation $donation)
    {
        $this->donation = $donation;
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
                    ->subject('Thank You for Saving Lives!')
                    ->greeting('Dear ' . $notifiable->first_name . ',')
                    ->line('Your blood donation at ' . $this->donation->hospital->name . ' has been verified!')
                    ->line('You have potentially saved ' . $this->donation->lives_impacted . ' lives with your generous donation.')
                    ->line('Total lives impacted: ' . $notifiable->total_lives_impacted)
                    ->line('Total donations: ' . $notifiable->total_donations)
                    ->action('View Your Impact', url('/dashboard'))
                    ->line('Thank you for being a hero in our community!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'donation_id' => $this->donation->id,
            'hospital_name' => $this->donation->hospital->name,
            'lives_impacted' => $this->donation->lives_impacted,
            'donation_date' => $this->donation->donation_date?->format('Y-m-d'),
        ];
    }
}
