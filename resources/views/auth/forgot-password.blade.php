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
                            <h2 class="text-theme-color">Active Restaurant</h2>
                        </div>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        <div class="contact-form style2 bg-color2 p-0">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="col-12">
                                    <input id="email" type="email" name="email" required autofocus autocomplete="username" placeholder="Email">
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="theme-btn rounded-5 w-100 mb-3">
                                        {{ __('Email Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="account-thumb">
                        <img src="{{ asset('/images/restaurant.jpg') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection