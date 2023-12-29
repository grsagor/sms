@extends('frontend.include.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
    </div>

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
