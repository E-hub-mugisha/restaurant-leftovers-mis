@component('mail::message')
# Payment Confirmation

Hello {{ $user->name }},

Your payment was successful!

**Details:**

- **Menu:** {{ $menuName }}
- **Transaction ID:** {{ $transactionId }}
- **Amount Paid:** RWF {{ number_format($amount, 2) }}
- **Pickup Time:** {{ \Carbon\Carbon::parse($pickupTime)->format('F j, Y \a\t g:i A') }}
- **Status:** {{ ucfirst($status) }}

Thank you for reserving with us!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
