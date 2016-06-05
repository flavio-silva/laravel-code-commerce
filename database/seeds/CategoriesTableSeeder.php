<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('set foreign_key_checks=0');
        Category::truncate();
        factory(Category::class, 15)->create();
        \DB::statement('set foreign_key_checks=1');
    }
}
