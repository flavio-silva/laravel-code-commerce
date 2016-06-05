<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('set foreign_key_checks=0');
        Product::truncate();
        factory(Product::class, 40)->create();
        \DB::statement('set foreign_key_checks=1');
    }
}
