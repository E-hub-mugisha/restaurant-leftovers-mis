<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeftoverSubscription;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::withCount('reservations')->get();
        return view('admin.users.index', compact('users'));
    }
public function updateUser(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($request->only('name', 'email'));

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
}

public function destroyUser(User $user)
{
    $user->delete();

    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
}
    public function userReservations($user_id)
    {
        $user = User::with(['reservations.leftover.menu'])->findOrFail($user_id);
        return view('admin.users.reservations', compact('user'));
    }
    public function usersSubscription()
    {
        $subscribers = LeftoverSubscription::with(['user', 'user.reservations'])->get();

        return view('admin.users.subscriptions', compact('subscribers'));
    }
    public function reservations()
    {
        if (auth()->user()->role === 'admin') {
            $reservations = Reservation::all();
        }
        else {
            $reservations = Reservation::where('user_id', auth()->user()->id)->get();
        }
        return view('admin.reservations.index', compact('reservations'));
    }
    public function destroy($id)
    {
        $reservations = Reservation::findOrFail($id);
        $reservations->delete();
        return redirect()->back()->with('success', 'Reservations deleted successfully.');
    }
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $request->input('status');
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully.'); 
    }
    public function updateReservation(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->reserved_at = $request->input('reserved_at');
        $reservation->status = $request->input('status');
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }

}
