@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Restaurant Settings</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Restaurant Name <span class="text-danger">*</span></label>
                                <input type="text" name="restaurant_name" class="form-control" value="{{ old('restaurant_name', $setting->restaurant_name ?? '') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Logo</label>
                                @if(!empty($setting->logo))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/logos/' . $setting->logo) }}" height="60" class="rounded shadow-sm">
                                    </div>
                                @endif
                                <input type="file" name="logo" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email ?? '') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $setting->phone ?? '') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address', $setting->address ?? '') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Days Open</label>
                                <input type="text" name="days_open" class="form-control" value="{{ old('days_open', $setting->days_open ?? '') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Opening Hours</label>
                                <input type="text" name="opening_hours" class="form-control" value="{{ old('opening_hours', $setting->opening_hours ?? '') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Facebook</label>
                                <input type="url" name="facebook" class="form-control" placeholder="https://facebook.com/..." value="{{ old('facebook', $setting->facebook ?? '') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Instagram</label>
                                <input type="url" name="instagram" class="form-control" placeholder="https://instagram.com/..." value="{{ old('instagram', $setting->instagram ?? '') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Twitter</label>
                                <input type="url" name="twitter" class="form-control" placeholder="https://twitter.com/..." value="{{ old('twitter', $setting->twitter ?? '') }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">About Us</label>
                                <textarea name="about_us" rows="4" class="form-control" placeholder="Write a brief description...">{{ old('about_us', $setting->about_us ?? '') }}</textarea>
                            </div>

                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="bi bi-save me-1"></i> Save Settings
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div>
    </div>
</div>
@endsection
