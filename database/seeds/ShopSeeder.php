<?php

use Illuminate\Database\Seeder;
use App\Shop;
use App\Category;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shop = Shop::create([
        	'name' => 'GSshop',
        	'contact' => '012345667',
        ]);

        $category = Category::findOrFail(1);

        $shop->categories()->attach($category);
    }
}
