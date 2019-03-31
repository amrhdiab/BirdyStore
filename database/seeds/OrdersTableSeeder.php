<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Order::create([
            'first_name'  => 'John',
            'last_name'   => 'Wesee',
            'email'       => 'john@gmail.com',
            'address'     => '3874 Rhode Island Avenue',
            'phone'       => '999999',
            'city'        => 'Washington',
            'country'     => 'USA',
            'postal'      => '998899',
            'notes'       => 'Please call me on arrival.',
            'total_price' => '540',
            'user_id'     => '1',
            'status'      => 'Waiting',
        ]);

        Order::create([
            'first_name'  => 'John',
            'last_name'   => 'Wesee',
            'email'       => 'john@gmail.com',
            'address'     => '3874 Rhode Island Avenue',
            'phone'       => '999999',
            'city'        => 'Washington',
            'country'     => 'USA',
            'postal'      => '998899',
            'notes'       => 'Please call me on arrival.',
            'total_price' => '11920',
            'user_id'     => '1',
            'status'      => 'Shipped',
        ]);

        Order::create([
            'first_name'  => 'John',
            'last_name'   => 'Wesee',
            'email'       => 'john@gmail.com',
            'address'     => '3874 Rhode Island Avenue',
            'phone'       => '999999',
            'city'        => 'Washington',
            'country'     => 'USA',
            'postal'      => '998899',
            'notes'       => 'Please call me on arrival.',
            'total_price' => '26280',
            'user_id'     => '1',
            'status'      => 'Delivered',
        ]);

        Order::create([
            'first_name'  => 'Frank',
            'last_name'   => 'Peterson',
            'email'       => 'frank@gmail.com',
            'address'     => '1365 Dark Hollow Road',
            'phone'       => '999999',
            'city'        => 'Brigantine',
            'country'     => 'USA',
            'postal'      => '334433',
            'notes'       => 'Please take care of the packiging.',
            'total_price' => '2960',
            'user_id'     => '2',
            'status'      => 'Waiting',
        ]);

        Order::create([
            'first_name'  => 'Frank',
            'last_name'   => 'Peterson',
            'email'       => 'frank@gmail.com',
            'address'     => '1365 Dark Hollow Road',
            'phone'       => '999999',
            'city'        => 'Brigantine',
            'country'     => 'USA',
            'postal'      => '334433',
            'notes'       => 'Please take care of the packiging.',
            'total_price' => '11600',
            'user_id'     => '2',
            'status'      => 'Shipped',
        ]);

        Order::create([
            'first_name'  => 'Frank',
            'last_name'   => 'Peterson',
            'email'       => 'frank@gmail.com',
            'address'     => '1365 Dark Hollow Road',
            'phone'       => '999999',
            'city'        => 'Brigantine',
            'country'     => 'USA',
            'postal'      => '334433',
            'notes'       => 'Please take care of the packiging.',
            'total_price' => '19020',
            'user_id'     => '2',
            'status'      => 'Delivered',
        ]);

        Order::create([
            'first_name'  => 'Jennifer',
            'last_name'   => 'Saunders',
            'email'       => 'jennifer@gmail.com',
            'address'     => '1838 Wyatt Street',
            'phone'       => '999999',
            'city'        => 'Boca Raton',
            'country'     => 'USA',
            'postal'      => '115544',
            'notes'       => 'Would like to receive the package at home.',
            'total_price' => '3000',
            'user_id'     => '3',
            'status'      => 'Waiting',
        ]);

        Order::create([
            'first_name'  => 'Jennifer',
            'last_name'   => 'Saunders',
            'email'       => 'jennifer@gmail.com',
            'address'     => '1838 Wyatt Street',
            'phone'       => '999999',
            'city'        => 'Boca Raton',
            'country'     => 'USA',
            'postal'      => '115544',
            'notes'       => 'Would like to receive the package at home.',
            'total_price' => '6680',
            'user_id'     => '3',
            'status'      => 'Shipped',
        ]);

        Order::create([
            'first_name'  => 'Jennifer',
            'last_name'   => 'Saunders',
            'email'       => 'jennifer@gmail.com',
            'address'     => '1838 Wyatt Street',
            'phone'       => '999999',
            'city'        => 'Boca Raton',
            'country'     => 'USA',
            'postal'      => '115544',
            'notes'       => 'Would like to receive the package at home.',
            'total_price' => '18900',
            'user_id'     => '3',
            'status'      => 'Delivered',
        ]);
    }
}
