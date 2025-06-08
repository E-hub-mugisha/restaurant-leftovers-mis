<section class="mb-4">
    <header class="mb-3">
        <h2 class="h5 fw-bold text-dark">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-muted small">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Email verification form -->
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile update form -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text"
                   class="form-control"
                   value="{{ old('name', $user->name) }}"
                   required autofocus autocomplete="name">
            @if ($errors->has('name'))
                <div class="text-danger small mt-1">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email"
                   class="form-control"
                   value="{{ old('email', $user->email) }}"
                   required autocomplete="username">
            @if ($errors->has('email'))
                <div class="text-danger small mt-1">
                    {{ $errors->first('email') }}
                </div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 small text-muted">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                            class="btn btn-link p-0 align-baseline text-decoration-underline text-primary">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <div class="text-success mt-2">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-success small mb-0 ms-3">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
