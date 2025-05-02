<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Leftover;
use App\Models\Menu;
use Illuminate\Support\Carbon;

class LeftoverSeeder extends Seeder
{
    public function run()
    {
        $menus = Menu::all();

        foreach ($menus as $menu) {
            Leftover::create([
                'menu_id' => $menu->id,
                'quantity' => rand(3, 10),
                'discount' => rand(10, 40), // discount in %
                'pickup_by' => Carbon::now()->addHours(rand(2, 8)),
                'status' => 'available',
            ]);
        }
    }
}
