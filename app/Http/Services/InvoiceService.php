<?php

namespace App\Http\Services;

use Exception;
use App\Enums\ResponseEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use App\Events\NewInvoiceCreatedEvent;
use App\Exceptions\UserNotFoundException;
use App\Http\Requests\StoreInvoiceRequest;
use App\Infrastructure\Eloquent\EloquentInvoice;
use App\Domain\Invoice\InvoiceRepositoryInterface;

class InvoiceService
{
    private $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function getInvoicesByYear(string $year, int $userId)
    {
        $invoices = $this->invoiceRepository->getInvoiceInformation($year, $userId);
        // TODO order by date desc

        return $invoices;
    }
    public function storeInvoicesToDb(StoreInvoiceRequest $request): array
    {
        $userId = $request->input('user_id');
        $date = $request->input('date');
        $items = $request->input('items');
        // dd($request);

        $user = $this->invoiceRepository->findNameByUserid($userId);
        if (!$user){
            throw new UserNotFoundException();
        }

        $fullName = $user->name;
        foreach ($items as $item) {
            $name = $item['name'];
            $price = $item['price'];
            $invoice = $this->invoiceRepository->storeInvoicesToDb($userId, $fullName, $name, $date, $price);
        }
        event(new NewInvoiceCreatedEvent($request));
        return ['message' => 'successfully added'];
    }
}
