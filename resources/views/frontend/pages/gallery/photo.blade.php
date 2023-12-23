@extends('frontend.include.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="section-title">
            <h3> Photo Gallery</h3>
        </div>
       
    </div>
</div>



<section>
<div class="container">
    <div class="row">
        <div class="gallery-image">
           
            <div class="img-box">
              <img src="{{ asset('assets/img/g1.jpg') }}" alt="" />
              <div class="transparent-box">
                
              </div>
            </div>
            <div class="img-box">
              <img src="{{ asset('assets/img/g2.jpg') }}" alt="" />
              <div class="transparent-box">
               
              </div>
            </div>
            <div class="img-box">
              <img src="{{ asset('assets/img/g3.jpg') }}" alt="" />
              <div class="transparent-box">
              </div> 
            </div>
            <div class="img-box">
              <img src="{{ asset('assets/img/g4.jpg') }}" alt="" />
              <div class="transparent-box">
              </div> 
            </div>
            <div class="img-box">
              <img src="{{ asset('assets/img/g5.jpg') }}" alt="" />
              <div class="transparent-box">
              </div> 
            </div>
            
            <div class="img-box">
                <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="" />
                <div class="transparent-box">
                </div> 
            </div>
            <div class="img-box">
                <img src="{{ asset('assets/img/testimonials-bg.jpg') }}" alt="" />
                <div class="transparent-box">
                </div> 
            </div>
            <div class="img-box">
                <img src="{{ asset('assets/img/IMG_3347.JPG') }}" alt="" />
                <div class="transparent-box">
                </div> 
            </div>
          </div>
    </div>
</div>
</section>
@endsection