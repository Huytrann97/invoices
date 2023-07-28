<?php

namespace App\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EloquentInvoice extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'invoices';
    protected $fillable = [
        'user_id',
        'item_name',
        'date',
        'item_price',
        'payment_url',
    ];

    protected function scopeSearchByUserId($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    protected function scopeSearchByYear($query, string $year)
    {
        return $query->where('date', 'like', "$year%");
    }
}
