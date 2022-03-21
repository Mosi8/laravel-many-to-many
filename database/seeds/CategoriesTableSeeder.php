<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['cinema','motori','cibo','sport'];
        foreach ($categories as $categories_name) {
            $new_category = new Category();
            $new_category->name = $categories_name;
            $new_category->slug = Str::of($categories_name)->slug("-");
            $new_category->save();
        }
    }
}
