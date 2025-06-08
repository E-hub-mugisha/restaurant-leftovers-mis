@extends('layouts.guest')
@section('title', 'Menu Detail')
@section('content')

<!-- Modified Menu Section Based on Provided Design -->
<div class="shop-details-section section-padding fix">
    <div class="shop-details-wrapper style1">
        <div class="container">
            <div class="shop-details bg-white">
                <div class="container">
                    <div class="row gx-60">
                        <div class="col-lg-6">
                            <div class="product-big-img bg-color2">
                                <div class="dishes-thumb">
                                    <img src="{{ asset('image/menu/' . $menu->images) }}" alt="thumb">
                                    <div class="circle-shape d-none d-md-block">
                                        <img class="cir36" src="{{ asset('assets/img/food-items/circleShape2.png') }}" alt="shape">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-about">
                                <div class="title-wrapper">
                                    <h2 class="product-title">{{ $menu->name }}</h2>
                                    <div class="price">RWF {{ $menu->price }}</div>
                                </div>
                                <div class="product-rating">
                                    @if($menu->available)
                                    <span class="badge bg-success">Available</span>
                                    @else
                                    <span class="badge bg-danger">Not Available</span>
                                    @endif
                                    @if($menu->feedbacks->count())
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5
                                            based on <span class="rating">{{ number_format($menu->feedbacks->avg('rating'), 1) }}</span> customer rating</span>
                                    </div>
                                    <a href="#" class="woocommerce-review-link">(<span class="count">2</span> customer reviews)</a>
                                    @endif
                                </div>
                                <p class="text">
                                    {{ $menu->description }}
                                </p>
                                <div class="actions">
                                    <div class="quantity">
                                        <p>Quantity</p>
                                        <div class="qty-wrapper">
                                            <input type="number" class="qty-input" step="1" min="1" max="100" name="quantity" value="1" title="Qty">
                                            <button class="quantity-plus qty-btn"><i class="fa-solid fa-plus"></i></button>
                                            <button class="quantity-minus qty-btn"><i class="fa-solid fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <a href="{{ route('menu.reservation', $menu->id ) }}" class="theme-btn">Reserve<i class="fa-regular fa-cart-shopping bg-transparent text-white"></i></a>
                                </div>
                                <div class="share">
                                    <h6>share with friends</h6>
                                    <ul class="social-media">
                                        <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a></li>
                                        <li><a href="https://www.x.com/"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Description and Reviews -->
                    <div class="row">
                        <div class="col-12">
                            <div class="product-description">
                                <h3>{{ $menu->name }} Description</h3>
                                <div class="desc">
                                    <p>{{ $menu->description }}</p>
                                </div>
                            </div>
                            <div class="product-review">
                                <h3>02 Reviews</h3>
                                <ul class="comment-list">
                                    @forelse($menu->feedbacks as $feedback)
                                    <li class="review comment-item">
                                        <div class="post-comment">
                                            <div class="comment-avater"><img src="{{ asset('assets/img/blog/comment-author1.png') }}" alt="Comment Author"></div>
                                            <div class="comment-content">
                                                <h4 class="name">{{ $feedback->user->name }}</h4>
                                                <div class="commented-on">{{ $feedback->created_at->diffForHumans() }}</div>
                                                <div class="star"><img src="{{ asset('assets/img/icon/star3.svg') }}" alt="icon"></div>
                                                <p class="text">{{ $feedback->comment }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <p>No feedback yet.</p>
                                    @endforelse
                                </ul>
                            </div>

                            <!-- Review Form -->
                            <div class="comment-form">
                                <div class="form-title">
                                    <h3 class="inner-title">Add a Review</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <div class="rating">
                                        <p>Rate this product? *</p>
                                        <ul class="star">
                                            <li><i class="fa-regular fa-star"></i></li>
                                            <li><i class="fa-regular fa-star"></i></li>
                                            <li><i class="fa-regular fa-star"></i></li>
                                            <li><i class="fa-regular fa-star"></i></li>
                                            <li><i class="fa-regular fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <form action="{{ route('feedback.store', $menu->id) }}" method="POST">
                                        @csrf
                                        <div class="col-12 form-group style-white2">
                                            <label>Rate this meal:</label>
                                            <select name="rating" class="form-control" required>
                                                <option value="">Select</option>
                                                @for($i = 5; $i >= 1; $i--)
                                                <option value="{{ $i }}">{{ $i }} star{{ $i > 1 ? 's' : '' }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-12 form-group style-white2">
                                            <label>Your feedback (optional)</label>
                                            <textarea name="comment" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-12 form-group style-white2">
                                            <input type="checkbox" class="form-check-input" name="is_public" id="is_public" value="1">
                                            <label class="form-check-label" for="is_public">Make feedback public</label>
                                        </div>
                                        <div class="col-12 form-group">
                                            <input id="reviewcheck" name="reviewcheck" type="checkbox">
                                            <label for="reviewcheck">Save my name, email, and website in this browser for the next time I comment.<span class="checkmark"></span></label>
                                        </div>
                                        <div class="col-12 form-group mb-0">
                                            <button type="submit" class="theme-btn">Submit Feedback <i class="fa-sharp fa-regular fa-arrow-right-long bg-transparent text-white"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Review Form -->
                        </div>
                    </div>
                    <!-- End Product Description & Reviews -->
                </div>
            </div>
        </div>
    </div>
</div>

<section class="popular-dishes-section fix section-padding">
    <div class="popular-dishes-wrapper style1">
        <div class="shape1 d-none d-xxl-block"><img src="{{ asset('assets/img/shape/popularDishesShape1_1.png') }}" alt="shape">
        </div>
        <div class="shape2 float-bob-y d-none d-xxl-block"><img src="{{ asset('assets/img/shape/popularDishesShape1_2.png') }}" alt="shape"></div>
        <div class="container">
            <div class="title-area">
                @if($menu->leftovers->count())
                <div class="sub-title text-center wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <img class="me-1" src="{{ asset('assets/img/icon/titleIcon.svg') }}" alt="icon">Popular Leftovers Dishes<img class="ms-1" src="{{ asset('assets/img/icon/titleIcon.svg') }}" alt="icon">
                </div>
                <h2 class="title wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                    Best Leftovers
                </h2>
            </div>
            <div class="dishes-card-wrap style1">

                @foreach( $menu->leftovers as $leftover)
                <div class="dishes-card style1 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="social-profile">
                        <span class="plus-btn"> <a href="#"> <i class="fa-regular fa-heart"></i></a></span>
                        <ul>
                            <li><a href="#"><i class="fa-regular fa-basket-shopping-simple"></i></a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-light fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="dishes-thumb">
                        <img src="{{ asset('image/menu/' . $leftover->menu->images) }}" alt="thmb">
                    </div>
                    <a href="">
                        <h3>{{ $leftover->menu->name }}</h3>
                    </a>
                    <p>The Food Price</p>
                    <h6>RWF {{ number_format($leftover->menu->price, 2) }}</h6>
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
                                                        <img class="img-fluid" src="{{ asset('assets/img/dishes/dishes3_1.png') }}" alt="thumb">
                                                        <div class="circle-shape"><img class="cir36" src="{{ asset('assets/img/food-items/circleShape2.png') }}" alt="shape"></div>
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
                @endif

            </div>
            <div class="btn-wrapper  wow fadeInUp" data-wow-delay="0.9s" style="visibility: hidden; animation-delay: 0.9s; animation-name: none;">
                <a class="theme-btn" href="{{ route('front-page.leftovers') }}">VIEW ALL ITEM <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

</section>
@endsection