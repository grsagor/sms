@extends('frontend.include.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <!-- <h2>About</h2> -->
                    <h3> <span> Morning Shift </span></h3>
                </div>
                <div class="col-lg-12 row md-intro" style="justify-content: center;" data-aos="fade-right" data-aos-delay="100">
                    @foreach ($morning_teachers as $morning_teacher)
                        <div class="col-lg-3 col-md-6 staff">
                            <div class="staff-inner">
                                <img src="{{ asset($morning_teacher->image) }}" alt="">
                                <h4>{{ $morning_teacher->name }}</h4>
                                <h5>{{ $morning_teacher->designation }}</h5>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <!-- <h2>About</h2> -->
                    <h3> <span> Day Shift </span></h3>
                </div>
                <div class="col-lg-12 row md-intro" style="justify-content: center;" data-aos="fade-right"
                    data-aos-delay="100">
                    @foreach ($day_teachers as $day_teacher)
                        <div class="col-lg-3 col-md-6 staff">
                            <div class="staff-inner">
                                <img src="{{ asset($day_teacher->image) }}" alt="">
                                <h4>{{ $day_teacher->name }}</h4>
                                <h5>{{ $day_teacher->designation }}</h5>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </section>
@endsection
