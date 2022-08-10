<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::updateOrCreate([
            'name' =>  'Women’s Clothing',
            'slug'  =>  Str::slug('Women’s Clothing'),
            'icon_image' => 'thum2.png',
            'parent_id' => 0,
        ]);

        // SubCategory
        Category::updateOrCreate([
            'name' =>  'JEWELRY & WATCHES Sub Category',
            'slug'  =>  Str::slug('JEWELRY & WATCHES Sub Category'),
            'parent_id' => 1,
        ]);
        // SubCategory
        Category::updateOrCreate([
            'name' =>  'JEWELRY & WATCHES Sub Category 2',
            'slug'  =>  Str::slug('JEWELRY & WATCHES Sub Category 2'),
            'parent_id' => 1,
        ]);

        // SubCategory Child || Assign to Category id 2
        Category::updateOrCreate([
            'name' =>  'Man Fashion',
            'slug'  =>  Str::slug('Man Fashion-3'),
            'parent_id' => 2,
        ]);
        Category::updateOrCreate([
            'name' =>  'Computer & Office',
            'slug'  =>  Str::slug('Computer & Office-3'),
            'parent_id' => 2,
        ]);
        Category::updateOrCreate([
            'name' =>  ' Men’s Clothing',
            'slug'  =>  Str::slug(' Men’s Clothing-3'),
            'parent_id' => 2,
        ]);
        Category::updateOrCreate([
            'name' =>  'Bags & Shoes',
            'slug'  =>  Str::slug('Bags & Shoes-3'),
            'parent_id' => 2,
        ]);
        Category::updateOrCreate([
            'name' =>  'Toys & Kids & Baby',
            'slug'  =>  Str::slug('Toys & Kids & Baby-3'),
            'parent_id' => 2,
        ]);

        // SubCategory Child || Assign to Category id 3
        Category::updateOrCreate([
            'name' =>  'Man Fashion',
            'slug'  =>  Str::slug('Man Fashion-4'),
            'parent_id' => 3,
        ]);
        Category::updateOrCreate([
            'name' =>  'Computer & Office',
            'slug'  =>  Str::slug('Computer & Office-4'),
            'parent_id' => 3,
        ]);
        Category::updateOrCreate([
            'name' =>  ' Men’s Clothing',
            'slug'  =>  Str::slug(' Men’s Clothing-4'),
            'parent_id' => 3,
        ]);
        Category::updateOrCreate([
            'name' =>  'Bags & Shoes',
            'slug'  =>  Str::slug('Bags & Shoes-4'),
            'parent_id' => 3,
        ]);
        Category::updateOrCreate([
            'name' =>  'Toys & Kids & Baby',
            'slug'  =>  Str::slug('Toys & Kids & Baby-4'),
            'parent_id' => 3,
        ]);



        Category::updateOrCreate([
            'name' =>  'Man Fashion',
            'slug'  =>  Str::slug('Man Fashion'),
            'icon_image' => 'thum3.png',
            'parent_id' => 0,
        ]);
        Category::updateOrCreate([
            'name' =>  'Computer & Office',
            'slug'  =>  Str::slug('Computer & Office'),
            'icon_image' => 'thum4.png',
            'parent_id' => 0,
        ]);
        Category::updateOrCreate([
            'name' =>  ' Men’s Clothing',
            'slug'  =>  Str::slug(' Men’s Clothing'),
            'icon_image' => 'thum6.png',
            'parent_id' => 0,
        ]);
        Category::updateOrCreate([
            'name' =>  'Bags & Shoes',
            'slug'  =>  Str::slug('Bags & Shoes'),
            'icon_image' => 'thum7.png',
            'parent_id' => 0,
        ]);
        Category::updateOrCreate([
            'name' =>  'Toys & Kids & Baby',
            'slug'  =>  Str::slug('Toys & Kids & Baby'),
            'icon_image' => 'thum8.png',
            'parent_id' => 0,
        ]);
        Category::updateOrCreate([
            'name' =>  'Automobiles',
            'slug'  =>  Str::slug('Automobiles'),
            'icon_image' => 'thum9.png',
            'parent_id' => 0,
        ]);
        Category::updateOrCreate([
            'name' =>  'Jewelry & Watches',
            'slug'  =>  Str::slug('Jewelry & Watches'),
            'icon_image' => 'thum10.png',
            'parent_id' => 0,
        ]);
        Category::updateOrCreate([
            'name' =>  'Consumer Electronics',
            'slug'  =>  Str::slug('Consumer Electronics'),
            'icon_image' => 'thum2.png',
            'parent_id' => 0,
        ]);
        Category::updateOrCreate([
            'name' =>  'all Accessories',
            'slug'  =>  Str::slug('all Accessories'),
            'icon_image' => 'thum3.png',
            'parent_id' => 0,
        ]);
        // JEWELRY & WATCHES
        Category::updateOrCreate([
            'name' =>  'Awesome Rings',
            'slug'  =>  Str::slug('Awesome Rings'),
            'parent_id' => 20,
        ]);
        Category::updateOrCreate([
            'name' =>  'Hot Earrings',
            'slug'  =>  Str::slug('Hot Earrings'),
            'parent_id' => 20,
        ]);
        Category::updateOrCreate([
            'name' =>  'Jewelry Sets',
            'slug'  =>  Str::slug('Jewelry Sets'),
            'parent_id' => 20,
        ]);
        Category::updateOrCreate([
            'name' =>  'Beads Jewelry',
            'slug'  =>  Str::slug('Beads Jewelry'),
            'parent_id' => 20,
        ]);
        Category::updateOrCreate([
            'name' =>  'Mens Watches',
            'slug'  =>  Str::slug('Mens Watches'),
            'parent_id' => 20,
        ]);
        Category::updateOrCreate([
            'name' =>  'Women’s Watches',
            'slug'  =>  Str::slug('Women’s Watches'),
            'parent_id' => 20,
        ]);
        Category::updateOrCreate([
            'name' =>  'Popular Watches',
            'slug'  =>  Str::slug('Popular Watches'),
            'parent_id' => 20,
        ]);
        Category::updateOrCreate([
            'name' =>  'Childrens Watches',
            'slug'  =>  Str::slug('Childrens Watches'),
            'parent_id' => 20,
        ]);

        // BAGS & SHOES
        Category::updateOrCreate([
            'name' =>  'Awesome Shoes',
            'slug'  =>  Str::slug('Awesome Shoes'),
            'parent_id' => 17,
        ]);
        Category::updateOrCreate([
            'name' =>  'Hot Shoes',
            'slug'  =>  Str::slug('Hot Shoes'),
            'parent_id' => 17,
        ]);
        Category::updateOrCreate([
            'name' =>  'Mens Shoes',
            'slug'  =>  Str::slug('Mens Shoes'),
            'parent_id' => 17,
        ]);
        Category::updateOrCreate([
            'name' =>  'Women’s Shoes',
            'slug'  =>  Str::slug('Women’s Shoes'),
            'parent_id' => 17,
        ]);
        Category::updateOrCreate([
            'name' =>  'Popular Bracelets',
            'slug'  =>  Str::slug('Popular Bracelets'),
            'parent_id' => 17,
        ]);
        Category::updateOrCreate([
            'name' =>  'Childrens Shoes',
            'slug'  =>  Str::slug('Childrens Shoes'),
            'parent_id' => 17,
        ]);

        // Toys and Kit Baby
        Category::updateOrCreate([
            'name' =>  'Baby Products',
            'slug'  =>  Str::slug('Baby Products'),
            'parent_id' => 8,
        ]);
        Category::updateOrCreate([
            'name' =>  'Toddler Products',
            'slug'  =>  Str::slug('Toddler Products'),
            'parent_id' => 8,
        ]);
        Category::updateOrCreate([
            'name' =>  'Kids Products',
            'slug'  =>  Str::slug('Kids Products'),
            'parent_id' => 8,
        ]);
        Category::updateOrCreate([
            'name' =>  'Children Products',
            'slug'  =>  Str::slug('Children Products'),
            'parent_id' => 8,
        ]);
        Category::updateOrCreate([
            'name' =>  'Baby Stationery',
            'slug'  =>  Str::slug('Baby Stationery'),
            'parent_id' => 8,
        ]);
        Category::updateOrCreate([
            'name' =>  'Diapering',
            'slug'  =>  Str::slug('Diapering'),
            'parent_id' => 8,
        ]);
    }
}
