@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="page-title">
        <h3>Reservation History for Leftovers</h3>
    </div>

    @if($reservations->isEmpty())
    <div class="alert alert-warning text-center">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> No reservations found.
    </div>
    @else
    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Menu Item</th>
                        <th>User</th>
                        <th>Reserved At</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->leftover->menu->name ?? '-' }}</td>
                        <td>{{ $reservation->user->name ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->reserved_at)->format('M d, Y h:i A') }}</td>
                        <td>
                            <span class="badge 
                            @if($reservation->status == 'pending') bg-warning 
                            @elseif($reservation->status == 'approved') bg-success 
                            @elseif($reservation->status == 'cancelled') bg-danger 
                            @else bg-secondary @endif">
                                {{ ucfirst($reservation->status) }}
                            </span>
                        </td>
                        <td class="text-center">

                            <!-- View Button -->
                            <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $reservation->id }}">View</button>

                            <!-- Edit Button -->
                            <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $reservation->id }}">Edit</button>

                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#statusModal{{ $reservation->id }}">Status</button>
                            <form action="{{ route('admin.reservations.destroy', $reservation->id ) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- View Modal -->
                    <div class="modal fade" id="viewModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $reservation->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title" id="viewModalLabel{{ $reservation->id }}">Reservation Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Menu Item:</strong> {{ $reservation->leftover->menu->name ?? '-' }}</p>
                                    <p><strong>User:</strong> {{ $reservation->user->name ?? '-' }}</p>
                                    <p><strong>Reserved At:</strong> {{ \Carbon\Carbon::parse($reservation->reserved_at)->format('M d, Y h:i A') }}</p>
                                    <p><strong>Status:</strong> {{ ucfirst($reservation->leftover->status) }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $reservation->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title" id="editModalLabel{{ $reservation->id }}">Edit Reservation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="reserved_at" class="form-label">Reserved At</label>
                                            <input type="datetime-local" name="reserved_at" class="form-control" value="{{ \Carbon\Carbon::parse($reservation->reserved_at)->format('Y-m-d\TH:i') }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-select" required>
                                                <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="approved" {{ $reservation->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="cancelled" {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                <option value="completed" {{ $reservation->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="statusModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="statusModalLabel{{ $reservation->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title" id="statusModalLabel{{ $reservation->id }}">Update Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="status" class="form-label">Reservation Status</label>
                                            <select name="status" class="form-select" required>
                                                <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="approved" {{ $reservation->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="cancelled" {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                <option value="completed" {{ $reservation->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection