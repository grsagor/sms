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
           
        </div>
    </div>
  </section>
@endsection