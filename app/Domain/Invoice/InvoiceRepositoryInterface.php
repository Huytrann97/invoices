<?php

namespace App\Domain\Invoice;

use Illuminate\Database\Eloquent\Collection;
use App\Infrastructure\Eloquent\EloquentUser;

interface InvoiceRepositoryInterface
{
    public function listInvoicesByYear(string $year, int $userId): Collection;

    public function findUser(int $userId): ?EloquentUser;

}

