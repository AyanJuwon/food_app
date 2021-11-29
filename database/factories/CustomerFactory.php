<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'name' => $this->faker->unique->word,
            'email' => $this->faker->safeEmail,
            'phoneNumber' => $this->faker->phoneNumber(),
        ];
    }
}