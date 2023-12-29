@extends('frontend.include.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <!-- <h2>About</h2> -->
                    <h3> <span> Governing Body </span></h3>
                </div>
                <div class="col-lg-12 row md-intro" style="justify-content: center;" data-aos="fade-right" data-aos-delay="100">
                    @foreach ($bodies as $body)
                        <div class="col-lg-3 col-md-6 md-intro-inner">
                            <img src="{{ asset($body->image) }}" alt="">
                            <h4>{{$body->name}}</h4>
                            <h5>{{$body->designation}}</h5>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
