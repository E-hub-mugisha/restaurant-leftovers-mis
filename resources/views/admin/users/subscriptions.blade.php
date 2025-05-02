@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Subscribed Users</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Frequency</th>
                    <th>Subscribed At</th>
                    <th>Reservations</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subscribers as $index => $sub)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sub->user->name }}</td>
                    <td>{{ $sub->user->email }}</td>
                    <td>{{ ucfirst($sub->frequency) }}</td>
                    <td>{{ $sub->created_at->format('M d, Y') }}</td>
                    <td>{{ $sub->user->reservations->count() }}</td>
                    <td>
                        <a href="{{ route('admin.users.reservations', $sub->user->id) }}" class="btn btn-sm btn-info">
                            View History
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No subscribers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
