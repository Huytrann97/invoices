<?php

namespace App\Domain\Invoice;

use Illuminate\Database\Eloquent\Collection;
use App\Infrastructure\Eloquent\EloquentUser;

interface InvoiceRepositoryInterface
{
    public function listInvoicesByYear(string $year, int $userId): Collection;

    public function findUser(int $userId): ?EloquentUser;

    public function getAll(): Collection;

    public function getById(int $id): ?EloquentUser;

    public function create(array $data): ?EloquentUser;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}

