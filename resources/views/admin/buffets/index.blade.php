@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-title">
        <h3>Manage Buffets
            <!-- Create Button -->
            <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#createModal">Create Buffet</button>
            <!-- Success message -->
        </h3>
    </div>
    <!-- Buffet Table -->
    <div class="box">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Menu</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buffets as $buffet)
                    <tr>
                        <td>{{ $buffet->name }}</td>
                        <td>{{ $buffet->description }}</td>
                        <td>{{ $buffet->menu->name }}</td>
                        <td>
                            <span class="badge {{ $buffet->is_available ? 'bg-success' : 'bg-danger' }}">
                                {{ $buffet->is_available ? 'Available' : 'Not Available' }}
                            </span>
                        </td>

                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $buffet->id }}">Edit</button>

                            <!-- Delete Button (opens confirmation modal) -->
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $buffet->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.buffets.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Create Buffet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Buffet Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Menu</label>
                            <select class="form-control" id="menu_id" name="menu_id" required>
                                @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_available">Available Today?</label>
                            <select class="form-control" id="is_available" name="is_available" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Buffet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modals (Dynamically generated for each buffet) -->
    @foreach($buffets as $buffet)
    <div class="modal fade" id="editModal{{ $buffet->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $buffet->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.buffets.update', $buffet->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $buffet->id }}">Edit Buffet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Buffet Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $buffet->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $buffet->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Menu</label>
                            <select class="form-control" id="menu_id" name="menu_id" required>
                                @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $buffet->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_available">Available Today?</label>
                            <select class="form-control" id="is_available" name="is_available" required>
                                <option value="1" {{ $buffet->is_available ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$buffet->is_available ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Buffet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Delete Confirmation Modals (Dynamically generated for each buffet) -->
    @foreach($buffets as $buffet)
    <div class="modal fade" id="deleteModal{{ $buffet->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $buffet->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $buffet->id }}">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the buffet <strong>{{ $buffet->name }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.buffets.destroy', $buffet->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection