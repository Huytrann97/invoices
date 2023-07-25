<?php

namespace App\Listeners;

use App\Mail\InvoicesUpdateConfirmation;
use App\Mail\InvoiceUpdateNotification;
use Illuminate\Support\Facades\Mail;
use App\Events\NewInvoiceCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvoiceCreatedNotification implements ShouldQueue
{
    public $invoice;

    public function handle(NewInvoiceCreatedEvent $event)
    {
        $data = $event->requestToArray;

        $user = $event->user;
        $userName = $user->name;
        $email = $user->email;

        $data['user_name'] = $userName;

        Mail::to($email)->send(new InvoicesUpdateConfirmation($data));

        Mail::to(env("ADMIN_EMAIL"))->send(new InvoiceUpdateNotification($data));
    }
}
