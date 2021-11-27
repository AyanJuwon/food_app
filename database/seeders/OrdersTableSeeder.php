<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orders::factory()->times(10)->create();
    }
}
