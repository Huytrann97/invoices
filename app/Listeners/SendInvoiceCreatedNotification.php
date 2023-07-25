<?php
namespace App\Listeners;
use App\Mail\InvoicesUpdateConfirmation;
use App\Mail\InvoiceUpdateNotification;
use Illuminate\Support\Facades\Mail;
use App\Events\NewInvoiceCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Infrastructure\Eloquent\EloquentUser;

class SendInvoiceCreatedNotification implements ShouldQueue
{
    public $invoice;

    public function handle(NewInvoiceCreatedEvent $event)
    {
        $request = $event->request;
        $userName = EloquentUser::firstWhere('id', $request['user_id'])->name;
        $userEmail = EloquentUser::firstWhere('id', $request['user_id'])->email;
        $request['user_name']=$userName;
        Mail::to($userEmail)->send(new InvoicesUpdateConfirmation($request));

        Mail::to('admin@gmail.com')->send(new InvoiceUpdateNotification($request));
    }
}
