<?php

namespace Database\Seeders;

use App\Models\Buffet;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class BuffetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch existing menus
        $menus = Menu::all();

        if ($menus->isEmpty()) {
            $this->command->warn('No menus found. Please seed menus first.');
            return;
        }

        $buffets = [
            [
                'name' => 'Traditional Rwandan Buffet',
                'description' => 'Includes isombe, ugali, beans, and grilled chicken. A taste of home!',
            ],
            [
                'name' => 'Vegetarian Delight',
                'description' => 'A healthy mix of steamed vegetables, plantains, beans, and fruit salad.',
            ],
            [
                'name' => 'Sunday Special',
                'description' => 'Roast beef, mashed potatoes, gravy, salads, and dessert. Perfect for family day!',
            ],
            [
                'name' => 'African Fusion Buffet',
                'description' => 'East and West African flavors: jollof rice, chapati, tilapia, and peanut stew.',
            ],
            [
                'name' => 'Breakfast Bonanza',
                'description' => 'Pancakes, eggs, sausages, fruits, coffee, and tea — perfect for a fresh start.',
            ],
            [
                'name' => 'Seafood Fiesta',
                'description' => 'A delicious mix of grilled fish, prawns, calamari, and seaweed salad.',
            ],
            [
                'name' => 'Kids Special Buffet',
                'description' => 'Mac & cheese, mini burgers, fries, juice, and cupcakes — for the little ones.',
            ],
            [
                'name' => 'Evening Chill Buffet',
                'description' => 'Grilled meats, local beers, fresh salads, and finger foods. Great for after work!',
            ],
            [
                'name' => 'Vegan Buffet',
                'description' => 'Tofu stir-fry, lentils, fresh avocado, chapati, and hibiscus juice.',
            ],
            [
                'name' => 'Italian Treat Buffet',
                'description' => 'Pasta, garlic bread, lasagna, and a selection of cheeses and desserts.',
            ],
        ];

        foreach ($buffets as $buffet) {
            Buffet::create([
                'name' => $buffet['name'],
                'description' => $buffet['description'],
                'is_available' => rand(0, 1),
                'menu_id' => $menus->random()->id,
            ]);
        }

        $this->command->info('Realistic buffets seeded successfully.');
    }
}
