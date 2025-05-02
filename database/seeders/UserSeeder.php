<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@leftovers.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Regular Users
        User::factory()->count(5)->create([
            'role' => 'user',
        ]);
    }
}
