<?php

namespace App\Http\Services;

use App\Domain\Invoice\InvoiceRepositoryInterface;

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
    
    public function searchByPrice($price)
    {
        return $this->invoiceRepository->searchByPrice($price);
    }
}

