<?php

namespace Database\Seeders;

use App\Models\Buffet;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // Ensure there are some menus available
        if ($menus->isEmpty()) {
            $this->command->warn('No menus found. Please add some menus before seeding buffets.');
            return;
        }

        // Create 10 sample buffets and link them to random menus
        foreach (range(1, 10) as $index) {
            Buffet::create([
                'name' => 'Buffet ' . $index,
                'description' => 'A delicious buffet with a variety of food options.',
                'is_available' => rand(0, 1) == 1,  // Random availability (true or false)
                'menu_id' => $menus->random()->id, // Link to a random menu
            ]);
        }

        $this->command->info('Buffets seeded successfully.');
    }
}
