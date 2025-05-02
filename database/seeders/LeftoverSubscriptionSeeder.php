<?php

namespace Database\Seeders;

use App\Models\LeftoverSubscription;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeftoverSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()->take(10)->get();

        foreach ($users as $user) {
            LeftoverSubscription::create([
                'user_id' => $user->id,
                'frequency' => collect(['daily', 'weekly'])->random(),
            ]);
        }
    }
}
