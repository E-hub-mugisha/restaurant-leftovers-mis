<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            ['name' => 'Grilled Chicken Bowl', 'description' => 'Served with rice and vegetables', 'price' => 5.99],
            ['name' => 'Veggie Pasta Delight', 'description' => 'Pasta with mixed vegetables in creamy sauce', 'price' => 4.50],
            ['name' => 'Beef Burger Combo', 'description' => 'With fries and a soft drink', 'price' => 6.75],
            ['name' => 'Fish and Chips', 'description' => 'Crispy battered fish with golden fries', 'price' => 7.20],
            ['name' => 'Spicy Chicken Wrap', 'description' => 'Chicken wrap with spicy mayo', 'price' => 4.99],
            ['name' => 'Classic Caesar Salad', 'description' => 'Romaine lettuce, croutons, and Caesar dressing', 'price' => 3.99],
            ['name' => 'Vegetable Fried Rice', 'description' => 'Fried rice with seasonal veggies', 'price' => 4.25],
            ['name' => 'Tandoori Chicken Plate', 'description' => 'Grilled tandoori chicken with naan', 'price' => 6.50],
            ['name' => 'Mini Pizza Slice Box', 'description' => 'Includes 3 assorted pizza slices', 'price' => 5.00],
        ];

        foreach ($menus as $item) {
            Menu::create([
                'name' => $item['name'],
                'description' => $item['description'],
                'price' => $item['price'],
                'available' => true,
            ]);
        }
    }
}
