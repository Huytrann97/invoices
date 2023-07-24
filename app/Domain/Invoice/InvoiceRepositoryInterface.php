<?php

namespace App\Domain\Invoice;

use Illuminate\Support\Collection;

interface InvoiceRepositoryInterface
{
    public function getInvoiceInformation(string $year, int $user_id);
    public function findNameByUserid(int $userId);
    public function storeInvoicesToDb(int $userId, string $fullName, string $name, string $date, int $price);

}

