<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John J. Weese',
            'email' => 'john@gmail.com',
            'password' => bcrypt(123123),
            'avatar' =>'john.png',
        ]);

        User::create([
            'name' => 'Frank Peterson',
            'email' => 'frank@gmail.com',
            'password' => bcrypt(123123),
            'avatar' =>'frank.jpg',
        ]);

        User::create([
            'name' => 'Jennifer A. Saunders',
            'email' => 'jennifer@gmail.com',
            'password' => bcrypt(123123),
            'avatar' =>'jennifer.jpg',
        ]);
    }
}
