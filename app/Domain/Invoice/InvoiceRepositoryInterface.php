<?php

namespace App\Domain\Invoice;

use Illuminate\Support\Collection;
use App\Infrastructure\Eloquent\EloquentInvoice;
use App\Infrastructure\Eloquent\EloquentUser;

interface InvoiceRepositoryInterface
{
    public function listInvoicesByYear(string $year, int $userId): Collection;

    public function findUser(int $userId): ?EloquentUser;

    public function saveInvoices(int $userId, string $fullName, string $name, string $date, int $price): EloquentInvoice;
}
