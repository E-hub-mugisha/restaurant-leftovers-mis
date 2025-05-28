<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leftover;
use App\Models\MealFeedback;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalLeftovers = Leftover::count();
        $menuFeedbackCount = MealFeedback::count();
        $userCount = User::count();
        $summaryLeftovers = Leftover::sum('quantity');
        $summaryLeftoversReserved = Leftover::where('status', 'reserved')->sum('quantity');
        $users = User::all();
        $reservationStats = DB::table('reservations')
            ->select(DB::raw('DATE(reserved_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = $reservationStats->pluck('date')->toArray();
        $data = $reservationStats->pluck('count')->toArray();

        $labels = json_encode($labels);
        $data = json_encode($data);

        return view('admin.dashboard', compact(
            'totalLeftovers',
            'menuFeedbackCount',
            'userCount',
            'summaryLeftovers',
            'summaryLeftoversReserved',
            'labels',
            'data',
            'users'
        ));
    }

    public function payments()
    {
        $payments = Payment::with(['user', 'reservation'])->latest()->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }
}
