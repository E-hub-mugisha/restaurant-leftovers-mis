<?php 

namespace App\Services;

use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected $sms;

    public function __construct()
    {
        $AT = new AfricasTalking(config('services.africastalking.username'), config('services.africastalking.key'));
        $this->sms = $AT->sms();
    }

    public function sendSms($to, $message)
    {
        try {
            $this->sms->send([
                'to' => $to,
                'message' => $message,
                'from' => 'LEFTOVERS'
            ]);
        } catch (\Exception $e) {
            Log::error('SMS sending failed: ' . $e->getMessage());
        }
    }
}