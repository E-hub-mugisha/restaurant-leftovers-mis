@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Reservation History for {{ $user->name }}</h3>

    @if($user->reservations->isEmpty())
        <div class="alert alert-warning">No reservations found for this user.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Menu Item</th>
                    <th>Quantity Reserved</th>
                    <th>Reserved At</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->reservations as $reservation)
                <tr>
                    <td>{{ $reservation->leftover->menu->name ?? '-' }}</td>
                    <td>1</td>
                    <td>{{ $reservation->reserved_at }}</td>
                    <td>{{ ucfirst($reservation->leftover->status) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
