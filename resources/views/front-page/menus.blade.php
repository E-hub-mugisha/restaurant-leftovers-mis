@extends('layouts.guest')

@section('content')
<div class="container mt-4">

    <!-- Shop Section S T A R T -->
    <div class="shop-section section-padding fix">
        <div class="shop-wrapper style1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 order-1 order-md-2 wow fadeInUp" data-wow-delay=".5s">
                        <div class="sort-bar">
                            <div class="row g-sm-0 gy-20 justify-content-between align-items-center">
                                <div class="col-md">
                                    <p class="woocommerce-result-count">Showing Results</p>
                                </div>

                                <div class="col-md-auto">
                                    <form class="woocommerce-ordering" method="get">
                                        <select name="orderby" class="single-select" aria-label="Shop order">
                                            <option value="menu_order" selected="selected">Default Sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by latest</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-md-auto">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-grid-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-grid" type="button" role="tab"
                                                aria-controls="pills-grid" aria-selected="true"><i
                                                    class="fa-solid fa-grid"></i></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-list-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-list" type="button" role="tab"
                                                aria-controls="pills-list" aria-selected="false"><i
                                                    class="fa-solid fa-list"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                                aria-labelledby="pills-grid-tab" tabindex="0">
                                <div class="dishes-card-wrap style2">
                                    @foreach( $menus as $menu)
                                    <div class="dishes-card style2 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="dishes-thumb justify-content-center">
                                            <img src="assets/img/dishes/dishes2_1.png" alt="thumb">
                                            <div class="circle-shape"><img class="cir36" src="assets/img/food-items/circleShape.png" alt="shape"></div>
                                        </div>
                                        <div class="dishes-content">
                                            <a href="{{ route('front-page.menu.show', $menu->id) }}">
                                                <h3>{{ $menu->name }}</h3>
                                            </a>
                                            <div class="star"><img src="assets/img/icon/star2.svg" alt="icon"></div>
                                            <div class="text">The Food Price</div>
                                            <h6>${{ $menu->price }}</h6>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $menu->id }}" class="theme-btn style6"> Quick Details <i class="fa-regular fa-basket-shopping"></i></a>
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
                                                                            <a href="#" class="woocommerce-review-link">(<span
                                                                                    class="count">2</span> customer reviews)</a>
                                                                        </div>
                                                                        <p class="text">{{ $menu->description }}</p>

                                                                        <div class="actions">

                                                                            <a href="{{ route('menu.reservation', $menu->id ) }}" class="theme-btn">Reserve<i
                                                                                    class="fa-regular fa-cart-shopping bg-transparent text-white"></i></a>
                                                                            <a href="{{ route('front-page.menu.show', $menu->id) }}" class="theme-btn style5 border-0">Details<i class="fa-sharp fa-solid fa-heart"></i></a>
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
                            </div>
                        </div>


                        <div class="page-nav-wrap text-center">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection