@extends('layouts.guest')
@section('title', 'Menu Reservation')
@section('content')

<!-- Reservation Section    S T A R T -->
<div class="reservation-section section-padding fix">
    <div class="reservation-wrapper">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="col-xl-6">
                    <div class="reservation-form">
                        <div class="contact-form style2">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <h2>Create a&nbsp;<span class="text-theme-color">Reservation</span> for {{ $menu->name }} </h2>
                            <form class="row" action="{{ route('menu.reservation.store', $menu->id ) }}" method="POST">
                                @csrf
                                <input id="menu_id" name="menu_id" type="text" value="{{ $menu->id }}" hidden>
                                <div class="col-md-6">
                                    <label class="mb-2" for="date">Select Date*</label>
                                    <input id="date" name="date" type="date">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="time">Select Time*</label>
                                    <input id="time" name="time" type="time">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="phone">Give Phone Number*</label>
                                    <input id="phone" name="phone" type="number" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="service">Number of Guest*</label>
                                    <input id="guests" name="guests" type="text" placeholder="Guest">
                                </div>
                                <div class="col-12">
                                    <textarea id="message" name="message" class="form-control"
                                        placeholder="Write your message here..." rows="5"></textarea>
                                </div>
                                <div class="col-12 form-group mb-0">
                                    <button type="submit" class="theme-btn w-100">BOOK A TABLE <i
                                            class="fa-sharp fa-regular fa-arrow-right-long bg-transparent text-white"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection