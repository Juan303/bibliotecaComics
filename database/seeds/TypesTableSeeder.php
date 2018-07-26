<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Manga',
        ]);
        Type::create([
            'name' => 'DC',
        ]);
        Type::create([
            'name' => 'Marvel',
        ]);
        Type::create([
            'name' => 'Novela Gráfica',
        ]);
    }
}
