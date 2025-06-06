@extends('layouts.guest')
@section('content')

<!-- About Us Section   S T A R T -->
<section class="about-us-section fix section-padding pt-0">
    <div class="about-wrapper style2">
        <div class="shape1 d-none d-xxl-block"><img src="assets/img/shape/aboutShape2_1.png" alt="shape"></div>
        <div class="container">
            <div class="about-us section-padding">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-xl-start">
                        <div class="about-thumb mb-5 mb-lg-0">
                            <img src="assets/img/about/restaurant.jpg" alt="Food MIS Overview" style="width: 90%; height: auto;">
                            <div class="video-wrap">
                                <a href="https://www.youtube.com/watch?v=f2Gzr8sAGB8"
                                    class="play-btn popup-video"><img class="cir36"
                                        src="assets/img/shape/player.svg" alt="video play icon"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="title-area">
                            <div class="sub-title text-start wow fadeInUp" data-wow-delay="0.5s">
                                <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon">About Us<img
                                    class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
                            </div>
                            <h2 class="title text-start wow fadeInUp" data-wow-delay="0.7s">
                                Reducing Waste & Feeding More through Smart Management
                            </h2>
                            <div class="text text-start wow fadeInUp" data-wow-delay="0.8s">
                                Our Restaurant Food Leftovers Management Information System (MIS) is designed to efficiently manage and distribute surplus food to those in need. By digitizing leftover tracking, buffet availability, user reservations, and donations, we create a sustainable ecosystem that benefits both the environment and our community.
                            </div>
                        </div>
                        <div class="fancy-box-wrapper">
                            <div class="fancy-box">
                                <div class="item"><img src="assets/img/icon/aboutIcon1_1.svg" alt="icon"></div>
                                <div class="item">
                                    <h6>Smart Waste Management</h6>
                                    <p>Track and reduce leftovers through real-time data and automation.</p>
                                </div>
                            </div>
                            <div class="fancy-box">
                                <div class="item"><img src="assets/img/icon/aboutIcon1_2.svg" alt="icon"></div>
                                <div class="item">
                                    <h6>Community Impact</h6>
                                    <p>Enable food donations and enhance community feeding programs efficiently.</p>
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
                    <span class="text-slider text-style">Leftover Tracking</span>
                    <span class="text-slider text-style">Buffet Monitoring</span>
                    <span class="text-slider text-style">User Reservations</span>
                    <span class="text-slider text-style">Donation Integration</span>
                    <span class="text-slider text-style">Real-Time Reports</span>
                    <span class="text-slider text-style">Sustainability</span>
                    <span class="text-slider text-style">Restaurant Network</span>
                    <span class="text-slider text-style">Food Redistribution</span>
                    <span class="text-slider text-style">Leftover Tracking</span>
                    <span class="text-slider text-style">Buffet Monitoring</span>
                    <span class="text-slider text-style">User Reservations</span>
                    <span class="text-slider text-style">Donation Integration</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- About Us Section   E N D -->

@endsection