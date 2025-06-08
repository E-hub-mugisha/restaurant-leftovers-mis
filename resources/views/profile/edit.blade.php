@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Page Header -->
            <div class="mb-4">
                <h2 class="fw-semibold text-dark">
                    {{ __('Profile') }}
                </h2>
            </div>

            <!-- Update Profile Information -->
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Account -->
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
