<?php

namespace App\Notifications;
use App\Infrastructure\Eloquent\EloquentInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoiceCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $invoice;
    public function __construct(EloquentInvoice $invoice)
    {
        $this->invoice = $invoice;
    }
    public function toMail($notficable)
    {
        $items = $this->invoice->items;
        $mailMessage = (new MailMessage)
            ->subject('請求書が作成されました');
        return $mailMessage;
    }
}
