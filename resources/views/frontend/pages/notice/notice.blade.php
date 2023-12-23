@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3> Notice Board </span></h3>
              </div>
            <table class="table table-striped" style="width:100%;text-align: center;">
                <thead>
                  <tr>
                    <th scope="col">তারিখ</th>
                    <th scope="col" style="width:80%">নোটিশ</th>
                    <th scope="col">ডাউনলোড</th>
                    <!-- <th scope="col">Handle</th> -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <!-- <th scope="row">1</th> -->
                    <td>১/০২/২০২৩</td>
                    <td>ভর্তি নোটিশ</td>
                    <td><a href="assets/admission.pdf">Download</a></td>
                  </tr>
                  <tr>
                    <!-- <th scope="row">2</th> -->
                    <td>২৩/০২/২০২৩</td>
                    <td>টিকা সংক্রান্ত বিজ্ঞপ্তি</td>
                    <td><a href="assets/admission.pdf">ডাউনলোড</a></td>
                  </tr>
                  <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>১৮/০৩/২০২৩</td>
                    <td>বাংলা নববর্ষ উদযাপন</td>
                    <td><a href="assets/admission.pdf">ডাউনলোড</a></td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
  </section>
@endsection