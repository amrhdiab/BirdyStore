<?php

use Illuminate\Database\Seeder;

class PivotOrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 2,
            'product_id' => 2,
            'quantity' => 2,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 2,
            'product_id' => 3,
            'quantity' => 2,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 3,
            'product_id' => 2,
            'quantity' => 3,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 3,
            'product_id' => 3,
            'quantity' => 3,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 3,
            'product_id' => 4,
            'quantity' => 3,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 4,
            'product_id' => 2,
            'quantity' => 1,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 5,
            'product_id' => 3,
            'quantity' => 2,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 5,
            'product_id' => 4,
            'quantity' => 2,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 6,
            'product_id' => 3,
            'quantity' => 3,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 6,
            'product_id' => 4,
            'quantity' => 3,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 6,
            'product_id' => 1,
            'quantity' => 3,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 7,
            'product_id' => 3,
            'quantity' => 1,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 8,
            'product_id' => 4,
            'quantity' => 2,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 8,
            'product_id' => 1,
            'quantity' => 2,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 9,
            'product_id' => 4,
            'quantity' => 3,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 9,
            'product_id' => 1,
            'quantity' => 3,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 9,
            'product_id' => 2,
            'quantity' => 3,
        ]);
    }
}
