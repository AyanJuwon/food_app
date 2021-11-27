<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
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
        for( $i = 0; $i<= 10; $i++){
            
       
     foreach(  $category = Category::all() as $category){
        Menu::create([
        'menu_name' => 'menu'.$i,
       'menu_price' => rand(1000, 5000),
       'menu_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet quam vel ex viverra rutrum eget sed ex. Maecenas et accumsan est. Nulla egestas, enim eget commodo feugiat, justo enim luctus enim, id scelerisque augue nulla ac lorem. Cras quis mi quis ligula consequat venenatis vitae sed lorem. Ut hendrerit tincidunt mauris et sodales. Nunc et tincidunt ligula. Praesent ultrices sit amet ante a rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam leo ex, suscipit a pulvinar in, volutpat sed eros. Vestibulum mattis, urna in cursus fermentum, sapien ligula imperdiet libero, sed vehicula odio tellus non ex. Mauris fermentum tempus leo sed dignissim. ',
       'menu_image' => 'food'.$i.'.jpg',
       'category' => $category->name ,
           'category_id' => $category->id,
       ]); }
    }
    }
}