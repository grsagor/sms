@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> Dress Code </span></h3>
            </div> 
            <div class="row col-lg-12">
                <div class="col-lg-4">
                    <h5 class="dress-title">প্রথম ও দ্বিতীয় শ্রেণির ছাত্রীদের ইউনিফর্ম </h5>
                    <div class="dress-box">
                        <img src="{{ asset('assets/img/dress1.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="dress-title">তৃতীয় থেকে দশম শ্রেণির ছাত্রীদের ইউনিফর্ম</h5>
                    <div class="dress-box">
                        <img src="{{ asset('assets/img/dress2.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="dress-title">প্রথম থেকে দশম শ্রেণির ছাত্রদের ইউনিফর্ম </h5>
                    <div class="dress-box">
                        <img src="{{ asset('assets/img/dress3.jpg') }}">
                    </div>
                </div>

            </div>         
        </div>
    </div>
  </section>
@endsection