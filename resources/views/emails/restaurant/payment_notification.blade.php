@component('mail::message')
# New Reservation Paid

A reservation has been successfully paid.

**Details:**

- **Customer:** {{ $user->name }} ({{ $user->email }})
- **Menu Item:** {{ $menuName }}
- **Pickup Time:** {{ \Carbon\Carbon::parse($pickupTime)->format('F j, Y \a\t g:i A') }}
- **Amount Paid:** RWF {{ number_format($amount, 2) }}

Please prepare accordingly.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
