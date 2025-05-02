<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Buffet;
use App\Models\Leftover;
use App\Models\LeftoverSubscription;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all()->take(5);
        $leftovers = Leftover::all()->take(5);
        // Fetch 3 random buffets
        $buffets = Buffet::inRandomOrder()->take(3)->get();
        return view('front-page.home', compact('menus', 'leftovers', 'buffets'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'frequency' => 'required|in:daily,weekly'
        ]);

        LeftoverSubscription::updateOrCreate(
            ['user_id' => auth()->id()],
            ['frequency' => $request->frequency]
        );

        return redirect()->back()->with('success', 'You have successfully subscribed for leftover alerts!');
    }
    public function about()
    {
        return view('front-page.about');
    }
    public function contact()
    {
        return view('front-page.contact');
    }
}
