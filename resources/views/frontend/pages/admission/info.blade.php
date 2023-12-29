@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> Admission </span></h3>
            </div>

            <div class="pdf-view">
                <object data="{{ asset($admission_info->file) }}" type="application/pdf" width="100%" height="100%">
                    <p>Alternative text - include a link <a href="{{ asset($admission_info->file) }}">to the PDF!</a></p>
                </object>
            </div>
           
        </div>
    </div>
  </section>
@endsection