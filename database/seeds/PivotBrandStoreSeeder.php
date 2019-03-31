<?php

use Illuminate\Database\Seeder;

class PivotBrandStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        DB::table('brand_store')->insert([
            'store_id' => 1,
            'brand_id' => 3
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 1,
            'brand_id' => 15
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 1,
            'brand_id' => 25
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 2,
            'brand_id' => 3
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 2,
            'brand_id' => 15
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 2,
            'brand_id' => 25
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 3,
            'brand_id' => 2
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 3,
            'brand_id' => 4
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 3,
            'brand_id' => 7
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 4,
            'brand_id' => 12
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 5,
            'brand_id' => 2
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 5,
            'brand_id' => 4
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 5,
            'brand_id' => 7
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 5,
            'brand_id' => 13
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 5,
            'brand_id' => 14
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 5,
            'brand_id' => 17
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 6,
            'brand_id' => 4
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 6,
            'brand_id' => 2
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 6,
            'brand_id' => 17
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 7,
            'brand_id' => 1
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 8,
            'brand_id' => 19
        ]);
        DB::table('brand_store')->insert([
            'store_id' => 8,
            'brand_id' => 20
        ]);
    }
}
