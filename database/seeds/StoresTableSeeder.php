<?php

use Illuminate\Database\Seeder;
use App\Store;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Store::create([
            'name'           => 'The Street Store',
            'contact_email'  => 'someone@streetstore.com',
            'contact_number' => '999-333-222',
            'website'        => 'www.streetstore.com',
            'governorate'    => 'Cairo',
            'city'           => 'Maadi',
            'address'        => '23 Street, Some Area, Some City',
            'working_hours'  => 'Sat-Thursday 9.00 am. - 11 pm.',
            'lat'            => '29.962015',
            'lng'            => '31.303188',
            'location_id'    => '1',
            'avatar'         => 'store1.png',
            'slug'           => str_slug('The Street Store'),
        ]);

        Store::create([
            'name'           => 'The Computer Store',
            'contact_email'  => 'computer@store.com',
            'contact_number' => '333-222-111',
            'website'        => 'www.computerst.com',
            'governorate'    => 'Cairo',
            'city'           => 'Maadi',
            'address'        => '25 Street, Some Area, Some City',
            'working_hours'  => 'Sat-Thursday 9.00 am. - 11 pm.',
            'lat'            => '29.984703',
            'lng'            => '31.229596',
            'location_id'    => '1',
            'avatar'         => 'store2.png',
            'slug'           => str_slug('The Computer Store'),
        ]);

        Store::create([
            'name'           => 'Roses Store',
            'contact_email'  => 'roses@store.com',
            'contact_number' => '232-234-234',
            'website'        => 'www.roses.com',
            'governorate'    => 'Cairo',
            'city'           => 'Nasr City',
            'address'        => '13 Street, Some Area, Some City',
            'working_hours'  => 'Sat-Thursday 9.00 am. - 11 pm.',
            'lat'            => '30.060139',
            'lng'            => '31.337656',
            'location_id'    => '2',
            'avatar'         => 'store3.png',
            'slug'           => str_slug('Roses Store'),
        ]);

        Store::create([
            'name'           => 'Disney Store',
            'contact_email'  => 'disney@store.com',
            'contact_number' => '444-222-333',
            'website'        => 'www.disney.com',
            'governorate'    => 'Cairo',
            'city'           => 'Nasr City',
            'address'        => '12 Street, Some Area, Some City',
            'working_hours'  => 'Sat-Thursday 9.00 am. - 11 pm.',
            'lat'            => '30.061774',
            'lng'            => '31.344989',
            'location_id'    => '2',
            'avatar'         => 'store4.png',
            'slug'           => str_slug('Disney Store'),
        ]);

        Store::create([
            'name'           => 'The Branding Store',
            'contact_email'  => 'branding@store.com',
            'contact_number' => '333-222-333',
            'website'        => 'www.branding.com',
            'governorate'    => 'Gharbiya',
            'city'           => 'Tanta',
            'address'        => '19 Street, Some Area, Some City',
            'working_hours'  => 'Sat-Thursday 9.00 am. - 11 pm.',
            'lat'            => '30.794526',
            'lng'            => '30.998272',
            'location_id'    => '3',
            'avatar'         => 'store5.png',
            'slug'           => str_slug('The Branding Store'),
        ]);

        Store::create([
            'name'           => 'BjS Store',
            'contact_email'  => 'bjs@store.com',
            'contact_number' => '322-222-777',
            'website'        => 'www.bjs.com',
            'governorate'    => 'Gharbiya',
            'city'           => 'Tanta',
            'address'        => '7 Street, Some Area, Some City',
            'working_hours'  => 'Sat-Thursday 9.00 am. - 11 pm.',
            'lat'            => '30.795452',
            'lng'            => '31.001557',
            'location_id'    => '3',
            'avatar'         => 'store6.png',
            'slug'           => str_slug('BjS Store'),
        ]);

        Store::create([
            'name'           => 'Jack Store',
            'contact_email'  => 'jack@store.com',
            'contact_number' => '111-222-333',
            'website'        => 'www.jack.com',
            'governorate'    => 'Gharbiya',
            'city'           => 'Kafr El-Zayat',
            'address'        => '5 Street, Some Area, Some City',
            'working_hours'  => 'Sat-Thursday 9.00 am. - 11 pm.',
            'lat'            => '30.821937',
            'lng'            => '30.815827',
            'location_id'    => '4',
            'avatar'         => 'store7.png',
            'slug'           => str_slug('Jack Store'),
        ]);

        Store::create([
            'name'           => 'The Store',
            'contact_email'  => 'thestore@store.com',
            'contact_number' => '234-234-234',
            'website'        => 'www.thestore.com',
            'governorate'    => 'Gharbiya',
            'city'           => 'Kafr El-Zayat',
            'address'        => '22 Street, Some Area, Some City',
            'working_hours'  => 'Sat-Thursday 9.00 am. - 11 pm.',
            'lat'            => '30.825258',
            'lng'            => '30.818371',
            'location_id'    => '4',
            'avatar'         => 'store8.png',
            'slug'           => str_slug('The Store'),
        ]);
    }
}
