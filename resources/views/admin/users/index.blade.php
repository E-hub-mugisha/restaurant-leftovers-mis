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
                                <a href="{{ route('admin.users.reservations', $user->id) }}"
                                    class="btn btn-sm btn-info">
                                    View Reservations
                                </a>

                                <!-- Edit Button -->
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editUserModal{{ $user->id }}">
                                    Edit
                                </button>

                                <!-- Delete Button -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModal{{ $user->id }}">
                                    Delete
                                </button>
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

@foreach($users as $index => $user)
<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

@foreach($users as $index => $user)
<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong>{{ $user->name }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection
