<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MealFeedback;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuReservation;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string|max:255',
            'available' => 'required|boolean',
        ]);

        $data = $request->all();

        if ($images = $request->file('images')) {
            $menuPath = 'image/menu/';
            $menuImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($menuPath, $menuImage);
            $data['images'] = "$menuImage";
        }

        Menu::create($data);

        return back()->with('success', 'Menu added!');
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($images = $request->file('images')) {
            $menuPath = 'image/menu/';
            $menuImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($menuPath, $menuImage);
            $data['images'] = "$menuImage";
        } else {
            $data['images'] = $menu->images; // Keep the existing image if no new one is uploaded
        }
        $data = $request->only(['name', 'description', 'price', 'available', 'images']);

        $menu->update($data);

        return back()->with('success', 'Menu updated!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('success', 'Menu deleted!');
    }

    // Display a listing of the feedback
    public function indexFeedback()
    {
        if (auth()->user()->role === 'admin') {
            // Admin: See all feedback
            $feedbacks = MealFeedback::with(['user', 'menu'])->latest()->paginate(10);
        } else {
            // Regular user: See only their own feedback
            $feedbacks = MealFeedback::with('menu')
                ->where('user_id', auth()->id())
                ->latest()
                ->paginate(10);
        }
        return view('admin.menus.feedbacks', compact('feedbacks'));
    }

    // Show a specific feedback entry (optional)
    public function showFeedback($id)
    {
        $feedback = MealFeedback::with(['user', 'menu'])->findOrFail($id);
        return view('admin.meal_feedback.show', compact('feedback'));
    }

    // Update a feedback entry
    public function updateFeedback(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'is_public' => 'boolean',
        ]);

        $feedback = MealFeedback::findOrFail($id);
        $feedback->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_public' => $request->is_public ?? false,
        ]);

        return redirect()->route('admin.meal_feedback.index')->with('success', 'Feedback updated successfully.');
    }

    // Delete a feedback entry
    public function destroyFeedback($id)
    {
        $feedback = MealFeedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('admin.meal_feedback.index')->with('success', 'Feedback deleted successfully.');
    }

    // Display a listing of the reservations
    public function indexReservations()
    {
        if (auth()->user()->role === 'admin') {
            // Admin: See all feedback
            $menuReservations = MenuReservation::with(['user', 'menu'])->latest()->paginate(10);
        } else {
            // Regular user: See only their own feedback
            $menuReservations = MenuReservation::with('menu')
                ->where('user_id', auth()->id())
                ->latest()
                ->paginate(10);
        }
        return view('admin.menus.reservations', compact('menuReservations'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation = MenuReservation::findOrFail($id);
        $reservation->status = $request->status;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }

    public function destroyReservation($id)
    {
        $reservation = MenuReservation::findOrFail($id);
        $reservation->delete();

        return redirect()->back()->with('success', 'Reservation deleted successfully.');
    }
}
