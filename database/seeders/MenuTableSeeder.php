<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;


class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         Menu::create([
         'menu_name' => $faker->name,
        'menu_price' => $faker->numberBetween(1000, 500000),
        'menu_description' => $faker->paragraph,
        'menu_image' => 'products/dummy/food.jpg',
        'category' =>$faker->name ,
            'category_id' => $faker->numberBetween(1,10),
        ]);
    }
}
