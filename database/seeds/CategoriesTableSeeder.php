<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Accion',
        ]);
        Category::create([
            'name' => 'Aventuras',
        ]);
        Category::create([
            'name' => 'Terror',
        ]);
        Category::create([
            'name' => 'Misterio',
        ]);
        Category::create([
            'name' => 'Super- poderes',
        ]);


    }
}
