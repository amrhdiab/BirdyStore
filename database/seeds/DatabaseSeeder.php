<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCatsTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PivotCategoryBrandSeeder::class);
        $this->call(PivotCategoryStoreSeeder::class);
        $this->call(PivotProductStoreSeeder::class);
        $this->call(PivotBrandSubcatSeeder::class);
        $this->call(PivotStoreSubcatSeeder::class);
        $this->call(PivotBrandStoreSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PivotOrderProductSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}
