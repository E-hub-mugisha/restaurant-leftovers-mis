@php
$settings = \App\Models\RestaurantSetting::first();
@endphp
<!--<< Mouse Cursor Start >>-->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<!-- Back To Top Start -->
<button id="back-top" class="back-to-top">
    <i class="fa-regular fa-arrow-up"></i>
</button>

<!-- Offcanvas Area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('home') }}">
                            <!-- <img src="assets/img/logo/logo.svg" alt="logo-img"> -->
                            <h2 class="text-center text-white">{{ $settings->restaurant_name }}</h2>
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <p class="text d-none d-lg-block">
                    {{ $settings->about_us }}
                </p>
                <div class="offcanvas-gallery-area d-none d-xl-block">
                    <div class="offcanvas-gallery-items">
                        <a href="assets/img/header/01.jpg" class="offcanvas-image img-popup">
                            <img src="assets/img/header/01.jpg" alt="gallery-img">
                        </a>
                        <a href="assets/img/header/02.jpg" class="offcanvas-image img-popup">
                            <img src="assets/img/header/02.jpg" alt="gallery-img">
                        </a>
                        <a href="assets/img/header/03.jpg" class="offcanvas-image img-popup">
                            <img src="assets/img/header/03.jpg" alt="gallery-img">
                        </a>
                    </div>
                    <div class="offcanvas-gallery-items">
                        <a href="assets/img/header/04.jpg" class="offcanvas-image img-popup">
                            <img src="assets/img/header/04.jpg" alt="gallery-img">
                        </a>
                        <a href="assets/img/header/05.jpg" class="offcanvas-image img-popup">
                            <img src="assets/img/header/05.jpg" alt="gallery-img">
                        </a>
                        <a href="assets/img/header/06.jpg" class="offcanvas-image img-popup">
                            <img src="assets/img/header/06.jpg" alt="gallery-img">
                        </a>
                    </div>
                </div>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <h4>Contact Info</h4>
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">{{ $settings->address }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:+013-003-003-9993"><span
                                        class="mailto:{{ $settings->email }}">{{ $settings->email }}</span></a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">{{ $settings->days_open }}, {{ $settings->opening_hours }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                            </div>
                        </li>
                    </ul>
                    <div class="header-button mt-4">
                        <a href="shop.html" class="theme-btn">
                            <span class="button-content-wrapper d-flex align-items-center justify-content-center">
                                <span class="button-icon"><i
                                        class="fa-sharp fa-regular fa-cart-shopping bg-transparent text-white me-2"></i></span>
                                <span class="button-text">ORDER NOW</span>
                            </span>
                        </a>
                    </div>
                    <div class="social-icon d-flex align-items-center">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header Section Start -->
<header class="header-section-2">
    <div class="black-bg"></div>
    <div class="red-bg"></div>
    <div class="container-fluid">
        <div class="main-header-wrapper-2">
            <div class="logo-image">
                <a href="{{ route('home') }}">
                    <!-- <img src="assets/img/logo/logoWhite.svg" alt="img"> -->
                    <h2 class="text-center text-white">{{ $settings->restaurant_name }}</h2>
                </a>
            </div>
            <div class="main-header-items">
                <div class="header-top-wrapper-2">
                    <div class="text-white top-text">Welcome To <span class="text-theme-color2">{{ $settings->restaurant_name }}</div>
                    <div class="text-white top-text"><i class="fa-solid fa-location-dot me-3"></i> {{ $settings->address }}</div>
                    <div class="social-icon d-flex align-items-center">
                        <div class="text-white pe-2 top-text"><i class="fa-solid fa-user me-3"></i>
                            <a href="{{ route('login') }}"> Login / Register</a>
                        </div>
                        <span class="text-white top-text">Follow Us:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div id="header-sticky" class="header-2">
                    <div class="mega-menu-wrapper">
                        <div class="header-main">
                            <div class="logo">
                                <a href="{{ route('home') }}" class="header-logo">
                                    <!-- <img src="assets/img/logo/logo.svg" alt="logo-img"> -->
                                    <h2 class="text-center text-black">{{ $settings->restaurant_name }}</h2>
                                </a>
                            </div>
                            <div class="header-left">
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li class="has-dropdown active menu-thumb">
                                                    <a href="{{ route('home') }}">
                                                        Home

                                                    </a>
                                                </li>
                                                <li class="has-dropdown">
                                                    <a href="{{ route('front-page.about') }}">
                                                        About Us

                                                    </a>
                                                </li>
                                                <li class="has-dropdown">
                                                    <a href="{{ route('front-page.leftovers') }}">
                                                        Leftovers

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('front-page.menu.index') }}">
                                                        Menu

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('front-page.contact') }}">
                                                        Contact Us

                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="header-right d-flex justify-content-end align-items-center">
                                <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>

                                <div class="header__hamburger d-xl-block my-auto">
                                    <div class="sidebar__toggle">
                                        <i class="fas fa-bars"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Search Area Start -->
<div class="search-wrap">
    <div class="search-inner">
        <i class="fas fa-times search-close" id="search-close"></i>
        <div class="search-cell">
            <form method="get">
                <div class="search-field-holder">
                    <input type="search" class="main-search-input" placeholder="Search...">
                </div>
            </form>
        </div>
    </div>
</div>