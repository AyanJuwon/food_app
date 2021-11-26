<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use App\Models\Category;
use Carbon\Carbon;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

         $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Swallow', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Combo', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sides', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'breakfast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'snacks', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'small chops',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'continental', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
