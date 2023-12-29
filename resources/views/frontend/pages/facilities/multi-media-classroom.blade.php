@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> Multi-Media Classroom </span></h3>
            </div>
            <div>
                {!! nl2br(Helper::getSettings('application_multimedia_classroom')) !!}

            </div>

            <div class="col-lg-12 f-body">
                <img class="f-img" src="{{ asset('assets/img/mmclass.png') }}">
            </div>
           
        </div>
    </div>
  </section>
@endsection