<?php
namespace App\Infrastructure\Repository;

use Carbon\Carbon;
use App\Infrastructure\Eloquent\EloquentInvoice;
use App\Domain\Invoice\InvoiceRepositoryInterface;
use App\Infrastructure\Eloquent\EloquentUser;
// use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection;


class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function listInvoicesByYear(string $year, int $userId): Collection
    {
        return EloquentInvoice::searchByUserId($userId)
            ->searchByYear($year)
            ->get()
            ->groupBy(function ($invoice) {
                return Carbon::parse($invoice->date)->format('m');
            });
    }

    public function findUser(int $userId): ?EloquentUser
    {
        return EloquentUser::firstWhere('id', $userId);
    }

    public function getAll(): Collection
    {
        return EloquentInvoice::all();
    }

    public function getById(int $id): ?EloquentInvoice
    {
        return EloquentInvoice::find($id);
    }

    public function create(array $data): ?EloquentInvoice
    {
        return EloquentInvoice::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $invoice = EloquentInvoice::find($id);
        if ($invoice) {
            return $invoice->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $invoice = EloquentInvoice::find($id);
        if ($invoice) {
            return $invoice->delete();
        }
        return false;
    }
}

