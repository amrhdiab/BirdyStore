<?php

use Illuminate\Database\Seeder;
use App\SubCat;

class SubCatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        SubCat::create([
            'name' => 'Cameras & Photography',
            'featured_image' => 'Cameras & Photography-subcat.jpg',
            'category_id' => '1',
            'slug' => str_slug('Cameras & Photography'),
        ]);

        SubCat::create([
            'name' => 'Televisions',
            'featured_image' => 'Televisions-subcat.jpg',
            'category_id' => '1',
            'slug' => str_slug('Televisions'),
        ]);

        SubCat::create([
            'name' => 'Headphones',
            'featured_image' => 'Headphones-subcat.jpg',
            'category_id' => '1',
            'slug' => str_slug('Headphones'),
        ]);

        SubCat::create([
            'name' => 'Women Clothing',
            'featured_image' => 'Women Clothing-subcat.jpg',
            'category_id' => '2',
            'slug' => str_slug('Women Clothing'),
        ]);

        SubCat::create([
            'name' => 'Women Shoes',
            'featured_image' => 'Women Shoes-subcat.jpg',
            'category_id' => '2',
            'slug' => str_slug('Women Shoes'),
        ]);

        SubCat::create([
            'name' => 'Jewelry',
            'featured_image' => 'Women Jewelry-subcat.jpg',
            'category_id' => '2',
            'slug' => str_slug('Jewelry'),
        ]);

        SubCat::create([
            'name' => 'Men Clothing',
            'featured_image' => 'Men Clothing-subcat.jpg',
            'category_id' => '3',
            'slug' => str_slug('Men Clothing'),
        ]);

        SubCat::create([
            'name' => 'Men Shoes',
            'featured_image' => 'Men Shoes-subcat.jpg',
            'category_id' => '3',
            'slug' => str_slug('Men Shoes'),
        ]);

        SubCat::create([
            'name' => 'Watches',
            'featured_image' => 'Men Watches-subcat.jpg',
            'category_id' => '3',
            'slug' => str_slug('Watches'),
        ]);

        SubCat::create([
            'name' => 'Furniture',
            'featured_image' => 'Furniture-subcat.jpg',
            'category_id' => '4',
            'slug' => str_slug('Furniture'),
        ]);

        SubCat::create([
            'name' => 'Kitchen Tools',
            'featured_image' => 'Kitchen Tools-subcat.jpg',
            'category_id' => '4',
            'slug' => str_slug('Kitchen Tools'),
        ]);

        SubCat::create([
            'name' => 'Paintings',
            'featured_image' => 'Paintings-subcat.jpg',
            'category_id' => '5',
            'slug' => str_slug('Paintings'),
        ]);

        SubCat::create([
            'name' => 'Needle Work',
            'featured_image' => 'Needle Work-subcat.jpg',
            'category_id' => '5',
            'slug' => str_slug('Needle Work'),
        ]);

        SubCat::create([
            'name' => 'Car Care',
            'featured_image' => 'Car Care-subcat.jpg',
            'category_id' => '6',
            'slug' => str_slug('Car Care'),
        ]);

        SubCat::create([
            'name' => 'Car Interior Accessories',
            'featured_image' => 'Car Interior Accessories-subcat.jpg',
            'category_id' => '6',
            'slug' => str_slug('Car Interior Accessories'),
        ]);

        SubCat::create([
            'name' => 'Makeup',
            'featured_image' => 'Makeup-subcat.jpg',
            'category_id' => '7',
            'slug' => str_slug('Makeup'),
        ]);

        SubCat::create([
            'name' => 'Fragrance',
            'featured_image' => 'Fragrance-subcat.jpg',
            'category_id' => '7',
            'slug' => str_slug('Fragrance'),
        ]);

        SubCat::create([
            'name' => 'Dogs Food',
            'featured_image' => 'Dogs Food-subcat.jpg',
            'category_id' => '8',
            'slug' => str_slug('Dogs Food'),
        ]);

        SubCat::create([
            'name' => 'Cats Food',
            'featured_image' => 'Cats Food-subcat.jpg',
            'category_id' => '8',
            'slug' => str_slug('Cats Food'),
        ]);

        SubCat::create([
            'name' => 'PlayStation 4',
            'featured_image' => 'PlayStation 4-subcat.jpg',
            'category_id' => '9',
            'slug' => str_slug('PlayStation 4'),
        ]);

        SubCat::create([
            'name' => 'Xbox',
            'featured_image' => 'Xbox-subcat.png',
            'category_id' => '9',
            'slug' => str_slug('Xbox'),
        ]);


        SubCat::create([
            'name' => 'Books',
            'featured_image' => 'Books-subcat.jpg',
            'category_id' => '10',
            'slug' => str_slug('Books'),
        ]);

        SubCat::create([
            'name' => 'Kindle Books',
            'featured_image' => 'Kindle Books-subcat.jpg',
            'category_id' => '10',
            'slug' => str_slug('Kindle Books'),
        ]);

        SubCat::create([
            'name' => 'Magazines',
            'featured_image' => 'Magazines-subcat.jpg',
            'category_id' => '10',
            'slug' => str_slug('Magazines'),
        ]);
    }
}
