<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $parentCategory = 'Без категории';

        $categories [] = [
            'title' => $parentCategory,
            'slug' => Str::slug($parentCategory),
            'parent_id' => 0
        ];

       for ($i = 1; $i <= 10; $i++) {
           $parentCategory = 'Категория '.$i;

           $parent_id = ($i > 4) ? rand(1,4): 1;
           $categories[] = [
               'title' => $parentCategory,
               'slug' => Str::slug($parentCategory),
               'parent_id' => $parent_id
           ];
       }
       DB::table('categories')->insert($categories);
    }
}
