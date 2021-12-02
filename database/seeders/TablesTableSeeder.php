<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Table::create([
            'table_name' => 'table 1'
        ]);

        Table::create([
            'table_name' => 'table 2'
        ]);

        Table::create([
            'table_name' => 'table 3'
        ]);

        Table::create([
            'table_name' => 'table 4'
        ]);

    }
}
