<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::factory()->times(10)->create();

    }
}
