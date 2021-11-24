<?php

namespace Database\Factories;
use Faker\Generator as Faker;

use  \App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{

    protected $model = Menu::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'menu_name' => $this->faker->name,
            'menu_price' => $this->faker->numberBetween(1000, 500000),
            'menu_description' => $this->faker->paragraph,
            'menu_image' => 'uploads/menu/food.jpg',
            'category' =>$this->faker->word ,
            'category_id' => $this->faker->numberBetween(1,10),
        ];
    }

    // $factory->define(App\Models\Menu::class, function (Faker $this->faker) {
    // return [
        
        
    // ];

}
