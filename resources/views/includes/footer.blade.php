<!-- Footer Section    S T A R T -->
@php
$settings = \App\Models\RestaurantSetting::first();
@endphp
<footer class="footer-section bg-title fix">
    <div class="footer-widgets-wrapper">
        <div class="container">
            <div class="footer-top">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="fancy-box">
                            <div class="item1"><i class="fa-solid fa-location-dot"></i></div>
                            <div class="item2">
                                <h6>address</h6>
                                <p>{{ $settings->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-start justify-content-lg-end">
                        <div class="fancy-box">
                            <div class="item1"><i class="fa-solid fa-envelope"></i></div>
                            <div class="item2">
                                <h6>send email</h6>
                                <p>{{ $settings->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-start justify-content-lg-end">
                        <div class="fancy-box">
                            <div class="item1"><i class="fa-regular fa-phone-volume"></i></div>
                            <div class="item2">
                                <h6>call emergency</h6>
                                <p>{{ $settings->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="{{ route('home') }}">
                                <!-- <img src="assets/img/logo/logoWhite.svg" alt="logo-img"> -->
                                 <h2 class="text-center text-white">{{ $settings->restaurant_name }}</h2>
                            </a>
                        </div>
                        <div class="footer-content">
                            <p>
                                {{ $settings->about_us }}
                            </p>
                            <div class="social-icon d-flex align-items-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-xl-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Quick Links</h3>
                        </div>
                        <ul class="list-area">
                            <li>
                                <a href="{{ route('front-page.about') }}">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front-page.leftovers') }}">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Leftovers
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front-page.menu.index') }}">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Our Menus
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front-page.contact') }}">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-xl-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Our Menu</h3>
                        </div>
                        <ul class="list-area">
                            @php
                            $menus = \App\Models\Menu::latest()->take(4)->get();
                            @endphp

                            @foreach ($menus as $menu)
                            <li>
                                <a href="{{ route('front-page.menu.show', $menu->id) }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    {{ $menu->name }}
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-xl-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Contact Us</h3>
                        </div>
                        <ul class="list-area">
                            <li class="mb-2">
                                {{ $settings->days_open }}: <span class="text-theme-color2"> {{ $settings->opening_hours }}</span>
                            </li>
                            <li>
                                Saturday: <span class="text-theme-color2"> 8am – 12am </span>
                            </li>
                        </ul>
                        <form action="#" class="mt-4">
                            <div class="form-control">
                                <input class="email" type="email" placeholder="Your email address">
                                <button type="submit" class="submit-btn"><i
                                        class="fa-solid fa-arrow-right-long"></i></button>
                            </div>
                            <div class="form-control style2 mt-3">
                                <input id="checkbox" name="checkbox" type="checkbox">
                                <label for="checkbox">I agree to the <a href="{{ route('front-page.contact') }}">Privacy Policy.
                                    </a></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper d-flex align-items-center justify-content-between">
                <p class="wow fadeInLeft" data-wow-delay=".3s">
                    © All Copyright 2025 by <a href="{{ route('home') }}">Foodie</a>
                </p>
                <ul class="brand-logo wow fadeInRight" data-wow-delay=".5s">
                    <li>
                        <a class="text-white" href="{{ route('front-page.contact') }}">
                            Terms & Condition
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="{{ route('front-page.contact') }}">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>