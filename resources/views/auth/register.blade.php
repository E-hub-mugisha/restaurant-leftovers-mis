@extends('layouts.auth')
@section('title', 'Register')
@section('content')

<div class="container">
    <div class="account-wrapper bg-white p-1 p-sm-4">
        <div class="row gx-40 gy-5 gy-md-0">
            <div class="col-lg-6">
                <div class="account-card bg-color2 p-3 p-sm-5">
                    <div class="logo text-center">
                        <!-- <img src="assets/img/logo/accountLogo.png" alt="logo"> -->
                         <h2 class="text-theme-color">Foodie</h2>
                    </div>
                    <h3>Create account</h3>
                    <p>Please Enter Your Details</p>
                    <div class="contact-form style2 bg-color2 p-0">
                        <form class="row" method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="col-12">
                                <input id="name" type="text" name="name" required autofocus autocomplete="name" placeholder="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="col-12">
                                <input id="email" type="email" name="email" required autofocus autocomplete="username" placeholder="Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="col-12">
                                <div class="form-ctl">
                                    <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                                    <div class="icon"><i class="fa-sharp fa-solid fa-eye-slash"></i></div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-ctl">
                                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="current-password" placeholder="Confirm Password">
                                    <div class="icon"><i class="fa-sharp fa-solid fa-eye-slash"></i></div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-ctl mb-3">
                                    <label class="form-check-label" for="role">Select Role</label>
                                    <select class="form-select" name="role" id="role">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="theme-btn rounded-5 w-100 mb-3">Register</button>
                            </div>
                            
                        </form>
                        
                        <h6>Already have an account? <a href="{{ route('login') }}" class="text-theme-color">Log In</a></h6>
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
@endsection