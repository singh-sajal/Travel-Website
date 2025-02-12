@extends('web.app.app')
@section('css')
@endsection
@section('topBar')
    <div class="topbar-area topbar-style-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 align-items-center d-xl-flex d-none">
                    <div class="topbar-contact-left">
                        <ul class="contact-list">
                            <li><i class="bi bi-telephone-fill"></i> <a href="tel:+918062182339">+91-8062182339</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6 text-xl-center text-md-start text-center">
                    <div class="topbar-ad">
                        <a
                            href="https://api.whatsapp.com/send?phone=918062182339&amp;text=Hello,%20Travel%20Leads%20!%20Please%20share%20exclusive%20Kashmir%20tour%20packages%20deals">Deals
                            & Offers</a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 d-md-flex  d-none align-items-center justify-content-end">
                    <ul class="topbar-social-links">
                        <li><a href="https://www.instagram.com/travelleads.in/profilecard/?igsh=dWZlY3R2ZHFtOTlj"><i
                                    class='bx bxl-instagram-alt'></i></a></li>
                        <li><a
                                href="https://api.whatsapp.com/send?phone=918062182339&amp;text=Hello,%20Travel%20Leads%20!%20Please%20share%20exclusive%20Goa%20tour%20packages%20deals"><i
                                    class="bx bxl-whatsapp-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="breadcrumb breadcrumb-style-one">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h2 class="breadcrumb-title">{{ $destination->title }} Tour Packages</h2>
                <ul class="d-flex justify-content-center breadcrumb-items">
                </ul>
            </div>
        </div>
    </div>

    <div class="package-area package-style-one pt-110 " id="packages">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section-head-alpha">
                        <h2>Popular Tour Package</h2>
                        <p>Best offers for the most amazing tours to {{ $destination->title }}</p>
                    </div>
                </div>

            </div>
            <div class="row g-4">
                @foreach ($destination->package as $package)
                    <div class="col-lg-4 col-md-6">
                        <div class="package-card-alpha">
                            <div class="package-thumb">
                                <a href="#contact"><img src="{{ asset($package->image) }}" alt=""></a>
                                <p class="card-lavel">
                                    <i class="bi bi-clock"></i> <span>{{ $package->duration_nights }} Night &
                                        {{ $package->duration_days }} Days</span>
                                </p>
                            </div>
                            <div class="package-card-body">
                                <h3 class="p-card-title"><a href="#contact">Beautiful {{ $destination->title }}
                                        {{ $package->duration_nights }} Night {{ $package->duration_days }} Days</a></h3>
                                <div class="icon-part row">
                                    <div class="icon-txt col-lg-3"><i class="fa-solid fa-car"></i><span>Drive</span></div>
                                    <div class="icon-txt col-lg-3"><i class="fa-solid fa-hotel"></i><span>Hotel</span></div>
                                    <div class="icon-txt col-lg-3"><i class="fa-solid fa-bus"></i><span>Tour</span></div>
                                    <div class="icon-txt col-lg-3"><i class="fa-solid fa-utensils"></i><span>Meal</span>
                                    </div>
                                </div>
                                <div class="p-card-bottom">
                                    <div class="book-btn">
                                        <a href="#contact">Get Quotes <i class='bx bxs-right-arrow-alt'></i></a>
                                    </div>
                                    <div class="p-card-info">
                                        <span>Starting From</span>
                                        <h6>₹{{ $package->price }} <span>Per Person</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="testimonial-area testimonial-style-one mt-120" id="testimonials">
        <div class="testimonial-shape-group"></div>
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section-head-alpha">
                        <h2>What Our Client Say About Us</h2>
                        <p>Our happy clients reviews for us.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="slider-arrows text-center d-lg-flex d-none justify-content-end mb-3">
                        <div class="testi-prev custom-swiper-prev" tabindex="0" role="button"
                            aria-label="Previous slide"> <i class="bi bi-chevron-left"></i> </div>
                        <div class="testi-next custom-swiper-next" tabindex="0" role="button" aria-label="Next slide"><i
                                class="bi bi-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="swiper testimonial-slider-one position-relative">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-card testimonial-card-alpha">

                            <div class="testimonial-card-top">
                                <div class="qoute-icon"><i class='bx bxs-quote-left'></i></div>
                                <h3 class="testimonial-count">01</h3>
                            </div>
                            <div class="testimonial-body">
                                <p>Cheers team Travel Leads. We just loved your great service. Our trip to
                                    {{ $destination->title }} became
                                    memorable only
                                    because of team Travel Leads. Friendly driver. Well planned itinerary.
                                    Ease of booking ( the really appreciable part) & everything was worth for the money. It
                                    was a super
                                    great experience. We would like to plan other unseen places too.</p>
                                <div class="testimonial-bottom">
                                    <div class="reviewer-info">
                                        <h4 class="reviewer-name">Anju Rajan</h4>
                                        <h6>Traveller</h6>
                                    </div>
                                    <ul class="testimonial-rating">
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card testimonial-card-alpha">

                            <div class="testimonial-card-top">
                                <div class="qoute-icon"><i class='bx bxs-quote-left'></i></div>
                                <h3 class="testimonial-count">02</h3>
                            </div>
                            <div class="testimonial-body">
                                <p>I felt the experience was great and amazing not only because of the beautiful place that
                                    I visited
                                    but due to the awesome response by Travel Leads. They made sure the leisure day was fun
                                    filled by
                                    sharing the details of the area where we stayed. They let us customize the package and
                                    beautifully
                                    arranged and executed the plans. The overall experience was awesome.</p>
                                <div class="testimonial-bottom">
                                    <div class="reviewer-info">
                                        <h4 class="reviewer-name">Kinjal Jain</h4>
                                        <h6>Traveller</h6>
                                    </div>
                                    <ul class="testimonial-rating">
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card testimonial-card-alpha">

                            <div class="testimonial-card-top">
                                <div class="qoute-icon"><i class='bx bxs-quote-left'></i></div>
                                <h3 class="testimonial-count">03</h3>
                            </div>
                            <div class="testimonial-body">
                                <p>The planning of the tour was super superb, I had a great time and appreciate the
                                    professional and
                                    flexible with my trip schedule. The sightseeing-spots we covered were very beautiful and
                                    it catches
                                    the eyes of everyone... We had a lovely stay, great food, and we explored the place like
                                    anything.
                                    These 7 days and 6 nights' time spends was too good... The experience was really were
                                    words are less
                                    to describe... We'll definitely use Travel Leads again for future bookings.</p>
                                <div class="testimonial-bottom">
                                    <div class="reviewer-info">
                                        <h4 class="reviewer-name">Sunil Singh</h4>
                                        <h6>Traveller</h6>
                                    </div>
                                    <ul class="testimonial-rating">
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-card testimonial-card-alpha">

                            <div class="testimonial-card-top">
                                <div class="qoute-icon"><i class='bx bxs-quote-left'></i></div>
                                <h3 class="testimonial-count">04</h3>
                            </div>
                            <div class="testimonial-body">
                                <p>My first trip to {{ $destination->title }} was remarkable. All Thanks to Travel Leads.
                                    The team organized
                                    everythings
                                    so perfectly. At an affordable price we had an amazing trip. The hotels were nice with
                                    great
                                    hospitality. My friends and I had a great time there. The view was breathtaking. The
                                    food service was
                                    really good and tasty. Overall experience was so good that I would definitely do it
                                    again in the
                                    future, if given the chance.</p>
                                <div class="testimonial-bottom">
                                    <div class="reviewer-info">
                                        <h4 class="reviewer-name">Aanchal Malhotra</h4>
                                        <h6>Traveller</h6>
                                    </div>
                                    <ul class="testimonial-rating">
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="about-main-wrappper pt-100" id="about">
        <div class="container">
            <div class="about-tab-wrapper">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <div class="about-tab-image-grid text-center">
                            <div class="about-video d-inline-block">
                                <img src="assets/images/about/about-g2.png" alt="">

                            </div>
                            <div class="row float-images g-4">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="about-image">
                                        <img src="assets/images/about/about-g1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="about-image">
                                        <img src="assets/images/about/about-g3.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="about-tab-wrap">
                            <h2 class="about-wrap-title">
                                About <span>TravelinTrip</span>
                            </h2>

                            <div class="about-tab-switcher">
                                <ul class="nav nav-pills mb-3 justify-content-md-between justify-content-center"
                                    id="about-tab-pills" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link active" id="pills-about1" data-bs-toggle="pill"
                                            data-bs-target="#about-pills1" role="tab" aria-controls="about-pills1"
                                            aria-selected="true">
                                            <h3>10+</h3>
                                            <h6>Years Experience</h6>
                                        </div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link" id="pills-about2" data-bs-toggle="pill"
                                            data-bs-target="#about-pills2" role="tab" aria-controls="about-pills2"
                                            aria-selected="false">
                                            <h3>100+</h3>
                                            <h6>Tour Packages</h6>
                                        </div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link" id="pills-about3" data-bs-toggle="pill"
                                            data-bs-target="#about-pills3" role="tab" aria-controls="about-pills3"
                                            aria-selected="false">
                                            <h3>5000+</h3>
                                            <h6>Satisfied Customers</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content about-tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="about-pills1" role="tabpanel"
                                    aria-labelledby="pills-about1">
                                    <p>Travel Leads is a one-stop enterprise that offers the complete range of travel
                                        related services.
                                        Superior knowledge, efficient planning and the ability to anticipate and resolve
                                        potential problems
                                        along the way are the reasons behind our growth. We vow to provide best possible
                                        services at best
                                        possible prices to all our clients. Hope you have an amazing journey with
                                        us.TRAVELLING EXPERIENCE
                                        REDEFINED.We believe in helping you to De-stress. Personalized packages and
                                        dedicated tour team to
                                        provide you the best Experience in your Hard-earned vacations.</p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="contact-wrapper" id="contact">

        <div class="container mt-120">
            <form action="{{ route('web.query') }}" method="POST">
                @csrf
                <div class="contact-form-wrap">
                    <h4>Get a free quote now</h4>
                    <p>Please fill your details and send it. We will get back to you shortly</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="custom-input-group">
                                <input type="text" name="name" placeholder="Your name" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="custom-input-group">
                                <input type="text" name="email" placeholder="Your Email" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="custom-input-group">
                                <input type="text" name="phone" placeholder="Your Phone" required>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="custom-input-group">
                                <input type="text" name="city" placeholder="Your City" required>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group  mb-3">
                            <div class="flex-grow-1 me-1 custom-input-group mb-2">
                                <input id="name" required name="captcha" minlength="6" maxlength="6"
                                    class="form-control custom-input-group" type="text"
                                    placeholder="Enter Captcha Code here">
                            </div>
                            @if (session('failure'))
                                <div id="failure-alert" class="alert alert-danger alert-dismissible fade show mb-2"
                                    style="min-width: 300px;" role="alert">
                                    <strong>Error!</strong> {{ session('failure') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <img id="captchaImage" class="border" src="{{ route('web.captcha') }}" alt="CAPTCHA">
                                <a class="btn btn-danger" onclick="refreshCaptcha(event)">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </div>
                        </div>
                        @error('captcha')
                            <span class="text-danger fw-bold"> <strong>{{ $message }}</strong> </span>
                        @enderror
                        <div id="submitting-message" style="display: none;">
                            <p style="color:black">Submitting Your Details...</p>
                        </div>
                    </div>
                    <div class="custom-input-group">
                        <div class="submite-btn">
                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function refreshCaptcha(event) {
            event.preventDefault();
            var captchaImage = document.getElementById('captchaImage');
            captchaImage.src = "{{ route('web.captcha') }}";
        }
    </script>
@endsection
