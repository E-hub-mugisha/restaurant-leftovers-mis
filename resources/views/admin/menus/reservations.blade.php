@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-title">
        <h3>Menu Reservation Management

            <!-- Add Menu Button -->
            <button class="btn btn-sm btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#addMenuModal">+ Add Menu</button>
        </h3>
    </div>
    <!-- Table -->
    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Menu</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Guests</th>
                        <th>Message</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menuReservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->user->name ?? 'N/A' }}</td>
                        <td>{{ $reservation->menu->name ?? 'N/A' }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->time }}</td>
                        <td>{{ $reservation->guests }}</td>
                        <td>{{ $reservation->message }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>
                            <span class="badge bg-{{ $reservation->status === 'confirmed' ? 'success' : ($reservation->status === 'cancelled' ? 'danger' : 'warning') }}">
                                {{ ucfirst($reservation->status) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal{{ $reservation->id }}">Change</button>
                            <!-- Delete Button -->
                            <form action="{{ route('admin.menu_reservations.destroy', $reservation->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="statusModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="statusModalLabel{{ $reservation->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('admin.menu_reservations.updateStatus', $reservation->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="statusModalLabel{{ $reservation->id }}">Update Reservation Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="status" class="form-label">Select Status:</label>
                                        <select name="status" class="form-select" required>
                                            <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="cancelled" {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

</div>
@endsection