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
        'name',
        'item_name',
        'date',
        'price',
        'payment_url',
    ];



}
