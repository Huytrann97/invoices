<?php

namespace Database\Factories\Infrastructure\Eloquent;

use App\Infrastructure\Eloquent\EloquentInvoice;
use App\Infrastructure\Eloquent\EloquentUser;
use Illuminate\Database\Eloquent\Factories\Factory;


class EloquentInvoiceFactory extends Factory
{
    protected $model = EloquentInvoice::class;
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return EloquentUser::factory()->create()->id;
            },
            'name' => $this->faker->name,
            'date' => $this->faker->dateTimeThisDecade()->format('Y-m') ,
            'price'=> $this->faker->randomFloat(2, 1000, 5000),
        ];
    }
}
