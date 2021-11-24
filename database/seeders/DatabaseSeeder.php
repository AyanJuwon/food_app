<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  \App\Models\Category;
use  \App\Models\Menu;
use  \App\Models\Orders;
use  \App\Models\OrderDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
         Menu::factory(10)->create();
         Category::factory(10)->create();
         OrderDetail::factory(10)->create();
         Orders::factory(10)->create();
        $this->call(CategoryTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
    }
}
