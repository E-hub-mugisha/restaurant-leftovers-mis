@extends('layouts.auth')
@section('title', 'Register')

@section('content')
<div class="container">
    <div class="account-wrapper bg-white p-1 p-sm-4">
        <div class="row gx-40 gy-5 gy-md-0">
            <div class="col-lg-6">
                <div class="account-card bg-color2 p-3 p-sm-5">
                    <div class="logo text-center">
                        <h2 class="text-theme-color">Active Restaurant</h2>
                    </div>
                    <h3>Create account</h3>
                    <p>Please Enter Your Details</p>
                    <div class="contact-form style2 bg-color2 p-0">
                        <form class="row" method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="col-12">
                                <input id="name" type="text" name="name" required autofocus autocomplete="name"
                                    placeholder="Name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="col-12">
                                <input id="email" type="email" name="email" required autocomplete="username"
                                    placeholder="Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="col-12 position-relative mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                    onclick="togglePassword('password', 'togglePasswordIcon')" style="cursor: pointer;">
                                    <i id="togglePasswordIcon" class="fa fa-eye-slash"></i>
                                </span>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-12 position-relative mb-3">
                                <input type="password" id="confirmPassword" name="password_confirmation" required
                                    autocomplete="new-password" placeholder="Confirm Password" class="form-control">
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                    onclick="togglePassword('confirmPassword', 'toggleConfirmPasswordIcon')" style="cursor: pointer;">
                                    <i id="toggleConfirmPasswordIcon" class="fa fa-eye-slash"></i>
                                </span>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Submit -->
                            <div class="col-12">
                                <button type="submit" class="theme-btn rounded-5 w-100 mb-3">Register</button>
                            </div>
                        </form>

                        <h6>Already have an account?
                            <a href="{{ route('login') }}" class="text-theme-color">Log In</a>
                        </h6>
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

<!-- Show Password Toggle Script -->
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

<!-- Font Awesome (if not already included) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
