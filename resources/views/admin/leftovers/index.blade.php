@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-title">
        <h3>Leftovers Management

            @if(auth()->user()->role === 'admin')
            <!-- Add Leftover Button for Admin -->
            <button class="btn btn-sm btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#addLeftoverModal">+ Add Leftover</button>
            @endif
        </h3>
    </div>

    <!-- Table -->
    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Menu Item</th>
                        <th>Quantity</th>
                        <th>Discount (%)</th>
                        <th>Pickup By</th>
                        <th>Status</th>
                        @if(auth()->user()->role === 'admin')
                        <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($leftovers as $leftover)
                    <tr>
                        <td>{{ $leftover->menu->name }}</td>
                        <td>{{ $leftover->quantity }}</td>
                        <td>{{ $leftover->discount }}</td>
                        <td>{{ \Carbon\Carbon::parse($leftover->pickup_by)->format('Y-m-d H:i') }}</td>
                        <td>{{ ucfirst($leftover->status) }}</td>

                        @if(auth()->user()->role === 'admin')
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editLeftoverModal{{ $leftover->id }}">Edit</button>

                            <a href="{{ route('admin.leftovers.reservations', $leftover->id) }}" class="btn btn-sm btn-info">
                                View Reservations ({{ $leftover->reservations_count }})
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.leftovers.destroy', $leftover->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                        @else 
                        <td>
                            <!-- View Reservations Button for Users -->
                            <a href="{{ route('admin.leftovers.reservations', $leftover->id) }}" class="btn btn-sm btn-info">
                                View Reservations ({{ $leftover->reservations_count }})
                            </a>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#reserveLeftoverModal{{ $leftover->id }}">Reserve</button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(auth()->user()->role === 'admin')
    @foreach($leftovers as $leftover)
    <!-- Edit Modal -->
    <div class="modal fade" id="editLeftoverModal{{ $leftover->id }}" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('admin.leftovers.update', $leftover->id) }}">
                @csrf @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Leftover</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Menu Item</label>
                        <select name="menu_id" class="form-control" required>
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}" {{ $menu->id == $leftover->menu_id ? 'selected' : '' }}>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input name="quantity" type="number" value="{{ $leftover->quantity }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Discount (%)</label>
                        <input name="discount" type="number" step="0.01" value="{{ $leftover->discount }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Pickup By</label>
                        <input name="pickup_by" type="datetime-local" value="{{ \Carbon\Carbon::parse($leftover->pickup_by)->format('Y-m-d\TH:i') }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="available" {{ $leftover->status === 'available' ? 'selected' : '' }}>Available</option>
                            <option value="reserved" {{ $leftover->status === 'reserved' ? 'selected' : '' }}>Reserved</option>
                            <option value="served" {{ $leftover->status === 'served' ? 'selected' : '' }}>Served</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <!-- Add Modal -->
    <div class="modal fade" id="addLeftoverModal" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('admin.leftovers.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Leftover</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Menu Item</label>
                        <select name="menu_id" class="form-control" required>
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input name="quantity" type="number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Discount (%)</label>
                        <input name="discount" type="number" step="0.01" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Pickup By</label>
                        <input name="pickup_by" type="datetime-local" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="available">Available</option>
                            <option value="reserved">Reserved</option>
                            <option value="served">Served</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Add Leftover</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection
