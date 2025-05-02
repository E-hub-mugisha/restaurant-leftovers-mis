@extends('layouts.guest')
@section('title', 'Home')
@section('content')

<!-- Banner Section   S T A R T -->
<section class="banner-section fix">
    <div class="slider-area">
        <div class="swiper banner2-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner-wrapper style2 bg-img">
                        <div class="shape1_1 d-none d-xxl-block float-bob-x" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_1.svg"
                                alt="shape"></div>
                        <div class="shape1_2 d-none d-xxl-block float-bob-y" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_2.svg"
                                alt="shape"></div>
                        <div class="shape1_3 d-none d-xxl-block" data-animation="slideInLeft" data-duration="3s"
                            data-delay="2s"><img src="assets/img/shape/bannerShape2_3.svg" alt="shape"></div>
                        <div class="shape1_4 d-none d-xxl-block float-bob-x" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_4.svg"
                                alt="shape"></div>
                        <div class="shape1_5 d-none d-xxl-block float-bob-y" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_5.svg"
                                alt="shape"></div>
                        <div class="shape1_6 d-none d-xxl-block cir36"><img
                                src="assets/img/shape/bannerShape1_6.svg" alt="shape"></div>
                        <div class="overlay"></div>
                        <div class="banner-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-xxl-6">
                                        <div class="banner-title-area">
                                            <div class="banner-style1">
                                                <div class="section-title">
                                                    <h6 class="sub-title" data-animation="slideInRight"
                                                        data-duration="2s" data-delay=".3s">Leftover Rescue </h6>
                                                    <h1 class="title" data-animation="slideInRight"
                                                        data-duration="2s" data-delay=".5s">
                                                        Enjoy delicious
                                                    </h1>
                                                    <a class="theme-btn" href="{{ route('front-page.leftovers') }}"
                                                        data-animation="slideInRight" data-duration="2s"
                                                        data-delay=".7s">Reserve Now <i
                                                            class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 d-none d-xxl-block">
                                        <div class="banner-thumb-area" data-tilt data-animation="slideInRight"
                                            data-duration="2s" data-delay=".9s">
                                            <img src="assets/img/banner/bannerThumb2_1.png" alt="shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-wrapper style2 bg-img">
                        <div class="shape1_1 d-none d-xxl-block float-bob-x" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_1.svg"
                                alt="shape"></div>
                        <div class="shape1_2 d-none d-xxl-block float-bob-y" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_2.svg"
                                alt="shape"></div>
                        <div class="shape1_3 d-none d-xxl-block" data-animation="slideInLeft" data-duration="3s"
                            data-delay="2s"><img src="assets/img/shape/bannerShape2_3.svg" alt="shape"></div>
                        <div class="shape1_4 d-none d-xxl-block float-bob-x" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_4.svg"
                                alt="shape"></div>
                        <div class="shape1_5 d-none d-xxl-block float-bob-y" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_5.svg"
                                alt="shape"></div>
                        <div class="shape1_6 d-none d-xxl-block cir36"><img
                                src="assets/img/shape/bannerShape1_6.svg" alt="shape"></div>
                        <div class="overlay"></div>
                        <div class="banner-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-xxl-6">
                                        <div class="banner-title-area">
                                            <div class="banner-style1">
                                                <div class="section-title">
                                                    <h6 class="sub-title" data-animation="slideInRight"
                                                        data-duration="2s" data-delay=".3s">Leftover Rescue </h6>
                                                    <h1 class="title" data-animation="slideInRight"
                                                        data-duration="2s" data-delay=".5s">
                                                        Fresh food at a discount.
                                                    </h1>
                                                    <a class="theme-btn" href="{{ route('front-page.leftovers') }}"
                                                        data-animation="slideInRight" data-duration="2s"
                                                        data-delay=".7s">Reserve Now <i
                                                            class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 d-none d-xxl-block">
                                        <div class="banner-thumb-area" data-tilt data-animation="slideInRight"
                                            data-duration="2s" data-delay=".9s">
                                            <img src="assets/img/banner/bannerThumb2_2.png" alt="shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-wrapper style2 bg-img">
                        <div class="shape1_1 d-none d-xxl-block float-bob-x" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_1.svg"
                                alt="shape"></div>
                        <div class="shape1_2 d-none d-xxl-block float-bob-y" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_2.svg"
                                alt="shape"></div>
                        <div class="shape1_3 d-none d-xxl-block" data-animation="slideInLeft" data-duration="3s"
                            data-delay="2s"><img src="assets/img/shape/bannerShape2_3.svg" alt="shape"></div>
                        <div class="shape1_4 d-none d-xxl-block float-bob-x" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_4.svg"
                                alt="shape"></div>
                        <div class="shape1_5 d-none d-xxl-block float-bob-y" data-animation="slideInLeft"
                            data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape2_5.svg"
                                alt="shape"></div>
                        <div class="shape1_6 d-none d-xxl-block cir36"><img
                                src="assets/img/shape/bannerShape1_6.svg" alt="shape"></div>
                        <div class="overlay"></div>
                        <div class="banner-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-xxl-6">
                                        <div class="banner-title-area">
                                            <div class="banner-style1">
                                                <div class="section-title">
                                                    <h6 class="sub-title" data-animation="slideInRight"
                                                        data-duration="2s" data-delay=".3s">Leftover Rescue </h6>
                                                    <h1 class="title" data-animation="slideInRight"
                                                        data-duration="2s" data-delay=".5s">
                                                        Reserve leftovers before they’re gone!
                                                    </h1>
                                                    <a class="theme-btn" href="{{ route('front-page.leftovers') }}"
                                                        data-animation="slideInRight" data-duration="2s"
                                                        data-delay=".7s">Reserve Now <i
                                                            class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 d-none d-xxl-block">
                                        <div class="banner-thumb-area" data-tilt data-animation="slideInRight"
                                            data-duration="2s" data-delay=".9s">
                                            <img src="assets/img/banner/bannerThumb2_3.png" alt="shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="arrow-prev2"><img src="assets/img/icon/arrowPrev.svg" alt="Icon"></div>
            <div class="arrow-next2"><img src="assets/img/icon/arrowNext.svg" alt="Icon"></div>
            <div class="pagination-class2 swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Offer Section   S T A R T -->
