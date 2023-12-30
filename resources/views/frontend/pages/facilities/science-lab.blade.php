@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> Physics Lab </span></h3>
            </div>
            <div>
                {!! nl2br(Helper::getSettings('application_physics_lab')) !!}
            </div>

            <div class="row">
                @foreach ($physics as $file)
                    <div class="col-lg-6 f-body">
                        <img class="f-img" src="{{ asset($file->file) }}">
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
                <h3>  <span> Chemistry Lab </span></h3>
            </div>
            <div>
                {!! nl2br(Helper::getSettings('application_chemistry_lab')) !!}
            </div>

            <div class="row">
                @foreach ($physics as $file)
                    <div class="col-lg-6 f-body">
                        <img class="f-img" src="{{ asset($file->file) }}">
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
                <h3>  <span> Biology Lab </span></h3>
            </div>
            <div>
                {!! nl2br(Helper::getSettings('application_biology_lab')) !!}
            </div>

            <div class="row">
                @foreach ($physics as $file)
                    <div class="col-lg-6 f-body">
                        <img class="f-img" src="{{ asset($file->file) }}">
                    </div>
                @endforeach
            </div>
           
        </div>
    </div>
  </section>
@endsection