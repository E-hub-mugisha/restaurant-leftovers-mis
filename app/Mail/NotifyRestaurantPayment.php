<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyRestaurantPayment extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $menuName, $pickupTime, $amount;

    public function __construct($user, $menuName, $pickupTime, $amount)
    {
        $this->user = $user;
        $this->menuName = $menuName;
        $this->pickupTime = $pickupTime;
        $this->amount = $amount;
    }

    public function build()
    {
        return $this->markdown('emails.restaurant.payment_notification')
            ->subject('New Reservation Payment Received')
            ->with([
                'user' => $this->user,
                'menuName' => $this->menuName,
                'pickupTime' => $this->pickupTime,
                'amount' => $this->amount,
            ]);
    }
}
