@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> ABM At a Glance </span></h3>
            </div>
            <div>
                {!! nl2br(Helper::getSettings('application_glance')) !!}
            </div>

            <div class="row justify-content-center">
              @foreach ($glances as $glance)
                <div class="col-lg-6">
                  <div class="glance-img">
                    <img src="{{ asset($glance->file) }}">
                  </div>
                </div>
              @endforeach
            </div>
           
        </div>
    </div>
  </section>
@endsection