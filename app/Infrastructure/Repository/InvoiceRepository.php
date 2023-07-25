<?php
namespace App\Infrastructure\Repository;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Infrastructure\Eloquent\EloquentUser;
use App\Infrastructure\Eloquent\EloquentInvoice;
use App\Domain\Invoice\InvoiceRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function getInvoiceInformation(string $year, int $userId)
    {
        return EloquentInvoice::where('user_id', $userId)
            ->where('date', 'like', "$year%")
            ->get()
            ->groupBy(function ($invoice) {
                return Carbon::parse($invoice->date)->format('m');
            });
    }

    public function findNameByUserid(int $userId)
    {
        return EloquentUser::firstWhere('id', $userId);
    }

    public function storeInvoicesToDb(int $userId, string $fullName, string $name, string $date, int $price)
    {
        return EloquentInvoice::create([
            'user_id' => $userId,
            'name' => $fullName,
            'item_name' => $name,
            'date' => $date,
            'price' => $price,
        ]);
    }

}

