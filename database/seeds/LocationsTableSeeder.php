<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Location::create([
            'governorate' => 'Cairo',
            'city'        => 'Maadi',
            'lng_gov'     => '31.2357',
            'lat_gov'     => '30.0444',
            'lng_city'    => '31.2769',
            'lat_city'    => '29.9627',
        ]);

        Location::create([
            'governorate' => 'Cairo',
            'city'        => 'Nasr City',
            'lng_gov'     => '31.2357',
            'lat_gov'     => '30.0444',
            'lng_city'    => '31.3770',
            'lat_city'    => '30.0169',
        ]);

        Location::create([
            'governorate' => 'Gharbiya',
            'city'        => 'Tanta',
            'lng_gov'     => '31.0335',
            'lat_gov'     => '30.8754',
            'lng_city'    => '31.0004',
            'lat_city'    => '30.7865',
        ]);

        Location::create([
            'governorate' => 'Gharbiya',
            'city'        => 'Kafr El-Zayat',
            'lng_gov'     => '31.0335',
            'lat_gov'     => '30.8754',
            'lng_city'    => '30.8138',
            'lat_city'    => '30.8285',
        ]);
    }
}
