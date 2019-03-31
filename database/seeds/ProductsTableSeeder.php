<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Canon PowerShot Digital Camera',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'600',
            'featured_image'=>'canon1.jpg',
            'images'=>'canon1.jpg|canon2.jpg|canon3.jpg|canon4.jpg',
            'is_featured'=>'1',
            'has_offer'=>'1',
            'discount'=>'10',
            'new_price'=>'540',
            'stock' => '65',
            'sales' => '22',
            'admin_id' => '1',
            'sub_cat_id' => '1',
            'brand_id' => '3',
            'slug' => str_slug('Canon PowerShot Digital Camera'),
        ]);

        Product::create([
            'name' => 'Canon EOS 5D Mark IV Full Frame Digital SLR Camera',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'3700',
            'featured_image'=>'canon5.jpg',
            'images'=>'canon5.jpg|canon6.jpg|canon7.jpg|canon8.jpg',
            'is_featured'=>'0',
            'has_offer'=>'1',
            'discount'=>'20',
            'new_price'=>'2960',
            'stock' => '16',
            'sales' => '53',
            'admin_id' => '1',
            'sub_cat_id' => '1',
            'brand_id' => '3',
            'slug' => str_slug('Canon EOS 5D Mark IV Full Frame Digital SLR Camera'),
        ]);

        Product::create([
            'name' => 'Samsung QN75Q8FNB 75" Q8FN QLED Smart 4K UHD TV',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'3000',
            'featured_image'=>'tv1.jpg',
            'images'=>'tv1.jpg|tv2.jpg|tv3.jpg|tv4.jpg',
            'is_featured'=>'1',
            'has_offer'=>'0',
            'discount'=>'',
            'new_price'=>'3000',
            'stock' => '11',
            'sales' => '44',
            'admin_id' => '1',
            'sub_cat_id' => '2',
            'brand_id' => '25',
            'slug' => str_slug('Samsung QN75Q8FNB 75" Q8FN QLED Smart 4K UHD TV'),
        ]);

        Product::create([
            'name' => 'LG Electronics 65SK8000PUA 65-Inch 4K Ultra HD Smart LED TV',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'2800',
            'featured_image'=>'tv5.jpg',
            'images'=>'tv5.jpg|tv6.jpg|tv7.jpg|tv8.jpg',
            'is_featured'=>'0',
            'has_offer'=>'0',
            'discount'=>'',
            'new_price'=>'2800',
            'stock' => '19',
            'sales' => '88',
            'admin_id' => '1',
            'sub_cat_id' => '2',
            'brand_id' => '15',
            'slug' => str_slug('LG Electronics 65SK8000PUA 65-Inch 4K Ultra HD Smart LED TV'),
        ]);

        Product::create([
            'name' => 'adidas Men\'s Essentials 3-Stripe Tricot Track Jacket',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'24',
            'featured_image'=>'b1.jpg',
            'images'=>'b1.jpg|b2.jpg|b3.jpg|b4.jpg',
            'is_featured'=>'0',
            'has_offer'=>'0',
            'discount'=>'',
            'new_price'=>'24',
            'stock' => '123',
            'sales' => '32',
            'admin_id' => '1',
            'sub_cat_id' => '7',
            'brand_id' => '2',
            'slug' => str_slug('adidas Men\'s Essentials 3-Stripe Tricot Track Jacket'),
        ]);

        Product::create([
            'name' => 'Legendary Whitetails Men\'s Journeyman Flannel Lined Rugged Shirt Jacket',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'79',
            'featured_image'=>'a1.jpg',
            'images'=>'a1.jpg|a2.jpg|a3.jpg',
            'is_featured'=>'0',
            'has_offer'=>'0',
            'discount'=>'',
            'new_price'=>'79',
            'stock' => '56',
            'sales' => '42',
            'admin_id' => '1',
            'sub_cat_id' => '7',
            'brand_id' => '14',
            'slug' => str_slug('Legendary Whitetails Men\'s Journeyman Flannel Lined Rugged Shirt Jacket'),
        ]);

        Product::create([
            'name' => 'GIVON Mens Long Sleeve Draped Lightweight Open Front Hooded Cardigan',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'31',
            'featured_image'=>'c1.jpg',
            'images'=>'c1.jpg|c2.jpg',
            'is_featured'=>'1',
            'has_offer'=>'0',
            'discount'=>'',
            'new_price'=>'31',
            'stock' => '115',
            'sales' => '70',
            'admin_id' => '1',
            'sub_cat_id' => '7',
            'brand_id' => '14',
            'slug' => str_slug('GIVON Mens Long Sleeve Draped Lightweight Open Front Hooded Cardigan'),
        ]);

        Product::create([
            'name' => 'Helisopus Men\'s Stretch Solid Pullover Slim Fit Long Sleeve Casual Sweater',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'23',
            'featured_image'=>'d1.jpg',
            'images'=>'d1.jpg|d2.jpg|d3.jpg',
            'is_featured'=>'1',
            'has_offer'=>'1',
            'discount'=>'10',
            'new_price'=>'20.7',
            'stock' => '235',
            'sales' => '144',
            'admin_id' => '1',
            'sub_cat_id' => '7',
            'brand_id' => '7',
            'slug' => str_slug('Helisopus Men\'s Stretch Solid Pullover Slim Fit Long Sleeve Casual Sweater'),
        ]);

        Product::create([
            'name' => 'Rolex Submariner Stainless Steel Yellow Gold Watch Blue Ceramic Watch 116613',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'13490',
            'featured_image'=>'e1.jpg',
            'images'=>'e1.jpg|e2.jpg|e3.jpg',
            'is_featured'=>'1',
            'has_offer'=>'0',
            'discount'=>'',
            'new_price'=>'13490',
            'stock' => '17',
            'sales' => '5',
            'admin_id' => '1',
            'sub_cat_id' => '9',
            'brand_id' => '24',
            'slug' => str_slug('Rolex Submariner Stainless Steel Yellow Gold Watch Blue Ceramic Watch 116613'),
        ]);

        Product::create([
            'name' => 'Omega Men\'s Analog Display Mechanical Hand Wind Brown Watch',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'3641',
            'featured_image'=>'f1.jpg',
            'images'=>'f1.jpg|f2.jpg',
            'is_featured'=>'0',
            'has_offer'=>'0',
            'discount'=>'',
            'new_price'=>'3641',
            'stock' => '23',
            'sales' => '12',
            'admin_id' => '1',
            'sub_cat_id' => '9',
            'brand_id' => '18',
            'slug' => str_slug('Omega Men\'s Analog Display Mechanical Hand Wind Brown Watch'),
        ]);

        Product::create([
            'name' => 'NIKE Men\'s Shox NZ Running Shoe',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'43',
            'featured_image'=>'g1.jpg',
            'images'=>'g1.jpg|g2.jpg|g3.jpg',
            'is_featured'=>'0',
            'has_offer'=>'0',
            'discount'=>'',
            'new_price'=>'43',
            'stock' => '86',
            'sales' => '19',
            'admin_id' => '1',
            'sub_cat_id' => '8',
            'brand_id' => '17',
            'slug' => str_slug('NIKE Men\'s Shox NZ Running Shoe'),
        ]);

        Product::create([
            'name' => 'adidas Men\'s CF Racer Tr',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non dictum erat. Cras commodo ac urna a pulvinar. Integer tincidunt nisi neque, commodo dapibus dui faucibus at. Praesent in est sed urna venenatis vulputate. Donec rhoncus vel dolor eget lobortis. Suspendisse vitae iaculis ligula, non sodales orci. Aenean justo turpis, efficitur eu ornare in, commodo id nunc. Integer quis convallis risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel tortor diam.',
            'price'=>'33.34',
            'featured_image'=>'h1.jpg',
            'images'=>'h1.jpg|h2.jpg|h3.jpg',
            'is_featured'=>'1',
            'has_offer'=>'1',
            'discount'=>'13',
            'new_price'=>'29',
            'stock' => '43',
            'sales' => '32',
            'admin_id' => '1',
            'sub_cat_id' => '8',
            'brand_id' => '2',
            'slug' => str_slug('adidas Men\'s CF Racer Tr'),
        ]);
    }
}
