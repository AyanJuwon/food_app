<?php

namespace Database\Factories;


use  \App\Models\Orders;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{

    protected $model = Orders::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->name,
            'total' => $this->faker->numberBetween(1000,30000),
            'quantity' => $this->faker->numberBetween(1,10),
            'payment_id' => $this->faker->randomDigit(),
            'tracking' => $this->faker->randomDigit(1,3),


        ];
    }
}