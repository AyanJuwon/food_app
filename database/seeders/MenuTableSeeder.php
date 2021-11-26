<?php

namespace Database\Seeders;

use App\Models\Menu;
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
        // correct this please
        // You don't use a faker in a seeder only Factories, always run `php artisan db:seed` to test your seeders
//         Menu::create([
//         'menu_name' => $this->faker->name,
//        'menu_price' => $faker->numberBetween(1000, 500000),
//        'menu_description' => $faker->paragraph,
//        'menu_image' => 'products/dummy/food.jpg',
//        'category' =>$faker->name ,
//            'category_id' => $faker->numberBetween(1,10),
//        ]);
    }
}
