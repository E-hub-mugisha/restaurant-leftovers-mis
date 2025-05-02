@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <h4 class="mb-4">Meal Feedback</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="box">
        <div class="box-body">
            <table width="100%" class="table table-hover" id="dataTables-example">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Menu</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Public</th>
                        <th>Submitted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($feedbacks as $feedback)
                        <tr>
                            <td>{{ $feedback->id }}</td>
                            <td>{{ $feedback->user->name }}</td>
                            <td>{{ $feedback->menu->name }}</td>
                            <td>{{ $feedback->rating }} / 5</td>
                            <td>{{ Str::limit($feedback->comment, 40) ?? '—' }}</td>
                            <td>
                                <span class="badge {{ $feedback->is_public ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $feedback->is_public ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>{{ $feedback->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <!-- View Button -->
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{ $feedback->id }}">View</button>
                                @auth
                                @if(auth()->user()->role === 'admin')
                                <!-- Edit Button -->
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $feedback->id }}">Edit</button>

                                <!-- Delete Button -->
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $feedback->id }}">Delete</button>
                                @endif
                                @endauth
                            </td>
                        </tr>

                        <!-- View Modal -->
                        <div class="modal fade" id="viewModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $feedback->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">View Feedback</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p><strong>User:</strong> {{ $feedback->user->name }}</p>
                                <p><strong>Menu:</strong> {{ $feedback->menu->name }}</p>
                                <p><strong>Rating:</strong> {{ $feedback->rating }}</p>
                                <p><strong>Comment:</strong> {{ $feedback->comment }}</p>
                                <p><strong>Public:</strong> {{ $feedback->is_public ? 'Yes' : 'No' }}</p>
                                <p><strong>Date:</strong> {{ $feedback->created_at }}</p>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $feedback->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form action="{{ route('admin.menu_feedback.update', $feedback->id ) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                  <h5 class="modal-title">Edit Feedback</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="rating" class="form-label">Rating</label>
                                    <input type="number" name="rating" class="form-control" value="{{ $feedback->rating }}" min="1" max="5" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea name="comment" class="form-control">{{ $feedback->comment }}</textarea>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" name="is_public" class="form-check-input" {{ $feedback->is_public ? 'checked' : '' }}>
                                    <label class="form-check-label">Make Public</label>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-success">Update</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $feedback->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form action="{{ route('admin.menu_feedback.destroy', $feedback->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                  <h5 class="modal-title">Confirm Deletion</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Are you sure you want to delete this feedback from <strong>{{ $feedback->user->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No feedback available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        
        </div>
    </div>
</div>
@endsection