<div class="offer-section fix bg-color2 mt-5">
    <div class="offer-wrapper">
        <div class="container">
            <div class="row gy-4">
                @foreach($buffets as $buffet)
                <div class="col-lg-6 col-xl-4">
                    <div class="offer-card style1 wow fadeInUp" data-wow-delay="0.2s"
                        style="background-image: url(assets/img/bg/offerBG2_1.jpg);">
                        <div class="offer-content">
                            <h6 class="text-white">start price ${{ $buffet->menu->price }}</h6>
                            <h3>{{ $buffet->name }}</h3>
                            <p class="text-white">{{ $buffet->description }}</p>
                            <a href="{{ route('front-page.leftovers') }}" class="theme-btn style5">
                                Reserve Now <i class="fa-sharp fa-regular fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="offer-thumb">
                            <img class="thumbImg" src="assets/img/offer/offerThumb1_2.png" alt="thumb">
                            <div class="shape float-bob-x"><img src="assets/img/shape/offerShape1_4.png"
                                    alt="shape"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



<!-- About Us Section   S T A R T -->
<section class="about-us-section fix section-padding pt-0">
    <div class="about-wrapper style2">
        <div class="shape1 d-none d-xxl-block"><img src="assets/img/shape/aboutShape2_1.png" alt="shape"></div>
        <div class="container">
            <div class="about-us section-padding">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-xl-start">
                        <div class="about-thumb mb-5 mb-lg-0">
                            <img src="assets/img/about/aboutThumb2_1.png" alt="thumb">
                            <div class="video-wrap">
                                <a href="https://www.youtube.com/watch?v=f2Gzr8sAGB8"
                                    class="play-btn popup-video"><img class="cir36"
                                        src="assets/img/shape/player.svg" alt="icon"></a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="title-area">
                            <div class="sub-title text-start wow fadeInUp" data-wow-delay="0.5s">
                                <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon">About US<img
                                    class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
                            </div>
                            <h2 class="title text-start wow fadeInUp" data-wow-delay="0.7s">
                                Variety of flavours from american cuisine
                            </h2>
                            <div class="text text-start wow fadeInUp" data-wow-delay="0.8s">Every dish is not just
                                prepared it's a crafted with a savor the a utmost precision and a deep understanding
                                sdf of flavor harmony. The experienced hands of our chefs</div>
                        </div>
                        <div class="fancy-box-wrapper">
                            <div class="fancy-box">
                                <div class="item"><img src="assets/img/icon/aboutIcon1_1.svg" alt="icon"></div>
                                <div class="item">
                                    <h6>super quality food</h6>
                                    <p>Served our Testy Food & good food by friendly</p>
                                </div>
                            </div>
                            <div class="fancy-box">
                                <div class="item"><img src="assets/img/icon/aboutIcon1_2.svg" alt="icon"></div>
                                <div class="item">
                                    <h6>Qualified Chef</h6>
                                    <p>Served our Testy Food & good food by friendly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="marquee-wrapper style-1 text-slider section-padding pt-0">
        <div class="marquee-inner to-left">
            <ul class="marqee-list d-flex">
                <li class="marquee-item style1">
                    <span class="text-slider"></span><span class="text-slider text-style">chicken pizza</span>
                    <span class="text-slider"></span><span class="text-slider text-style">GRILLED CHICKEN</span>
                    <span class="text-slider"></span><span class="text-slider text-style">BURGER</span>
                    <span class="text-slider"></span><span class="text-slider text-style">CHICKEN PIZZA</span>
                    <span class="text-slider"></span><span class="text-slider text-style">FRESH PASTA</span>
                    <span class="text-slider"></span><span class="text-slider text-style">ITALIANO FRENCH FRY</span>
                    <span class="text-slider"></span><span class="text-slider text-style">CHICKEN FRY</span>
                    <span class="text-slider"></span><span class="text-slider text-style">chicken pizza</span>
                    <span class="text-slider"></span><span class="text-slider text-style">GRILLED CHICKEN</span>
                    <span class="text-slider"></span><span class="text-slider text-style">BURGER</span>
                    <span class="text-slider"></span><span class="text-slider text-style">CHICKEN PIZZA</span>
                    <span class="text-slider"></span><span class="text-slider text-style">FRESH PASTA</span>
                    <span class="text-slider"></span><span class="text-slider text-style">ITALIANO FRENCH FRY</span>
                    <span class="text-slider"></span><span class="text-slider text-style">CHICKEN FRY</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="popular-dishes-section fix section-padding pt-0">
    <div class="popular-dishes-wrapper-container">
        <div class="container">
            <div class="popular-dishes-wrapper style2 section-padding bg-white ">
                <div class="shape1 float-bob-x d-none d-xxl-block"><img src="assets/img/shape/popularDishesShape1_1.png" alt="shape"></div>
                <div class="shape2 float-bob-x d-none d-xxl-block"><img src="assets/img/shape/popularDishesShape1_2.png" alt="shape"></div>
                <div class="container">
                    <div class="title-area">
                        <div class="sub-title text-center wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon">POPULAR DISHES<img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
                        </div>
                        <h2 class="title wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                            Our Most Popular Deals
                        </h2>
                    </div>
                    <div class="dishes-card-wrap style1 mb-60">
                        @foreach( $menus as $menu)
                        <div class="dishes-card style2 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="dishes-thumb">
                                <img src="assets/img/dishes/dishes2_1.png" alt="thumb">
                                <div class="circle-shape"><img class="cir36" src="assets/img/food-items/circleShape.png" alt="shape"></div>
                            </div>
                            <div class="dishes-content">
                                <a href="{{ route('front-page.menu.show', $menu->id) }}">
                                    <h3>{{ $menu->name }}</h3>
                                </a>
                                <div class="star"><img src="assets/img/icon/star2.svg" alt="icon"></div>
                                <div class="text">The registration fee</div>
                                <h6>${{ $menu->price }}</h6>
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $menu->id }}" class="theme-btn style6"> View Details <i class="fa-regular fa-basket-shopping"></i></a>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $menu->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content pb-3 pe-3">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row gy-5">
                                                <div class="col-xxl-6">
                                                    <div class="modal-thumb">
                                                        <div class="product-big-img bg-color2">
                                                            <div class="dishes-thumb">
                                                                <img class="img-fluid" src="assets/img/dishes/dishes3_1.png"
                                                                    alt="thumb">
                                                                <div class="circle-shape"><img class="cir36"
                                                                        src="assets/img/food-items/circleShape2.png" alt="shape"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div class="modal-details">
                                                        <div class="product-about">
                                                            <div class="title-wrapper">
                                                                <h2 class="product-title">{{ $menu->name }}</h2>
                                                                <div class="price">${{ $menu->price }}</div>
                                                            </div>

                                                            <div class="product-rating">
                                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                                    <span style="width:100%">Rated <strong class="rating">5.00</strong>
                                                                        out of 5 based on <span class="rating">1</span> customer
                                                                        rating</span>
                                                                </div>
                                                                <a href="shop-details.html" class="woocommerce-review-link">(<span
                                                                        class="count">2</span> customer reviews)</a>
                                                            </div>
                                                            <p class="text">{{ $menu->description }}</p>

                                                            <div class="actions">
                                                                <div class="quantity">
                                                                    <p>Quantity</p>

                                                                    <div class="qty-wrapper">
                                                                        <button class="quantity-plus qty-btn"><i
                                                                                class="fa-solid fa-plus"></i></button>
                                                                        <input type="number" class="qty-input" step="1" min="1"
                                                                            max="100" name="quantity" value="1" title="Qty">
                                                                        <button class="quantity-minus qty-btn"><i
                                                                                class="fa-solid fa-minus"></i></button>
                                                                    </div>
                                                                </div>
                                                                <a href="cart.html" class="theme-btn">Add to Cart<i
                                                                        class="fa-regular fa-cart-shopping bg-transparent text-white"></i></a>
                                                                <a href="wishlist.html" class="theme-btn style5 border-0">ADD TO
                                                                    wishlist<i class="fa-sharp fa-solid fa-heart"></i></a>
                                                            </div>
                                                            <div class="share">
                                                                <h6>share with friends</h6>
                                                                <ul class="social-media">
                                                                    <li> <a href="https://www.facebook.com/"> <i
                                                                                class="fa-brands fa-facebook-f"></i> </a> </li>
                                                                    <li> <a href="https://www.youtube.com/"> <i
                                                                                class="fa-brands fa-youtube"></i> </a> </li>
                                                                    <li> <a href="https://www.x.com/"> <i
                                                                                class="fa-brands fa-twitter"></i> </a> </li>
                                                                    <li> <a href="https://www.instagram.com/"> <i
                                                                                class="fa-brands fa-instagram"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="btn-wrapper">
                        <a class="theme-btn" href="{{ route('front-page.menu.index') }}"> VIEW ALL MENU <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<section class="popular-dishes-section fix section-padding">
    <div class="popular-dishes-wrapper style1">
        <div class="shape1 d-none d-xxl-block"><img src="assets/img/shape/popularDishesShape1_1.png" alt="shape">
        </div>
        <div class="shape2 float-bob-y d-none d-xxl-block"><img src="assets/img/shape/popularDishesShape1_2.png" alt="shape"></div>
        <div class="container">
            <div class="title-area">
                <div class="sub-title text-center wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon">POPULAR DISHES<img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
                </div>
                <h2 class="title wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                    Best selling Dishes
                </h2>
            </div>
            <div class="dishes-card-wrap style1">

                @foreach( $leftovers as $leftover)
                <div class="dishes-card style1 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="social-profile">
                        <span class="plus-btn"> <a href="#"> <i class="fa-regular fa-heart"></i></a></span>
                        <ul>
                            <li><a href="cart.html"><i class="fa-regular fa-basket-shopping-simple"></i></a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-light fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="dishes-thumb">
                        <img src="assets/img/dishes/dishes1_1.png" alt="thmb">
                    </div>
                    <a href="">
                        <h3>{{ $leftover->menu->name }}</h3>
                    </a>
                    <p>The registration fee</p>
                    <h6>${{ number_format($leftover->menu->price, 2) }}</h6>
                    <button
                        class="theme-btn style6 mt-3"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#confirmReserveModal{{ $leftover->id }}"
                        {{ $leftover->quantity < 1 ? 'disabled' : '' }}>
                        {{ $leftover->quantity < 1 ? 'Unavailable' : 'Reserve Now' }}
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="confirmReserveModal{{ $leftover->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content pb-3 pe-3">
                            <div class="modal-header border-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row gy-5">
                                        <div class="col-xxl-6">
                                            <div class="modal-thumb">
                                                <div class="product-big-img bg-color2">
                                                    <div class="dishes-thumb">
                                                        <img class="img-fluid" src="assets/img/dishes/dishes3_1.png" alt="thumb">
                                                        <div class="circle-shape"><img class="cir36" src="assets/img/food-items/circleShape2.png" alt="shape"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="modal-details">
                                                <div class="product-about">
                                                    <div class="title-wrapper">
                                                        <h2 class="product-title">{{ $leftover->menu->name }}</h2>
                                                        <div class="price">$69</div>
                                                    </div>

                                                    <div class="product-rating">
                                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                            <span style="width:100%">Rated <strong class="rating">5.00</strong>
                                                                out of 5 based on <span class="rating">1</span> customer
                                                                rating</span>
                                                        </div>
                                                        <a href="shop-details.html" class="woocommerce-review-link">(<span class="count">2</span> customer reviews)</a>
                                                    </div>
                                                    <p class="text">{{ $leftover->menu->description ?? 'No description available' }}</p>

                                                    <div class="actions">
                                                        <div class="quantity">
                                                            <p><strong>Quantity Available:</strong> {{ $leftover->quantity }}</p>
                                                            @if($leftover->discount)
                                                            <p><strong>Discount:</strong> {{ $leftover->discount }}%</p>
                                                            @endif

                                                            <p><strong>Pickup Time:</strong> {{ \Carbon\Carbon::parse($leftover->pickup_by)->format('M d, Y h:i A') }}</p>
                                                        </div>
                                                        <form action="{{ route('front-page.leftovers.reserve', $leftover->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="theme-btn" {{ $leftover->quantity < 1 ? 'disabled' : '' }}> {{ $leftover->quantity < 1 ? 'Unavailable' : 'Reserve Now' }}<i class="fa-regular fa-cart-shopping bg-transparent text-white"></i></button>
                                                        </form>

                                                    </div>
                                                    <div class="share">
                                                        <h6>share with friends</h6>
                                                        <ul class="social-media">
                                                            <li> <a href="https://www.facebook.com/"> <i class="fa-brands fa-facebook-f"></i> </a> </li>
                                                            <li> <a href="https://www.youtube.com/"> <i class="fa-brands fa-youtube"></i> </a> </li>
                                                            <li> <a href="https://www.x.com/"> <i class="fa-brands fa-twitter"></i> </a> </li>
                                                            <li> <a href="https://www.instagram.com/"> <i class="fa-brands fa-instagram"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="btn-wrapper  wow fadeInUp" data-wow-delay="0.9s" style="visibility: hidden; animation-delay: 0.9s; animation-name: none;">
                <a class="theme-btn" href="{{ route('front-page.leftovers') }}">VIEW ALL ITEM <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

