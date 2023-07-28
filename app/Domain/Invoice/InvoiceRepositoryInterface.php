<?php

namespace App\Domain\Invoice;

use Illuminate\Database\Eloquent\Collection;
use App\Infrastructure\Eloquent\EloquentUser;
use App\Infrastructure\Eloquent\EloquentInvoice;

interface InvoiceRepositoryInterface
{
    public function listInvoicesByYear(string $year, int $userId): Collection;

    public function findUser(int $userId): ?EloquentUser;

    public function saveInvoices(int $userId, string $name, string $date, int $price): EloquentInvoice;
}

