<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Leftover;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeftoverController extends Controller
{
    public function frontendLeftovers()
    {
        $leftovers = Leftover::with('menu')
            ->where('status', 'available')
            ->where('pickup_by', '>=', now())
            ->orderBy('pickup_by')
            ->get();

        return view('front-page.leftovers', compact('leftovers'));
    }

    public function frontendReserveLeftovers(Request $request, $id)
    {
        $leftover = Leftover::findOrFail($id);

        // Check if there's enough quantity
        if ($leftover->quantity < 1) {
            return redirect()->back()->with('error', 'This leftover is no longer available.');
        }

        // Prevent duplicate reservation by the same user
        $alreadyReserved = Reservation::where('user_id', Auth::id())
            ->where('leftover_id', $leftover->id)
            ->exists();

        if ($alreadyReserved) {
            return redirect()->back()->with('info', 'You have already reserved this leftover.');
        }

        // Decrease leftover quantity
        $leftover->decrement('quantity');

        // If that was the last one, update status to 'reserved'
        if ($leftover->quantity <= 0) {
            $leftover->update(['status' => 'reserved']);
        }

        // Create reservation record
        Reservation::create([
            'user_id' => Auth::id(),
            'leftover_id' => $leftover->id,
            'reserved_at' => now(),
        ]);

        return redirect()->back()->with('success', 'You have reserved this leftover successfully!');
    }
}
