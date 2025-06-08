@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-title">
        <h3>Menu Management

            <!-- Add Menu Button (Admins Only) -->
            @auth
            @if(auth()->user()->role === 'admin')
            <button class="btn btn-sm btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#addMenuModal">+ Add Menu</button>
            @endif
            @endauth
        </h3>
    </div>

    <!-- Table -->
    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Available</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->description }}</td>
                        <td>${{ number_format($menu->price, 2) }}</td>
                        <td>{{ $menu->available ? 'Yes' : 'No' }}</td>
                        <td>
                            @auth
                            @if(auth()->user()->role === 'admin')
                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editMenuModal{{ $menu->id }}">Edit</button>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            @endif
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Modals (Admins Only) -->
    @auth
    @if(auth()->user()->role === 'admin')
    @foreach($menus as $menu)
    <div class="modal fade" id="editMenuModal{{ $menu->id }}" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('admin.menus.update', $menu->id) }}">
                @csrf @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input name="name" value="{{ $menu->name }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input name="price" type="number" step="0.01" value="{{ $menu->price }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Available</label>
                        <select name="available" class="form-control">
                            <option value="1" {{ $menu->available ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$menu->available ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="images" value="{{ $menu->image }}" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @endif
    @endauth

    <!-- Add Modal (Admins Only) -->
    @auth
    @if(auth()->user()->role === 'admin')
    <div class="modal fade" id="addMenuModal" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input name="price" type="number" step="0.01" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Available</label>
                        <select name="available" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="images" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Add Menu</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endauth
</div>
@endsection