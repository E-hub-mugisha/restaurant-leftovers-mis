<?php

namespace App\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class TwilioSmsService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(config('services.twilio.sid'), config('services.twilio.token'));
    }

    public function send($to, $message)
    {
        try {
            return $this->client->messages->create($to, [
                'from' => config('services.twilio.from'),
                'body' => $message
            ]);
        } catch (\Exception $e) {
            Log::error('Twilio SMS Error: ' . $e->getMessage());
        }
    }
}