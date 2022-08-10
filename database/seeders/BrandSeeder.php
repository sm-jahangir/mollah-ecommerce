<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Brand::updateOrCreate([
            'name' =>  'Samsung',
            'slug'  =>  'samsung',
        ]);
        Brand::updateOrCreate([
            'name' =>  'Iphone',
            'slug'  =>  'iphone',
        ]);
        Brand::updateOrCreate([
            'name' =>  'Oppo',
            'slug'  =>  'oppo',
        ]);
        Brand::updateOrCreate([
            'name' =>  'Vivo',
            'slug'  =>  'vivo',
        ]);
        Brand::updateOrCreate([
            'name' =>  'Galaxy note 9',
            'slug'  =>  'galaxy-note-9',
        ]);
        Brand::updateOrCreate([
            'name' =>  'Galaxy note 10',
            'slug'  =>  'galaxy-note-10',
        ]);
        Brand::updateOrCreate([
            'name' =>  'Iphone 13 pro max',
            'slug'  =>  'iphone-13-pro-max',
        ]);
    }
}
