<?php

namespace App\Domain\Invoice;

use Illuminate\Database\Eloquent\Collection;
use App\Infrastructure\Eloquent\EloquentUser;
use App\Infrastructure\Eloquent\EloquentInvoice;

interface InvoiceRepositoryInterface
{
    public function listInvoicesByYear(string $year, int $userId): Collection;

    public function findUser(int $userId): ?EloquentUser;


    public function getAll(): Collection;

    public function getById(int $id): ?EloquentInvoice;

    public function create(array $data): ?EloquentInvoice;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
