<section class="mb-4">
    <div class="mb-3">
        <h2 class="h5 fw-bold text-dark">
            {{ __('Delete Account') }}
        </h2>
        <p class="text-muted small">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </div>

    <!-- Delete Account Button -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('profile.destroy') }}" class="modal-content">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="text-muted">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mb-3">
                        <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}" required>
                        @if ($errors->userDeletion->get('password'))
                            <div class="text-danger mt-1 small">
                                {{ $errors->userDeletion->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
