<?php
namespace App\Events;

use App\Http\Requests\StoreInvoiceRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;


class NewInvoiceCreatedEvent
{
    use Dispatchable, SerializesModels;
    public $request;
    public function __construct(StoreInvoiceRequest $request){
        $this->request = $request->all();
    }
}
