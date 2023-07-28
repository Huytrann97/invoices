<?php

namespace App\Notifications;

use App\Domain\Profile\Name;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Infrastructure\Eloquent\EloquentUser;
use Illuminate\Notifications\Messages\MailMessage;

class NewInvoice extends Notification implements ShouldQueue
{
    use Queueable;
    public Name $userName;
    public array $requestToArray;
    /**
     * Create a new notification instance.
     */
    public function __construct(Name $userName, array $requestToArray)
    {
        $this->userName = $userName;
        $this->requestToArray = $requestToArray;

    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('You have created new invoices')
                    ->markdown('mail.newInvoice',[
                        'content' => $this->requestToArray,
                        'name' => $this->userName->toString()
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
     public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
