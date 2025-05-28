<?php

namespace Database\Seeders;

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
            'phone' => '+250788000001',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Actual Regular Users
        $users = [
            [
                'name' => 'Eric Mugisha',
                'email' => 'eric@example.com',
                'phone' => '+250788000002',
            ],
            [
                'name' => 'Aline Uwase',
                'email' => 'aline@example.com',
                'phone' => '+250788000003',
            ],
            [
                'name' => 'Jean Bosco',
                'email' => 'bosco@example.com',
                'phone' => '+250788000004',
            ],
            [
                'name' => 'Claudine Irakoze',
                'email' => 'claudine@example.com',
                'phone' => '+250788000005',
            ],
            [
                'name' => 'Patrick Nshimiyimana',
                'email' => 'patrick@example.com',
                'phone' => '+250788000006',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);
        }
    }
}
