<?php
namespace App\Events;

use App\Http\Requests\StoreInvoiceRequest;
use App\Infrastructure\Eloquent\EloquentUser;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;


class NewInvoiceCreatedEvent
{
    use Dispatchable, SerializesModels;

    public array $requestToArray;

    public EloquentUser $user;

    public function __construct(StoreInvoiceRequest $request, EloquentUser $user){
        $this->requestToArray = $request->all();
        $this->user = $user;
    }
}
