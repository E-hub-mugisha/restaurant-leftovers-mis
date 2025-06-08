<section class="mb-4">
    <div class="mb-3">
        <h2 class="h5 fw-bold text-dark">
            {{ __('Update Password') }}
        </h2>
        <p class="text-muted small">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">
                {{ __('Current Password') }}
            </label>
            <input
                id="update_password_current_password"
                type="password"
                name="current_password"
                class="form-control"
                autocomplete="current-password"
            >
            @if ($errors->updatePassword->has('current_password'))
                <div class="text-danger mt-1 small">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">
                {{ __('New Password') }}
            </label>
            <input
                id="update_password_password"
                type="password"
                name="password"
                class="form-control"
                autocomplete="new-password"
            >
            @if ($errors->updatePassword->has('password'))
                <div class="text-danger mt-1 small">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="update_password_password_confirmation" class="form-label">
                {{ __('Confirm Password') }}
            </label>
            <input
                id="update_password_password_confirmation"
                type="password"
                name="password_confirmation"
                class="form-control"
                autocomplete="new-password"
            >
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="text-danger mt-1 small">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <!-- Submit -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-success small mb-0 ms-3">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
