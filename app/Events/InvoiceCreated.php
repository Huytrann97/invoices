<?php

namespace App\Events;

use App\Domain\Profile\Name;
use App\Domain\Profile\Email;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class InvoiceCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $requestToArray;
    public Name $name;
    public Email $email;
    /**
     * Create a new event instance.
     */
    public function __construct(
        Name $name,
        Email $email,
        // string $name,
        // string $email,
        array $requestToArray
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->requestToArray = $requestToArray;
    }

    // /**
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return array<string, \Illuminate\Broadcasting\Channel>
    //  */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
