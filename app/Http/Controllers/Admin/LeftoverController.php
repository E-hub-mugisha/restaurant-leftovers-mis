<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leftover;
use App\Models\Menu;
use App\Models\Reservation;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class LeftoverController extends Controller
{
    // Display all leftovers
    public function index()
    {
        $leftovers = Leftover::with('menu')->withCount('reservations')->latest()->get();
        $menus = Menu::all();
        return view('admin.leftovers.index', compact('leftovers', 'menus'));
    }

    // Store a new leftover
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'pickup_by' => 'required|date',
            'status' => 'required|in:available,reserved,served',
        ]);

        Leftover::create([
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'discount' => $request->discount ?? 0,
            'pickup_by' => $request->pickup_by,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Leftover added successfully.');
    }

    // Update leftover
    public function update(Request $request, $id)
    {
        $leftover = Leftover::findOrFail($id);

        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'pickup_by' => 'required|date',
            'status' => 'required|in:available,reserved,served',
        ]);

        $leftover->update([
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'discount' => $request->discount ?? 0,
            'pickup_by' => $request->pickup_by,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Leftover updated successfully.');
    }

    // Delete leftover
    public function destroy($id)
    {
        $leftover = Leftover::findOrFail($id);
        $leftover->delete();

        return redirect()->back()->with('success', 'Leftover deleted successfully.');
    }
    public function showReservations($leftover_id)
    {
        // Fetch the leftover with its reservations and associated user and menu data
        $leftover = Leftover::with(['reservations.user', 'menu'])->findOrFail($leftover_id);
        return view('admin.leftovers.reservations', compact('leftover'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,cancelled,completed',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->status = $request->status;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }
   
    public function destroyReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->back()->with('success', 'Reservation deleted successfully.');
    }
    public function generateReport(Request $request)
    {
        // Default date range is today
        $startDate = $request->start_date ?? Carbon::today();
        $endDate = $request->end_date ?? Carbon::today();

        // Determine the report period based on user selection (daily, weekly, monthly)
        if ($request->interval == 'weekly') {
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
        } elseif ($request->interval == 'monthly') {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
        }

        // Fetch leftovers within the date range
        $leftovers = Leftover::with('menu')  // Eager load the associated menu items
            ->whereBetween('pickup_by', [$startDate, $endDate])
            ->selectRaw('menu_id, sum(quantity) as total_quantity, sum(discount) as total_discount, sum(quantity) - sum(quantity * discount) as wastage_reduction')
            ->groupBy('menu_id')
            ->get();

        // Return the report to the view
        return view('admin.leftovers.reports', compact('leftovers', 'startDate', 'endDate'));
    }
    public function exportReport(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $leftovers = Leftover::with('menu')
            ->whereBetween('pickup_by', [$startDate, $endDate])
            ->selectRaw('menu_id, sum(quantity) as total_quantity, sum(discount) as total_discount, sum(quantity) - sum(quantity * discount) as wastage_reduction')
            ->groupBy('menu_id')
            ->get();

        $pdf = PDF::loadView('reports.pdf', compact('leftovers', 'startDate', 'endDate'));
        return $pdf->download('leftovers_report.pdf');
    }
}
