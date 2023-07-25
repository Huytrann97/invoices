<?php

namespace App\Http\Services;

use App\Events\NewInvoiceCreatedEvent;
use App\Exceptions\UserNotFoundException;
use App\Http\Requests\StoreInvoiceRequest;
use App\Domain\Invoice\InvoiceRepositoryInterface;

class InvoiceService
{
    private $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function listInvoicesByYear(string $year, int $userId)
    {
        return $this->invoiceRepository->listInvoicesByYear($year, $userId);
    }

    public function create(StoreInvoiceRequest $request): array
    {
        $userId = $request->input('user_id');
        $date = $request->input('date');
        $items = $request->input('items');

        $user = $this->invoiceRepository->findUser($userId);
        if (!$user){
            throw new UserNotFoundException();
        }

        $fullName = $user->name;
        foreach ($items as $item) {
            $name = $item['name'];
            $price = $item['price'];
            $this->invoiceRepository->saveInvoices($userId, $fullName, $name, $date, $price);
        }
        event(new NewInvoiceCreatedEvent($request, $user));
        return ['message' => 'successfully added'];
    }
}
