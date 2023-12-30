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

            <div class="row">
                @foreach ($libraries as $file)
                    <div class="col-lg-6 f-body">
                        <img class="f-img" src="{{ asset($file->file) }}">
                    </div>
                @endforeach
            </div>
           
        </div>
    </div>
  </section>
@endsection