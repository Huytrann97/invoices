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

    public function getAll()
    {
        return $this->invoiceRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->invoiceRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->invoiceRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->invoiceRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->invoiceRepository->delete($id);
    }
}

