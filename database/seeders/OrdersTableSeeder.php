<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use App\Models\Orders;
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
        //
        // Insert into orders table
        $order = Orders::create([
            'user_id' => null,
            'total' => 10000,
            'quantity' => 2,
            'address' => 'Fake Address',
            'phoneNumber' => '9052145636',
            'payment_id' => 'uyjiyujiopyjioji',
            'email' => 'email@email.com',
            'tracking' => 0,
            'error' => null,
        ]);

        // Insert into order_product table
        OrderDetail::create([
            'order_id' => $order->id,
            'menu_id' => 1,
            'quantity' => 1,
        ]);

        OrderDetail::create([
            'order_id' => $order->id,
            'menu_id' => 2,
            'quantity' => 1,
        ]);

        // Insert into orders table
        $order2 = Orders::create([
            'user_id' => null,
            'total' => 2000,
            'quantity' => 2,
            'address' => 'Fake Address',
            'phoneNumber' => '9052145636',
            'payment_id' => 'yhioy9yhuhyiyj',
            'email' => 'email@email.com',
            'tracking' => 0,
            'error' => null,
        ]);

        // Insert into order_product table
        OrderDetail::create([
            'order_id' => $order2->id,
            'menu_id' => 3,
            'quantity' => 1,
        ]);
        OrderDetail::create([
            'order_id' => $order2->id,
            'menu_id' => 4,
            'quantity' => 1,
        ]);

        // Insert into orders table
        $order3 = Orders::create([
            'user_id' => null,
            'total' => 3000,
            'quantity' => 2,
            'address' => 'Fake Address',
            'phoneNumber' => '9052145636',
            'payment_id' => 'usagduagdsgajkldgasjk',
            'email' => 'email@email.com',
            'tracking' => 0,
            'error' => null,
        ]);

        // Insert into order_product table
        OrderDetail::create([
            'order_id' => $order3->id,
            'menu_id' => 5,
            'quantity' => 1,
        ]);

        OrderDetail::create([
            'order_id' => $order3->id,
            'menu_id' => 6,
            'quantity' => 1,
        ]);
    }
}
