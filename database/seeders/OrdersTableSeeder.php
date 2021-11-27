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
            'user_id' => 1,
            'total' => 10000,
            'quantity' => 2,
            'address' => 'Fake Address',
            'phoneNumber' => '9052145636',
            'payment_id' => 'uyjiyujiopyjioji',
            'email' => 'email@email.com',
            'tracking' => 0,
        ]);

        // Insert into order_product table
      
        // Insert into orders table
        $order2 = Orders::create([
            'user_id' => 3,
            'total' => 2000,
            'quantity' => 2,
            'address' => 'Fake Address',
            'phoneNumber' => '9052145636',
            'payment_id' => 'yhioy9yhuhyiyj',
            'email' => 'email@email.com',
            'tracking' => 0,
        ]);

        // Insert into order_product table
  
        // Insert into orders table
        $order3 = Orders::create([
            'user_id' => 1,
            'total' => 3000,
            'quantity' => 2,
            'address' => 'Fake Address',
            'phoneNumber' => '9052145636',
            'payment_id' => 'usagduagdsgajkldgasjk',
            'email' => 'email@email.com',
            'tracking' => 0,
        ]);

        // Insert into order_product table
       
    }
}