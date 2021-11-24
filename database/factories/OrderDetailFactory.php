<?php

namespace Database\Factories;

use  \App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{

    protected $model = OrderDetail::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'order_id' => $this->faker->numerify('####'),
            'menu_id' => $this->faker->randomDigit(1,5),
            'quantity' => 1,
        ];
    }
}
