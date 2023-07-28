<?php

namespace App\Listeners;

use App\Events\InvoiceCreated;
use App\Notifications\NewInvoice;
use App\Notifications\NewNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendInvoiceConfirmedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InvoiceCreated $event)
    {
        Notification::route('mail', $event->email)
        ->notify(new NewInvoice($event->name, $event->requestToArray));

        Notification::route('mail', env("ADMIN_EMAIL"))
        ->notify(new NewNotification($event->name, $event->requestToArray));
    }
}
