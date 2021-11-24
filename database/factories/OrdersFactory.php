<?php

namespace Database\Factories;


use  \App\Models\Orders;

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
    public function definition()
    {
        return [
            // 
            
            'user_id' => $this->faker->numerify('####'),
            'total' => numberBetween(1000,30000),
            'quantity' => numberBetween(1,10),
            'address' => $this->faker->address,
            'phoneNumber'=>$this->faker->phoneNumber,
            'payment_id' =>str_random(11),
            'email'=>  $this->faker->safeEmail,
            'trackng' => $this->faker->randomDigit(1,3),
       

        ];
    }
}
