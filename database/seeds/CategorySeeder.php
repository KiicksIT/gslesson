<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' => 'Food and Beverage',
        	'desc' => 'F&B'
        ]);

        Category::create([
        	'name' => 'Ecommerce',
        	'desc' => 'Online market',
        ]);
    }
}
