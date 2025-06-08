@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Payments</h2>

    <table width="100%" class="table table-hover" id="dataTables-example">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Reservation</th>
                <th>Tx Ref</th>
                <th>Transaction ID</th>
                <th>Amount (RWF)</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payment->user->name }}</td>
                <td>{{ $payment->reservation_id ?? 'N/A' }}</td>
                <td>{{ $payment->tx_ref }}</td>
                <td>{{ $payment->transaction_id }}</td>
                <td>{{ number_format($payment->amount) }}</td>
                <td>
                    <span class="badge bg-{{ $payment->status === 'successful' ? 'success' : 'secondary' }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </td>
                <td>{{ $payment->created_at->format('d M Y, h:i A') }}</td>
            </tr>
            @empty
            <tr><td colspan="8" class="text-center">No payments found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $payments->links() }}
</div>
@endsection
