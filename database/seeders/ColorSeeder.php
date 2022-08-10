<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name' => 'Green',
            'slug' => 'green',
        ]);
        Color::create([
            'name' => 'Yellow',
            'slug' => 'yellow',
        ]);
        Color::create([
            'name' => 'Red',
            'slug' => 'red',
        ]);
        Color::create([
            'name' => 'White',
            'slug' => 'white',
        ]);
    }
}
