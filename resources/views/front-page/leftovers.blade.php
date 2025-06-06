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
                                    @forelse($leftovers as $leftover)
                                    <div class="dishes-card style1 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="social-profile">
                                            <span class="plus-btn"> <a href="#"> <i class="fa-regular fa-heart"></i></a></span>
                                            <ul>
                                                <li><a href="#"><i class="fa-regular fa-basket-shopping-simple"></i></a></li>
                                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-light fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="dishes-thumb">
                                            <img src="assets/img/dishes/dishes1_1.png" alt="thmb">
                                        </div>
                                        <a href="">
                                            <h3>{{ $leftover->menu->name }}</h3>
                                        </a>
                                        <p>The Food Price</p>
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
                                                                            <div class="price">${{ number_format($leftover->menu->price, 2) }}</div>
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
                                    @empty
                                    <p>No leftovers available right now.</p>
                                    @endforelse
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