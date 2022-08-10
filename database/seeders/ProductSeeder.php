<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = Product::create([
            'title' => 'Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops',
            'slug' => Str::slug('Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops'),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-1.jpg',
            'excerpt' => 'Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday',
            'description' => "<p>Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday</p>",
            'price' => 1500,
            'sale_price' => 1200,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => false,
            'trending' => true,
            'popular' => true
        ]);
        $product1->categories()->attach(1);
        $product1->tags()->attach(1);
        $product1->colors()->attach(1);
        $product1->sizes()->attach(1);

        $product2 = Product::create([
            'title' => 'Mens Casual Premium Slim Fit T-Shirts',
            'slug' => Str::slug('Mens Casual Premium Slim Fit T-Shirts'),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-2.jpg',
            'excerpt' => 'Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing.',
            'description' => "<p>Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.</p>",
            'price' => 120,
            'sale_price' => 100,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => true,
            'trending' => false,
            'popular' => true
        ]);
        $product2->categories()->attach(1);
        $product2->tags()->attach(1);
        $product2->colors()->attach(1);
        $product2->sizes()->attach(1);

        $product3 = Product::create([
            'title' => 'Mens Cotton Jacket',
            'slug' => Str::slug('Mens Cotton Jacket'),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-3.jpg',
            'excerpt' => 'great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling,',
            'description' => "<p>great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling, traveling or other outdoors. Good gift choice for you or your family member. A warm hearted love to Father, husband or son in this thanksgiving or Christmas Day.</p>",
            'price' => 55,
            'sale_price' => 52,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => true,
            'trending' => true,
            'popular' => false
        ]);
        $product3->categories()->attach(1);
        $product3->tags()->attach(1);
        $product3->colors()->attach(1);
        $product3->sizes()->attach(1);

        $product4 = Product::create([
            'title' => 'Mens Casual Slim Fit',
            'slug' => Str::slug('Mens Casual Slim Fit'),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-4.jpg',
            'excerpt' => 'The color could be slightly different between on the screen and in practice. ',
            'description' => "<p>The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.</p>",
            'price' => 20,
            'sale_price' => 19,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => false,
            'trending' => true,
            'popular' => true
        ]);
        $product4->categories()->attach(1);
        $product4->tags()->attach(1);
        $product4->colors()->attach(1);
        $product4->sizes()->attach(1);

        $product5 = Product::create([
            'title' => 'John Hardy Womens Legends Naga Gold & Silver Dragon Station Chain Bracelet',
            'slug' => Str::slug('John Hardy Womens Legends Naga Gold & Silver Dragon Station Chain Bracelet'),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-5.jpg',
            'excerpt' => 'From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the oceans pearl.',
            'description' => "<p>From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the ocean's pearl. Wear facing inward to be bestowed with love and abundance, or outward for protection.</p>",
            'price' => 695,
            'sale_price' => 625,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => true,
            'trending' => false,
            'popular' => true
        ]);
        $product5->categories()->attach(1);
        $product5->tags()->attach(1);
        $product5->colors()->attach(1);
        $product5->sizes()->attach(1);

        $product6 = Product::create([
            'title' => 'Solid Gold Petite Micropave ',
            'slug' => Str::slug('Solid Gold Petite Micropave '),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-6.jpg',
            'excerpt' => 'Satisfaction Guaranteed. Return or exchange any order within 30 days.Designed and sold by Hafeez Center in the United States.',
            'description' => "<p>Satisfaction Guaranteed. Return or exchange any order within 30 days.Designed and sold by Hafeez Center in the United States. Satisfaction Guaranteed. Return or exchange any order within 30 days.</p>",
            'price' => 162,
            'sale_price' => 120,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => false,
            'trending' => true,
            'popular' => false
        ]);
        $product6->categories()->attach(1);
        $product6->tags()->attach(1);
        $product6->colors()->attach(1);
        $product6->sizes()->attach(1);

        $product7 = Product::create([
            'title' => 'White Gold Plated Princess',
            'slug' => Str::slug('White Gold Plated Princess'),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-7.jpg',
            'excerpt' => 'Classic Created Wedding Engagement Solitaire Diamond Promise Ring for Her.',
            'description' => "<p>Classic Created Wedding Engagement Solitaire Diamond Promise Ring for Her. Gifts to spoil your love more for Engagement, Wedding, Anniversary, Valentine's Day...</p>",
            'price' => 19,
            'sale_price' => 11,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => false,
            'trending' => true,
            'popular' => true
        ]);
        $product7->categories()->attach(1);
        $product7->tags()->attach(1);
        $product7->colors()->attach(1);
        $product7->sizes()->attach(1);

        $product8 = Product::create([
            'title' => 'Pierced Owl Rose Gold Plated Stainless Steel Double',
            'slug' => Str::slug('Pierced Owl Rose Gold Plated Stainless Steel Double'),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-8.jpg',
            'excerpt' => 'Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel',
            'description' => "<p>Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel</p>",
            'price' => 19,
            'sale_price' => 12,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => true,
            'trending' => true,
            'popular' => true
        ]);
        $product8->categories()->attach(1);
        $product8->tags()->attach(1);
        $product8->colors()->attach(1);
        $product8->sizes()->attach(1);

        $product9 = Product::create([
            'title' => 'WD 2TB Elements Portable External Hard Drive - USB 3.0',
            'slug' => Str::slug('WD 2TB Elements Portable External Hard Drive - USB 3.0'),
            'sku' => 'AJILSFDSITWEF',
            'weight' => 220,
            'length' => 105,
            'wide' => 32,
            'height' => 30,
            'user_id' => 1,
            'brand_id' => 1,
            'featured_image' => 'product-9.jpg',
            'excerpt' => 'USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity',
            'description' => "<p>USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system</p>",
            'price' => 64,
            'sale_price' => 62,
            'stock_status' => 'In Stock',
            'product_collections' => 'Best Sellers',
            'labels' => 'Hot',
            'featured' => false,
            'trending' => true,
            'popular' => true
        ]);
        $product9->categories()->attach(1);
        $product9->tags()->attach(1);
        $product9->colors()->attach(1);
        $product9->sizes()->attach(1);
    }
}
