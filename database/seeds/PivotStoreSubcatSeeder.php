<?php

use Illuminate\Database\Seeder;

class PivotStoreSubcatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_sub_cat')->insert([
            'store_id' => 1,
            'sub_cat_id' => 1
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 1,
            'sub_cat_id' => 2
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 1,
            'sub_cat_id' => 3
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 1,
            'sub_cat_id' => 15
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 2,
            'sub_cat_id' => 1
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 2,
            'sub_cat_id' => 2
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 2,
            'sub_cat_id' => 3
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 2,
            'sub_cat_id' => 15
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 3,
            'sub_cat_id' => 4
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 3,
            'sub_cat_id' => 5
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 4,
            'sub_cat_id' => 20
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 4,
            'sub_cat_id' => 21
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 5,
            'sub_cat_id' => 7
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 5,
            'sub_cat_id' => 8
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 6,
            'sub_cat_id' => 16
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 6,
            'sub_cat_id' => 17
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 7,
            'sub_cat_id' => 14
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 7,
            'sub_cat_id' => 15
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 8,
            'sub_cat_id' => 18
        ]);
        DB::table('store_sub_cat')->insert([
            'store_id' => 8,
            'sub_cat_id' => 19
        ]);
    }
}
