@extends('frontend.include.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach ($banners as $i => $banner)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <div class="overlay"></div>
                    <img class="d-block w-100" src="{{ asset($banner->file) }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <img style="height: 150px; width: 150px;" src="{{ asset('assets/img/logo_t.png') }}" alt="">
                        <h1 class="hero-text"> <span style="color: #84b0f0;">ABM </span>Graduate <span
                                style="color: #97B4DF;">School</span> & College</h1>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div> --}}

    <section class="p-0">
        <div class="owl-carousel owl-theme position-relative">
            @foreach ($banners as $i => $banner)
                <div class="item">
                    <img src="{{ asset($banner->file) }}" alt="">
                    <div class="carousel-text--container">
                        <div class="carousel-logo-container d-flex justify-content-center">
                            <img class="carousel-logo" src="{{ asset('uploads/settings/'.Helper::getSettings('site_logo')) }}" alt="">
                        </div>
                        <h5 class="carousel-label">ABM Graduate School & College</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <main id="main">


        <!-- ======= Intro Section ======= -->
        <section class="intro">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-2 col-md-6">
                        <div class="intro-box">
                            <img src="{{ asset('assets/img/principal.png') }}">
                            <p><a href="{{ route('frontend.administrations', ['type' => 'principal-message']) }}">Principal
                                    Corner</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
                        <div class="intro-box">
                            <img src="{{ asset('assets/img/achv.png') }}">
                            <p><a href="{{ route('frontend.acheivements') }}">Achivements</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
                        <div class="intro-box">
                            <img src="{{ asset('assets/img/result.png') }}">
                            <p><a href="{{ route('frontend.academics', ['type' => 'results']) }}">Results</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
                        <div class="intro-box">
                            <img src="{{ asset('assets/img/college.png') }}">
                            <p><a>College Corner</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
                        <div class="intro-box">
                            <img src="{{ asset('assets/img/school.png') }}">
                            <p><a href="{{ route('frontend.about.us', ['type' => 'glance']) }}">School Corner</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
                        <div class="intro-box">
                            <img src="{{ asset('assets/img/info.png') }}">
                            <p><a href="{{ route('frontend.admission', ['type' => 'info']) }}">Admission Info</a></p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->


        <!-- ======= About Section ======= -->
        <section id="about-chool" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <!-- <h2>About</h2> -->
                    <h3> প্রতিষ্ঠানের <span> পরিচিতি </span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-12 pt-4 pt-lg-0 content d-flex flex-column justify-content-center intro-text"
                        data-aos="fade-up" data-aos-delay="100">
                        {!! nl2br(Helper::getSettings('application_introduction')) !!}

                    </div>
                    <div class="col-lg-12 row md-intro" style="justify-content: center;" data-aos="fade-right"
                        data-aos-delay="100">
                        @foreach ($introductions as $introduction)
                            <div class="col-lg-3 md-intro-inner">
                                <img src="{{ asset($introduction->file) }}" alt="">
                                <h4>{{ $introduction->name }}</h4>
                                <h5>{{ $introduction->designation }}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->



        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0"
                                data-purecounter-end="{{ Helper::getSettings('application_number_of_students') }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>ছাত্র-ছাত্রী সংখ্যা</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0"
                                data-purecounter-end="{{ Helper::getSettings('application_number_of_teachers') }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>দক্ষ শিক্ষক-শিক্ষিকা</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-book"></i>
                            <span data-purecounter-start="0"
                                data-purecounter-end="{{ Helper::getSettings('application_number_of_scholarships_students') }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>বৃত্তি প্রাপ্তি</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-book"></i>
                            <span data-purecounter-start="0"
                                data-purecounter-end="{{ Helper::getSettings('application_number_of_gpa5_students') }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>জিপিএ ৫</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>


    </main><!-- End #main -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/css/owl.theme.default.min.css') }}">

    <style>
        .owl-carousel .item {
            position: relative;
            height: 80vh;
        }

        .owl-carousel .item img {
            filter: brightness(0.5);
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .carousel-text--container {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translate(0, -50%);
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .carousel-text {
            text-align: center;
            font-size: 24px;
        }

        .owl-theme .owl-nav {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-top: 0;
        }

        .owl-carousel .owl-dots {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .owl-carousel .owl-nav button.owl-next,
        .owl-carousel .owl-nav button.owl-prev {
            padding: 12px !important;
            font-size: 60px;
            margin: 0;
        }

        .carousel-label .letter {
            color: #fff;
            font-size: 50px;
            font-weight: 700;
        }

        .carousel-logo {
            width: 150px !important;
            filter: brightness(1) !important;
        }

        .carousel-label .letter:nth-child(1),
        .carousel-label .letter:nth-child(2),
        .carousel-label .letter:nth-child(3) {
            color: #84b0f0;
        }

        .carousel-label .letter:nth-child(12),
        .carousel-label .letter:nth-child(13),
        .carousel-label .letter:nth-child(14),
        .carousel-label .letter:nth-child(15),
        .carousel-label .letter:nth-child(16),
        .carousel-label .letter:nth-child(17) {
            color: #97B4DF;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
    <script src="{{ asset('vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            },
            onTranslated: startAnimation
        })



        function startAnimation() {
            let h5 = document.querySelector('.active .carousel-label');
            h5.innerHTML = h5.textContent.replace(/\S/g, "<span class='letter' style='display: inline-block'>$&</span>");

            let timeline = anime.timeline({
                autoplay: true,
                loop: false
            }).add({
                targets: '.active .carousel-label .letter',
                scale: [4, 1],
                opacity: [0, 1],
                easing: "easeOutExpo",
                duration: 1000,
                delay: (el, i) => 70 * i,
                endDelay: 500
            });
        }
        startAnimation();


    </script>
@endsection
