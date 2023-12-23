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
                <!-- Item one -->
                <div class="carousel-item active">
                    <div class="overlay"></div>
                    <img class="d-block w-100" src="{{ asset('assets/img/hero-bg.jpg') }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <img style="height: 150px; width: 150px;" src="{{ asset('assets/img/logo_t.png') }}"
                            alt="">
                        <h1 class="hero-text"> <span style="color: #84b0f0;">ABM </span>Graduate <span
                                style="color: #97B4DF;">School</span> & College</h1>
                    </div>
                </div>
                <!-- Item two -->
                <div class="carousel-item">
                    <div class="overlay"></div>
                    <img class="d-block w-100" src="{{ asset('assets/img/hero-bg2.jpg') }}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <img style="height: 150px; width: 150px;" src="{{ asset('assets/img/logo_t.png') }}"
                            alt="">
                        <h1 class="hero-text"> <span style="color: #84b0f0;">ABM </span>Graduate <span
                                style="color: #97B4DF;">School</span> & College</h1>
                    </div>
                </div>
                <!-- Item three -->
                <div class="carousel-item">
                    <div class="overlay"></div>
                    <img class="d-block w-100" src="{{ asset('assets/img/hero-bg3.jpg') }}" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <img style="height: 150px; width: 150px;" src="{{ asset('assets/img/logo_t.png') }}"
                            alt="">
                        <h1 class="hero-text"> <span style="color: #84b0f0;">ABM </span>Graduate <span
                                style="color: #97B4DF;">School</span> & College</h1>
                    </div>
                </div>
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
                                <p><a href="{{ route('frontend.administrations', ['type' => 'principal-message']) }}">Principal Corner</a></p>
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
                            <p>
                                দেশসেরা ডেমরার সামসুল হক খান স্কুল অ্যান্ড কলেজ মাতুয়াইলবাসীর আগ্রহ ও দাবির প্রেক্ষিতে
                                বিশিষ্ট সমাজহিতৈষী ও বিদ্যোৎসাহী আলহাজ্ব সামসুল হক খানের উদ্যোগে ১৯৮৯ খ্রি. প্রতিষ্ঠিত হয়।
                                প্রতিষ্ঠানের আত্মপ্রকাশ ঘটে সামসুল হক খান জুনিয়র হাইস্কুল হিসেবে এবং সীমিত সংখ্যক শিক্ষার্থী
                                ও শিক্ষক নিয়ে। ১৯৯৩ সালে প্রতিষ্ঠান সরকারি স্বীকৃতি লাভ করে, অতঃপর পূর্ণাঙ্গ হাইস্কুলে পরিণত
                                হয়ে ওঠে। নাম ধারণ করে সামসুল হক খান উচ্চ মাধ্যমিক বিদ্যালয়। ১৯৯৫ সালে এমপিওভুক্ত হয় ও
                                প্রথমবারের মতো এসএসসি পরীক্ষায় অবতীর্ণ হয়। ২০০৩ সালে সংযুক্ত হয় মেয়েদের জন্য কলেজ শাখা। আর
                                তখন থেকেই প্রতিষ্ঠানের নতুন নামকরণ সামসুল হক খান স্কুল অ্যান্ড কলেজ। প্রতিষ্ঠানের সর্বশেষ
                                শাখা ইংলিশ ভার্সন উন্মুক্ত হয় ২০১৪ সালে। </p>
    
                            <p>সহকারী প্রধান শিক্ষক মো. সোহরাব হোসেন বালকদের দিবা শাখা ও সহকারী প্রধান শিক্ষক মো. আব্দুল
                                মতীন বালিকাদের প্রভাতি শাখার তত্ত্বাবধান ও পরিচালনার দায়িত্বে নিযুক্ত। ইংলিশ ভার্সনের
                                ইনচার্জ মো.আলমগীর হোসেন। কলেজ শাখার ইনচার্জের দায়িত্বে নিযুক্ত আছে মো. মুস্তাফিজুর
                                রহমান(তুহিন), সহকারী অধ্যাপক, গণিত বিভাগ। সামসুল হক খান স্কুল অ্যান্ড কলেজ সহশিক্ষা বিনোদনে
                                দেশের অন্যতম অগ্রগামী শিক্ষাপ্রতিষ্ঠান। স্কাউট গ্রুপসহ ডজন খানেক ক্লাব বিদ্যমান। সামসুল হক
                                খান স্কুল অ্যান্ড কলেজ স্কাউট গ্রুপ একটি সাড়া জাগানো স্কাউট সংগঠন। এছাড়া ইংলিশ ল্যাঙ্গুয়েজ
                                ক্লাব, বিজ্ঞান ক্লাব, আর্ট অ্যান্ড কালচারাল ক্লাব, ডিবেট ক্লাব, স্বদেশ ও বিশ্বভাবনা ক্লাব
                                উল্লেখযোগ্য। শিক্ষার্থীদের মানসিক বিকাশে ক্লাবগুলো অবদান রাখছে। </p>
    
                            <p>প্রতিষ্ঠানের প্রধান কর্ণধার প্রিন্সিপাল মো. মাহবুবুর রহমান মোল্লা। শুরু থেকেই তিনি প্রতিষ্ঠান
                                প্রধান হিসেবে নিযুক্ত আছেন। তাঁর দূরদৃষ্টি ও তীক্ষ্ণধী প্রতিষ্ঠানকে যথাসম্ভব দ্রুত বিস্তার ও
                                বিকশিত করেছে। মো. মাহবুবুর রহমান মোল্লা ডেমরা রোড সংলগ্ন মাতুয়াইলে প্রতিষ্ঠিত ড. মাহবুবুর
                                রহমান মোল্লা কলেজের প্রতিষ্ঠাতা ও চেয়ারম্যান, মাননীয় প্রধানমন্ত্রীর শিক্ষা সহায়তা ট্রাস্টি
                                বোর্ডের সদস্য ও উত্তর কোরিয়ার বৈশ্বিক শান্তি মঞ্চ এইচডব্লিউপিএল এর অ্যাম্বাসেডর।
                            </p>
    
                        </div>
                        <div class="col-lg-12 row md-intro" style="justify-content: center;" data-aos="fade-right"
                            data-aos-delay="100">
                            <div class="col-lg-3 md-intro-inner">
                                <img src="{{ asset('assets/img/md2.jpg') }}" alt="">
                                <h4>সামসুজ্জামান সুমন</h4>
                                <h5>প্রধান কর্ণধার প্রিন্সিপাল</h5>
                            </div>
                            <div class="col-lg-3 md-intro-inner">
                                <img src="{{ asset('assets/img/team/doha.png') }}" alt="">
                                <h4>দোহা</h4>
                                <h5>সহকারী প্রধান শিক্ষক</h5>
                            </div>
                            <div class="col-lg-3 md-intro-inner">
                                <img src="{{ asset('assets/img/team/azim.png') }}" alt="">
                                <h4>আজিম</h4>
                                <h5>সিনিয়র শিক্ষক</h5>
                            </div>
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
                                <span data-purecounter-start="0" data-purecounter-end="3200"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>ছাত্র-ছাত্রী সংখ্যা</p>
                            </div>
                        </div>
    
                        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                            <div class="count-box">
                                <i class="bi bi-people"></i>
                                <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>দক্ষ শিক্ষক-শিক্ষিকা</p>
                            </div>
                        </div>
    
                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                            <div class="count-box">
                                <i class="bi bi-book"></i>
                                <span data-purecounter-start="0" data-purecounter-end="53" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>বৃত্তি প্রাপ্তি</p>
                            </div>
                        </div>
    
                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                            <div class="count-box">
                                <i class="bi bi-book"></i>
                                <span data-purecounter-start="0" data-purecounter-end="115" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>জিপিএ ৫</p>
                            </div>
                        </div>
    
                    </div>
    
                </div>
            </section>
    
    
        </main><!-- End #main -->
@endsection