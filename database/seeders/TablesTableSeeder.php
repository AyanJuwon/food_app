<?php

namespace Database\Seeders;

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
        //

        Table::create([
            'table_name'=>'table 1',
            'table_name'=>'table 2',
            'table_name'=>'table 3',
            'table_name'=>'table 4',
            'table_name'=>'table 5',
        ]);
    }
}