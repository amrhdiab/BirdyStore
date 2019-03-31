<?php

use Illuminate\Database\Seeder;

class PivotProductStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_store')->insert([
            'product_id' => 1,
            'store_id' => 1
        ]);

        DB::table('product_store')->insert([
            'product_id' => 1,
            'store_id' => 2
        ]);

        DB::table('product_store')->insert([
            'product_id' => 2,
            'store_id' => 1
        ]);

        DB::table('product_store')->insert([
            'product_id' => 2,
            'store_id' => 2
        ]);

        DB::table('product_store')->insert([
            'product_id' => 3,
            'store_id' => 1
        ]);
        DB::table('product_store')->insert([
            'product_id' => 3,
            'store_id' => 2
        ]);

        DB::table('product_store')->insert([
            'product_id' => 4,
            'store_id' => 1
        ]);
        DB::table('product_store')->insert([
            'product_id' => 4,
            'store_id' => 2
        ]);
    }
}
