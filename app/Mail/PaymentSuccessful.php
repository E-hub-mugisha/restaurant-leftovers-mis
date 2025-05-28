<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $transactionId, $amount, $status, $menuName, $pickupTime;

    public function __construct($user, $transactionId, $amount, $status, $menuName, $pickupTime)
    {
        $this->user = $user;
        $this->transactionId = $transactionId;
        $this->amount = $amount;
        $this->status = $status;
        $this->menuName = $menuName;
        $this->pickupTime = $pickupTime;
    }

    public function build()
    {
        return $this->subject('Payment Successful')
            ->markdown('emails.payment.success')
            ->with([
                'user' => $this->user,
                'transactionId' => $this->transactionId,
                'amount' => $this->amount,
                'status' => $this->status,
                'menuName' => $this->menuName,
                'pickupTime' => $this->pickupTime,
            ]);
    }
}
