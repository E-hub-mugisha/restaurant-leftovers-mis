@extends('layouts.guest')
@section('content')

<!-- Contact Us Section    S T A R T -->
<div class="contact-us-section section-padding fix">
    <div class="contact-box-wrapper style2">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6 col-xl-3">
                    <div class="contact-box style1 border-0">
                        <div class="contact-icon"><img class="rounded-circle" src="assets/img/icon/phone2.png"
                                alt="icon"></div>
                        <h3 class="title">Phone Number</h3>
                        <p>+123 (5246) 2356 65</p>
                        <p> +123 (214) 321</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="contact-box style1 border-0">
                        <div class="contact-icon"><img class="rounded-circle" src="assets/img/icon/gmail2.png"
                                alt="icon"></div>
                        <h3 class="title">Email Address</h3>
                        <p>info.needhelp@gmail.com</p>
                        <p>hello@gmail.com.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="contact-box style1 border-0">
                        <div class="contact-icon"><img class="rounded-circle" src="assets/img/icon/location2.png"
                                alt="icon"></div>
                        <h3 class="title">Our Address</h3>
                        <p>8502 Preston Rd. Inglewood, Maine 98380</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="contact-box style1 border-0">
                        <div class="contact-icon"><img class="rounded-circle" src="assets/img/icon/clock2.png"
                                alt="icon"></div>
                        <h3 class="title">Opening Time</h3>
                        <p>Mon - Fri 09:00 AM 05: PM <br> Sat - Sun close</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form Section    S T A R T -->
<div class="contact-form-section style2 section-padding pt-0 fix">
    <div class="contact-form-wrapper style2">
        <div class="container">
            <div class="row gx-60 gy-5">
                <div class="col-12">
                    <div class="contact-form style2">
                        <h2>Get in Touch</h2>
                        <form class="row" action="#">
                            <div class="col-md-6">
                                <input class="bg-color2" type="text" placeholder="Full Name">
                            </div>
                            <div class="col-md-6">
                                <input class="bg-color2" type="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-6">
                                <input class="bg-color2" type="number" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <select name="orderby" class="single-select bg-color2" aria-label="Shop order">
                                    <option value="subject" selected="selected">Subject</option>
                                    <option value="complain">Complain</option>
                                    <option value="greetings">Greetings</option>
                                    <option value="date">Expire Date</option>
                                    <option value="price">About Price</option>
                                    <option value="order">About order</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea id="message" class="form-control bg-color2"
                                    placeholder="Write your message here..." rows="5"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <input id="reviewcheck" name="reviewcheck" type="checkbox">
                                <label for="reviewcheck">Collaboratively formulate principle capital. Progressively
                                    evolve user<span class="checkmark"></span></label>
                            </div>
                            <div class="col-12 form-group mb-0">
                                <button class="theme-btn w-100">SUBMIT NOW <i
                                        class="fa-sharp fa-regular fa-arrow-right-long bg-transparent text-white"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Section    S T A R T -->
<div class="map-wrapper" style="line-height: 0;">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28821.965472924858!2d89.07524545!3d25.4467646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fcb92fb4d9696d%3A0x74b18fed6b93e5e5!2sNobabgonj%20National%20garden!5e0!3m2!1sen!2sbd!4v1724820772279!5m2!1sen!2sbd"
        height="550" style="border:0; width: 100%;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- Map Section    E N D -->
@endsection