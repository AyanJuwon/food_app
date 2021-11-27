<?php

namespace Database\Factories;

use App\Models\Menu;
use  \App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{

    protected $model = OrderDetail::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            //
            'order_id' => Orders::all()->random()->id,
            'menu_id' => Menu::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1,10),
        ];
    }
}
