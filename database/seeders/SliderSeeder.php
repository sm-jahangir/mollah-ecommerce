<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title' => 'New Product <br> <span style="color: #ff4136;">Collection</span>',
            'slider_bg' => 'slider-1.jpg',
            'position' => 'left'
        ]);
        Slider::create([
            'title' => 'New Product <br> <span style="color: #ff4136;">Collection</span>',
            'slider_bg' => 'slider-2.jpg',
            'position' => 'right'
        ]);
    }
}
