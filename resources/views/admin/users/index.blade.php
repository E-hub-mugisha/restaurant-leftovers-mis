@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="page-title">
        <h3>User Management

        </h3>
    </div>
    <!-- Table -->
    <div class="box box-primary">
        <div class="box-body">

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined At</th>
                        <th>Reservations</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td>{{ $user->reservations_count ?? 0 }}</td>
                        <td>
                            <a href="{{ route('admin.users.reservations', $user->id) }}" class="btn btn-sm btn-info">
                                View Reservations
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection