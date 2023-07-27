<?php

namespace App\Http\Services;

use App\Domain\Profile\Email;
use App\Domain\Profile\Name;
use App\Exceptions\UserNotFoundException;
use App\Http\Requests\StoreInvoiceRequest;
use App\Domain\Invoice\InvoiceRepositoryInterface;
use App\Events\InvoiceCreated;

class InvoicesService
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

    public function create(StoreInvoiceRequest $request)
    {
        $userId = $request->input('user_id');
        $date = $request->input('date');
        $items = $request->input('items');
        $user = $this->invoiceRepository->findUser($userId);
        if (!$user){
            throw new UserNotFoundException();
        }
        foreach ($items as $item) {
            $name = $item['name'];
            $price = $item['price'];
            $this->invoiceRepository->saveInvoices($userId, $name, $date, $price);
        }
        var_dump($user->name);
        event(new InvoiceCreated(new Name($user->name), new Email($user->email),  $request->toArray()));
        return ['message' => 'Invoice created successfully'];
    }
}

