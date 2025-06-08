<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\NotifyRestaurantPayment;
use App\Mail\PaymentSuccessful;
use App\Models\Leftover;
use App\Models\Menu;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\RestaurantSetting;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use AfricasTalking\SDK\Service;
use Carbon\Carbon;

class LeftoverController extends Controller
{
    public function frontendLeftovers()
    {
        $leftovers = Leftover::all();

        return view('front-page.leftovers', compact('leftovers'));
    }

    public function frontendReserveLeftovers(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $leftover = Leftover::lockForUpdate()->findOrFail($id); // Lock row for concurrent safety

    if ($leftover->quantity < $request->quantity) {
        return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
    }

    $alreadyReserved = Reservation::where('user_id', Auth::id())
        ->where('leftover_id', $leftover->id)
        ->exists();

    if ($alreadyReserved) {
        return redirect()->back()->with('info', 'You have already reserved this leftover.');
    }

    // Decrease the quantity
    $leftover->quantity -= $request->quantity;
    if ($leftover->quantity <= 0) {
        $leftover->status = 'reserved';
    }
    $leftover->save();

    // Create the reservation
    $reservation = Reservation::create([
        'user_id' => Auth::id(),
        'leftover_id' => $leftover->id,
        'reserved_at' => now(),
        'quantity' => $request->quantity,
        'amount' => $leftover->amount * $request->quantity,
    ]);

    return redirect()->route('payment.process', $reservation->id)
        ->with('success', 'You have reserved this leftover successfully!');
}

    public function payment(Reservation $reservation)
    {
        return view('front-page.payment', [
            'email' => Auth::user()->email,
            'amount' => $reservation->amount,
            'tx_ref' => 'TRX_' . Str::random(10),
            'reservation_id' => $reservation->id,
            'public_key' => env('FLW_PUBLIC_KEY')
        ]);
    }
    public function paymentLeftOverCallback(Request $request)
    {
        $transactionId = $request->query('transaction_id');
        $txRef = $request->query('tx_ref');

        if (!$transactionId || !$txRef) {
            return redirect()->route('home')->with('error', 'Invalid payment callback data.');
        }

        // Extract reservation ID (prefix of tx_ref)
        $reservationId = explode('-', $txRef)[0];

        $reservation = Reservation::find($reservationId);
        if (!$reservation) {
            return redirect()->route('home')->with('error', 'Reservation not found.');
        }

        // Prevent duplicate payment processing
        if ($reservation->status === 'paid') {
            return redirect()->route('home')->with('success', 'Payment already processed.');
        }

        // Verify transaction with Flutterwave
        $response = Http::withToken(env('FLW_SECRET_KEY'))
            ->get("https://api.flutterwave.com/v3/transactions/{$transactionId}/verify");

        if ($response->failed()) {
            Log::error('Flutterwave verification failed.', [
                'transaction_id' => $transactionId,
                'response' => $response->body(),
            ]);
            return redirect()->route('home')->with('error', 'Could not verify payment. Please contact support.');
        }

        $data = $response->json()['data'] ?? [];

        if (isset($data['status']) && $data['status'] === 'successful') {
            // Save payment and update reservation
            $reservation->update([
                'status' => 'paid',
                'updated_at' => now(),
            ]);

            $payment = Payment::create([
                'user_id' => $reservation->user_id,
                'reservation_id' => $reservation->id,
                'tx_ref' => $txRef,
                'amount' => $data['amount'] ?? $reservation->amount,
                'status' => 'successful',
                'transaction_id' => $transactionId,
            ]);

            $user = User::findOrFail($payment->user_id); // or find from DB
            $reservation = Reservation::findOrFail($payment->reservation_id);
            $leftover = Leftover::findOrFail($reservation->leftover_id);
            $menu = Menu::findOrFail($leftover->menu_id);

            $transactionId = $payment->transaction_id;
            $amount = $payment->amount; // replace with actual logic
            $status = $payment->status;
            $menuName = $menu->name;
            $pickupTime = $leftover->pickup_by;

            Mail::to($user->email)->send(new PaymentSuccessful($user, $transactionId, $amount, $status, $menuName, $pickupTime));

            $restaurantEmail = RestaurantSetting::first()->email;

            if ($restaurantEmail) {
                Mail::to($restaurantEmail)->send(new NotifyRestaurantPayment($user, $menuName, $pickupTime, $amount));
            }

            // Format pickup time
            $formattedTime = Carbon::parse($pickupTime)->format('g:i A, M j');

            // Initialize SMS service
            $sms = new SmsService();

            // Send SMS to user
            $userMessage = "Hi {$user->name}, your payment of $ {$amount} for {$menuName} was successful. Pickup time: {$formattedTime}";
            $sms->sendSms($user->phone, $userMessage);

            // Notify the restaurant
            $restaurantPhone = '+250782390919'; // Ideally store in .env or DB
            $restaurantTime = Carbon::parse($pickupTime)->format('g:i A');
            $restaurantMessage = "Reservation paid: {$menuName}, by {$user->name}, Pickup: {$restaurantTime}, Amount: $ {$amount}";
            $sms->sendSms($restaurantPhone, $restaurantMessage);

            return redirect()->route('home')->with('success', 'Payment successful and reservation confirmed!');
        }

        // If payment was cancelled or failed
        return redirect()->route('home')->with('error', 'Payment was not successful.');
    }
}
