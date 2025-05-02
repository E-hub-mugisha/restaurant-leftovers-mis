<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MealFeedback;
use App\Models\Menu;
use App\Models\MenuReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('available', true)->with('feedbacks')->get();
        return view('front-page.menus', compact('menus'));
    }
    public function show($id)
    {
        $menu = Menu::with(['feedbacks.user', 'leftovers'])->findOrFail($id);
        return view('front-page.menu-detail', compact('menu'));
    }

    public function store(Request $request, $menuId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
            'is_public' => 'nullable|boolean'
        ]);

        MealFeedback::create([
            'user_id' => auth()->id(),
            'menu_id' => $menuId,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_public' => $request->has('is_public')
        ]);

        return redirect()->back()->with('success', 'Thanks for your feedback!');
    }
    public function reservations($id)
    {
        $menu = Menu::findOrFail($id);
        return view('front-page.menu_reservation', compact('menu'));
    }
    public function storeReservation(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'guests' => 'required|integer|min:1',
            'message' => 'nullable|string|max:1000',
            'phone' => 'nullable|string|max:15'
        ]);

        $menu = Menu::findOrFail($id);
        
        MenuReservation::create([
            'user_id' => Auth::user()->id,
            'menu_id' => $menu->id,
            'status' => 'pending',
            'date' => $request->date,
            'time' => $request->time,
            'guests' => $request->guests,
            'message' => $request->message,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Reservation made successfully!');
    }
}
