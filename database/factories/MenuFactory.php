<?php

namespace Database\Factories;
use App\Models\Category;
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

        $category_id = Category::all()->random()->id ;
        $category = Category::where('id',$category_id)->first() ;
        return [
            // we want categoey name and id to correspond here.....
             
            'menu_name' => $this->faker->name,
            'menu_price' => $this->faker->numberBetween(1000, 10000),
            'menu_description' => $this->faker->paragraph,
            'menu_image' => 'uploads/menu/food.jpg',
            'category_id' => $category_id,
        ];
    }

}