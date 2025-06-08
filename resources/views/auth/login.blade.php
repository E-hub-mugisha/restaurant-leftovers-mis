@extends('layouts.auth')
@section('title', 'Login')
@section('content')

<div class="account-section section-padding fix">
    <div class="container">
        <div class="account-wrapper bg-white p-1 p-sm-4">
            <div class="row gx-40 gy-5 gy-md-0">
                <div class="col-lg-6">
                    <div class="account-card bg-color2 p-3 p-sm-5">
                        <div class="logo text-center">
                            <h2 class="text-theme-color">Foodie</h2>
                        </div>
                        <h3>Welcome Back</h3>
                        <p>Please Enter Your Details</p>
                        <div class="contact-form style2 bg-color2 p-0">
                            <form class="row" method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="col-12">
                                    <input id="email" type="email" name="email" required autofocus autocomplete="username" placeholder="Email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="col-12 position-relative mb-3">
                                    <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Password" class="form-control">
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                        onclick="togglePassword('password', 'togglePasswordIcon')" style="cursor: pointer;">
                                        <i id="togglePasswordIcon" class="fa fa-eye-slash"></i>
                                    </span>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember & Forgot Password -->
                                <div class="col-6 form-group">
                                    <input id="remember_me" name="remember" type="checkbox">
                                    <label for="remember_me">Remember For 30 days</label>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-theme-color">Forgot Password?</a>
                                    @endif
                                </div>

                                <!-- Submit -->
                                <div class="col-12">
                                    <button type="submit" class="theme-btn rounded-5 w-100 mb-3">Log In</button>
                                </div>
                            </form>

                            <h6>Don’t have an account? <a href="{{ route('register') }}" class="text-theme-color">Sign Up</a></h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="account-thumb">
                        <img src="{{ asset('/images/restaurant.jpg') }}" alt="img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Show/Hide Password Script -->
<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        const isPassword = input.type === 'password';

        input.type = isPassword ? 'text' : 'password';
        icon.classList.toggle('fa-eye', isPassword);
        icon.classList.toggle('fa-eye-slash', !isPassword);
    }
</script>

<!-- Font Awesome (only include if not globally loaded in layout) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endsection
