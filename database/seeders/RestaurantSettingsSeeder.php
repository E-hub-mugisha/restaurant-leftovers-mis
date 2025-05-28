<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('restaurant_settings')->insert([
            'restaurant_name' => 'Tasty Bites Restaurant',
            'logo' => 'logos/tasty_bites_logo.png',
            'email' => 'info@tastybites.com',
            'phone' => '+250788123456',
            'address' => 'KN 45 St, Kigali, Rwanda',
            'days_open' => 'Monday, Tuesday, Wednesday, Thursday, Friday, Saturday',
            'opening_hours' => '8am - 10pm',
            'facebook' => 'https://facebook.com/tastybites',
            'instagram' => 'https://instagram.com/tastybites',
            'twitter' => 'https://twitter.com/tastybites',
            'about_us' => 'Tasty Bites is committed to reducing food waste while delivering delicious meals to our community.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
