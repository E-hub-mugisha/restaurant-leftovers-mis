<?php

namespace Database\Seeders;

use App\Models\MealFeedback;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()->take(10)->get();
        $menus = Menu::inRandomOrder()->take(5)->pluck('id');

        foreach ($users as $user) {
            MealFeedback::create([
                'user_id' => $user->id,
                'menu_id' => $menus->random(),
                'rating' => rand(1, 5),
                'comment' => fake()->sentence(10),
                'is_public' => fake()->boolean(60), // 60% chance it's public
            ]);
        }
    }
}
