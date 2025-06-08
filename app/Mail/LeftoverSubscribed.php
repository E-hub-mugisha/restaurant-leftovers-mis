<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeftoverSubscribed extends Mailable
{
    use Queueable, SerializesModels;

    public $frequency;

    public function __construct($frequency)
    {
        $this->frequency = $frequency;
    }

    public function build()
    {
        return $this->subject('Leftover Subscription Confirmed')
                    ->view('emails.leftover-subscribed');
    }
}