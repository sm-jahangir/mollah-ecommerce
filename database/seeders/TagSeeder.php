<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Apple',
            'slug' => 'apple',
        ]);
        Tag::create([
            'name' => 'Asus',
            'slug' => 'asus',
        ]);
        Tag::create([
            'name' => 'Black Shark',
            'slug' => 'black-shark',
        ]);
        Tag::create([
            'name' => 'Coolpad',
            'slug' => 'coolpad',
        ]);
        Tag::create([
            'name' => 'Gionee',
            'slug' => 'gionee',
        ]);
        Tag::create([
            'name' => 'Google',
            'slug' => 'google',
        ]);
        Tag::create([
            'name' => 'Honor',
            'slug' => 'honor',
        ]);
        Tag::create([
            'name' => 'Huawei',
            'slug' => 'huawei',
        ]);
        Tag::create([
            'name' => 'Infinix',
            'slug' => 'infinix',
        ]);
    }
}
