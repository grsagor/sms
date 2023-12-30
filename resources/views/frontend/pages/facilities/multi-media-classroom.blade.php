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

            <div class="row">
                @foreach ($multimedias as $file)
                    <div class="col-lg-6 f-body">
                        <img class="f-img" src="{{ asset($file->file) }}">
                    </div>
                @endforeach
            </div>
           
        </div>
    </div>
  </section>
@endsection