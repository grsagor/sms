@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> QIP SMS Service </span></h3>
            </div>
            <div>
                {!! nl2br(Helper::getSettings('application_qip_sms_service')) !!}

            </div>

            <div class="row">
                @foreach ($physics as $file)
                    <div class="col-lg-6 f-body">
                        <img class="f-img" src="{{ asset($file->file) }}">
                    </div>
                @endforeach
            </div>smss
           
        </div>
    </div>
  </section>
@endsection