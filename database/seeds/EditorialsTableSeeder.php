<?php

use Illuminate\Database\Seeder;
use App\Editorial;

class EditorialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Editorial::create([
            'name' => 'Norma Comics',
            'description' => 'Editorial Norma Comics',
        ]);
        Editorial::create([
            'name' => 'Panini Comics España',
            'description' => 'Editorial Panini Comics España',
        ]);
        Editorial::create([
            'name' => 'Planeta Comic',
            'description' => 'Editorial Planeta Comic',
        ]);
        Editorial::create([
            'name' => 'Ivrea',
            'description' => 'Editorial Ivrea',
        ]);


    }
}
