@extends('frontend.include.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <!-- <h2>About</h2> -->
                    <h3> <span> Why study at ABM </span></h3>
                </div>
                <!-- ======= Services Section ======= -->
                <section id="services" class="services">
                    <div class="container" data-aos="fade-up">

                        <div class="row">
                            @foreach ($whies as $why)
                                <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in"
                                    data-aos-delay="200">
                                    <div class="icon-box">
                                        <div class="icon"><img src="{{ asset($why->image) }}"
                                                style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;"
                                                alt=""></div>
                                        <h4>{{$why->title}}</h4>
                                        <p>{{$why->description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </section><!-- End Services Section -->

            </div>
        </div>
    </section>
@endsection
