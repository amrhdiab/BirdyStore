<?php

use App\Slider;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Slider::create([
            'headline'      => 'WOMEN FASHION',
            'title'         => 'HUGE DISCOUNTS AVAILABLE',
            'sub_title'     => 'ALWAYS STAY TUNED WITH OUR HOT DEALS',
            'action1_title' => 'SEE COLLECTION',
            'action2_title' => '',
            'action1_link'  => 'http://birdystore.build/shop/category/womens-fashion',
            'action2_link'  => '',
            'bg_media'      => 'slide1-bg.jpg',
            'image1'        => '',
            'image2'        => '',
            'image3'        => '',
            'image1_link'   => '',
            'image2_link'   => '',
            'image3_link'   => '',
        ]);

        Slider::create([
            'headline'      => 'ELECTRONICS & GADGETS',
            'title'         => 'DISCOUVER WHAT\'S NEW',
            'sub_title'     => 'INNOVATION AND PERFORMANCE MEANS MORE',
            'action1_title' => 'SHOP NOW',
            'action2_title' => '',
            'action1_link'  => 'http://birdystore.build/shop/category/electronics',
            'action2_link'  => '',
            'bg_media'      => 'slide2-bg.jpg',
            'image1'        => '',
            'image2'        => '',
            'image3'        => '',
            'image1_link'   => '',
            'image2_link'   => '',
            'image3_link'   => '',
        ]);

        Slider::create([
            'headline'      => 'MEN\'S FASHION',
            'title'         => 'NEW SEASON\'S DEALS',
            'sub_title'     => 'UNIQUE AND ELEGANT STYLES EVERYWHERE',
            'action1_title' => 'SEE COLLECTION',
            'action2_title' => '',
            'action1_link'  => 'http://birdystore.build/shop/category/mens-fashion',
            'action2_link'  => '',
            'bg_media'      => 'slide3-bg.jpg',
            'image1'        => 'slide3-image1.jpeg',
            'image2'        => 'slide3-image2.jpg',
            'image3'        => 'slide3-image3.jpg',
            'image1_link'   => 'http://birdystore.build/shop/category/mens-fashion/men-clothing',
            'image2_link'   => 'http://birdystore.build/shop/category/mens-fashion/men-shoes',
            'image3_link'   => 'http://birdystore.build/shop/category/mens-fashion/watches',
        ]);

        Slider::create([
            'headline'      => 'BECAUSE YOU DESERVE BETTER',
            'title'         => 'WE PROVIDE ONLY TOP NOTCH QUALITY',
            'sub_title'     => 'WHAT ARE YOU WAITING FOR?',
            'action1_title' => 'START SHOPPING',
            'action2_title' => '',
            'action1_link'  => 'http://birdystore.build/shop/all',
            'action2_link'  => '',
            'bg_media'      => 'slide4-bg.jpg',
            'image1'        => '',
            'image2'        => '',
            'image3'        => '',
            'image1_link'   => '',
            'image2_link'   => '',
            'image3_link'   => '',
        ]);

        Slider::create([
            'headline'      => 'BRAND NEW STYLES AND MORE',
            'title'         => 'UNIQUENESS IN YOUR TASTE DEFINED HERE',
            'sub_title'     => '',
            'action1_title' => 'SHOP NOW',
            'action2_title' => '',
            'action1_link'  => 'http://birdystore.build/shop/all',
            'action2_link'  => '',
            'bg_media'      => 'slide5-bg.jpg',
            'image1'        => '',
            'image2'        => '',
            'image3'        => '',
            'image1_link'   => '',
            'image2_link'   => '',
            'image3_link'   => '',
        ]);
    }
}
