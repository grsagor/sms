@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> Library </span></h3>
            </div>
            <div>
                {!! nl2br(Helper::getSettings('application_library')) !!}

            </div>

            <div class="col-lg-12 f-body">
                <img class="f-img" src="{{ asset('assets/img/library.jpg') }}">
            </div>
           
        </div>
    </div>
  </section>
@endsection