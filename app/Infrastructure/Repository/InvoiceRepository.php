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

    public function saveInvoices(int $userId, string $name, string $date, int $price): EloquentInvoice
    {
        return EloquentInvoice::create([
            'user_id' => $userId,
            'item_name' => $name,
            'date' => $date,
            'item_price' => $price,
        ]);
    }
}

