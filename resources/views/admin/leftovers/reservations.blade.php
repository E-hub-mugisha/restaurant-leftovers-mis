@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Reservations for "{{ $leftover->menu->name }}"</h3>

    @if($leftover->reservations->isEmpty())
        <div class="alert alert-warning">No reservations found for this leftover.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Reserved At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leftover->reservations as $reservation)
                <tr>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->user->email }}</td>
                    <td>{{ $reservation->reserved_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
