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
            'name' => 'Electronics',
            'featured_image' => 'Electronics-cat.png',
            'slug' => str_slug('Electronics'),
        ]);

        Category::create([
            'name' => 'Women\'s Fashion',
            'featured_image' => 'Women\'s Fashion-cat.jpg',
            'slug' => str_slug('Women\'s Fashion'),
        ]);

        Category::create([
            'name' => 'Men\'s Fashion',
            'featured_image' => 'Men\'s Fashion-cat.jpg',
            'slug' => str_slug('Men\'s Fashion'),
        ]);

        Category::create([
            'name' => 'Home and Kitchen',
            'featured_image' => 'Home and Kitchen-cat.jpg',
            'slug' => str_slug('Home and Kitchen'),
        ]);

        Category::create([
            'name' => 'Arts & Crafts',
            'featured_image' => 'Arts & Crafts-cat.jpg',
            'slug' => str_slug('Arts & Crafts'),
        ]);

        Category::create([
            'name' => 'Automotive',
            'featured_image' => 'Automotive-cat.png',
            'slug' => str_slug('Automotive'),
        ]);

        Category::create([
            'name' => 'Beauty and personal care',
            'featured_image' => 'Beauty and personal care-cat.jpg',
            'slug' => str_slug('Beauty and personal care'),
        ]);

        Category::create([
            'name' => 'Pet supplies',
            'featured_image' => 'Pet supplies-cat.jpg',
            'slug' => str_slug('Pet supplies'),
        ]);

        Category::create([
            'name' => 'Video Games',
            'featured_image' => 'Video Games-cat.jpg',
            'slug' => str_slug('Video Games'),
        ]);

        Category::create([
            'name' => 'Books & Audible',
            'featured_image' => 'Books & Audible-cat.jpg',
            'slug' => str_slug('Books & Audible'),
        ]);
    }
}
