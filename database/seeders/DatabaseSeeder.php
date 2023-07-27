<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Infrastructure\Eloquent\EloquentUser;
use App\Infrastructure\Eloquent\EloquentInvoice;
use Database\Factories\Infrastructure\Eloquent\EloquentUserFactory;
use Database\Factories\Infrastructure\Eloquent\EloquentInvoiceFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = EloquentUser::factory()->count(5)->create();

        $users->each(function ($user) {
            EloquentInvoice::factory()->count(10)->create([
                'user_id' => $user->id,
                'item_name' => 'Item Name',
            ]);
        });
    }
}
