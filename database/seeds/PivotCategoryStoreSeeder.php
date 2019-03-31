<?php

use Illuminate\Database\Seeder;

class PivotCategoryStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_store')->insert([
            'category_id' => 1,
            'store_id' => 1
        ]);

        DB::table('category_store')->insert([
            'category_id' => 1,
            'store_id' => 2
        ]);

        DB::table('category_store')->insert([
            'category_id' => 2,
            'store_id' => 3
        ]);

        DB::table('category_store')->insert([
            'category_id' => 9,
            'store_id' => 4
        ]);

        DB::table('category_store')->insert([
            'category_id' => 3,
            'store_id' => 5
        ]);

        DB::table('category_store')->insert([
            'category_id' => 7,
            'store_id' => 6
        ]);

        DB::table('category_store')->insert([
            'category_id' => 6,
            'store_id' => 7
        ]);

        DB::table('category_store')->insert([
            'category_id' => 8,
            'store_id' => 8
        ]);
    }
}
