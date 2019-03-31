<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Setting::create([
            'website_name'    => 'Birdy Store',
            'contact_number'  => '999-999-999',
            'contact_email_1' => 'contact@birdystore.build',
            'contact_email_2' => 'support@birdystore.build',
            'facebook'        => 'https://www.facebook.com/',
            'twitter'         => 'https://www.twitter.com/',
            'google'          => 'https://plus.google.com/',
            'dribble'         => 'https://www.dribble.com/',
            'slogan'          => 'Highest quality at better prices',
            'address'         => '17 lebanon square,Cairo,Egypt',
            'lat'             => '30.060136',
            'lng'             => '31.193535',
            'about_us'        => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a mauris enim. Nunc varius id orci eu laoreet.
            Mauris feugiat nunc quis pretium blandit. Nam cursus bibendum convallis. Nam fringilla ut arcu id congue. Pellentesque sit amet lectus ultrices,
            cursus nulla a, laoreet tortor. Quisque ornare dolor at ipsum pellentesque maximus.
            Vivamus neque nulla, efficitur vehicula erat a, faucibus gravida quam. Suspendisse efficitur tortor at accumsan interdum. Quisque semper libero massa,
            sed egestas neque malesuada eget.
            Vivamus lobortis neque in neque consequat congue. Suspendisse viverra, massa in malesuada lacinia, erat est lobortis turpis,
            ac rutrum urna velit ullamcorper ipsum. Sed at auctor ante.
            Quisque eu quam id eros volutpat mattis sed a ipsum. Fusce sollicitudin aliquet libero. Nullam pulvinar ipsum turpis, nec rhoncus neque cursus id.
            Mauris ultricies libero risus. Proin dolor eros, sollicitudin id euismod quis, dictum eget diam. In sed mauris nisl.',
            'logo'            => 'store-white.png',
            'logo2'            => 'store.png',
        ]);
    }
}
