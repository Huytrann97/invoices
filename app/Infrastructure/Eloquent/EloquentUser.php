<?php

namespace App\Infrastructure\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class EloquentUser extends Model
{
    use  HasFactory, Notifiable;

    protected $table = 'users';
     protected $fillable = [
        'name',
        'email',
        'password',
    ];

   
}