</section>

<div class="wcu-section section-padding fix bg-white">
    <div class="wcu-wrapper style1">
        <div class="shape1 d-none d-xxl-block float-bob-y"><img src="assets/img/shape/wcuShape1_1.png" alt="shape">
        </div>
        <div class="shape2 d-none d-xxl-block"><img src="assets/img/shape/wcuShape1_2.png" alt="shape"></div>
        <div class="container">
            <div class="row gy-5 gx-80 d-flex align-items-center">
                <div class="col-md-6 order-2 order-md-1">
                    <div class="wcu-content">
                        <div class="title-area">
                            <div class="sub-title text-start wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon"> Work Process <img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
                            </div>
                            <h2 class="title text-start wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                                Delicious Food and Quick Delivery Together
                            </h2>
                        </div>

                        <div class="fancy-box style5">
                            <div class="item">
                                <div class="icon">
                                    <img src="assets/img/icon/wcuIcon1_1.svg" alt="icon">
                                </div>
                            </div>
                            <div class="item">
                                <h6>Reserve Easily</h6>
                                <p>Select from today’s leftover menu and pick it up before time runs out.</p>
                            </div>
                        </div>
                        <div class="fancy-box style5">
                            <div class="item">
                                <div class="icon">
                                    <img src="assets/img/icon/wcuIcon1_2.svg" alt="icon">
                                </div>
                            </div>
                            <div class="item">
                                <h6>Save Money</h6>
                                <p>Get quality meals at discounted prices while reducing food waste.</p>
                            </div>
                        </div>
                        <div class="fancy-box style5">
                            <div class="item">
                                <div class="icon">
                                    <img src="assets/img/icon/wcuIcon1_3.svg" alt="icon">
                                </div>
                            </div>
                            <div class="item">
                                <h6>Reduce Waste</h6>
                                <p>Your reservation helps us build a greener and more sustainable future.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  order-1 order-md-2">
                    <div class="wcu-thumb">
                        <img src="assets/img/wcu/wcuThumb1_1.png" alt="wcuThumb">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection