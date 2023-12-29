@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> Principal's Message </span></h3>
            </div>
            <div class="p-img">
                <img src="{{ asset($principal->image) }}"> 
                <h4>
                    {{$principal->name}}
                </h4>
                <small> Principal, ABM School & College</small>
            </div>
            <div>
                {!! nl2br(Helper::getSettings('application_principal_message')) !!}
            </div>
           
        </div>
    </div>
  </section>
@endsection