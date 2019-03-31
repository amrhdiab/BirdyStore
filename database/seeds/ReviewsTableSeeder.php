<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 1,
            'product_id' => 1,
            'status'     => 1,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 1,
            'product_id' => 2,
            'status'     => 0,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 1,
            'product_id' => 3,
            'status'     => 1,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 1,
            'product_id' => 4,
            'status'     => 1,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 2,
            'product_id' => 1,
            'status'     => 1,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 2,
            'product_id' => 2,
            'status'     => 1,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 2,
            'product_id' => 3,
            'status'     => 0,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 2,
            'product_id' => 4,
            'status'     => 1,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 3,
            'product_id' => 1,
            'status'     => 0,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 3,
            'product_id' => 1,
            'status'     => 1,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 3,
            'product_id' => 2,
            'status'     => 1,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 3,
            'product_id' => 3,
            'status'     => 0,
        ]);

        Review::create([
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem nulla. Nam finibus, libero vel finibus feugiat, elit metus iaculis augue, eget molestie ex massa nec nisi.',
            'user_id'    => 3,
            'product_id' => 4,
            'status'     => 1,
        ]);
    }
}
