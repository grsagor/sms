@extends('frontend.include.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <!-- <h2>About</h2> -->
                <h3>  <span> Why study at ABM </span></h3>
            </div>
            <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/lab.jpg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>আধুনিক বিজ্ঞানাগার</h4>
                <p>আধুনিক সুযোগ সুবিধা সম্পন্ন ছাত্র-ছাত্রীদের ব্যবহারিক ক্লাশের জন্য একটি উন্নত মানের বিজ্ঞাগানার আছে।</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/sports.jpeg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>খেলাধুলা</h4>
                <p>খেলাধুলা ছাত্র/ছাত্রীদের শরীর গঠন ও মনকে প্রফুল্ল রাখে যা তার শিক্ষা গ্রহণের সহায়ক হিসাবে কাজ করে। তাই পাঠ গ্রহণের একঘেয়েমি কাটিয়ে পাঠ গ্রহণকে আনন্দময় করে তোলার লক্ষ্যে প্রতি বৎসর বার্ষিক ক্রীড়া প্রতিযোগিতা অনুষ্ঠিত হবে। </p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/culture.jpg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>সংস্কৃতি</h4>
                <p>এ.বি. এম. গ্র্যাজুয়েট স্কুল এন্ড কলেজ থেকে ছাত্র/ছাত্রীদের সুপ্ত প্রতিভার বিকাশ ঘটাতে নিয়মিত হাতের লেখা, কোরআন শিক্ষা, আবৃত্তি, গান, কৌতুক, ছড়া, গল্প বলা ও চিত্রাংকন সহ সৃজনশীল বিষয়ে প্রশিক্ষণের ব্যবস্থা আছে। বৎসরান্তে সাংস্কৃতিক প্রতিযোগিতার ব্যবস্থা করা হবে।  </p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/dr.jpg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>স্বাস্থ্য সেবা</h4>
                <p>ছাত্র/ছাত্রীদের মধ্যে পরিষ্কার পরিচ্ছন্নতা ও স্বাস্থ্য সচেতনতা বৃদ্ধির লক্ষ্যে প্রতি সপ্তাহে একবার প্রাতিষ্ঠানিক নিজস্ব ডাক্তার দ্বারা স্বাস্থ্য পরীক্ষা করা হবে।</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/tour.jpeg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>শিক্ষা সফর</h4>
                <p>ছাত্র/ছাত্রীদের জ্ঞান লাভের পাশাপাশি বিনোদনের উদ্দেশ্যে প্রতি বছর দেশের গুরুত্বপূর্ণ ও ঐতিহাসিক স্থান সমূহে শিক্ষা সফরের ব্যবস্থা করা হবে। </p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/formt.jpg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>ফর্ম শিক্ষক</h4>
                <p>প্রত্যেক শাখায় ২৫ জন ছাত্র/ ছাত্রীর জন্য ১ জন ফর্ম শিক্ষক থাকবেন। তিনি সার্বক্ষণিক গাইড হিসাবে দায়িত্বপালন করবেন। ছাত্র/ছাত্রীদের পড়ালেখার অগ্রগতি জানার জন্যে অভিভাবকগন নিজ নিজ সন্তানের ফর্ম শিক্ষকের সাথে নিয়মিত যোগাযোগ রক্ষা করবেন। </p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/note.jpg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>ডায়েরী সংরক্ষণ</h4>
                <p>প্রতিটি ছাত্র/ছাত্রীর জন্য ডায়েরী সংরক্ষণ অত্যন্ত গুরুত্বপূর্ণ। ছাত্র/ ছাত্রীদের শ্রেণিকক্ষে শিক্ষার মান, আচার-আচরণ, উপস্থিতি সম্পর্কিত তথ্য ও প্রতিদিনের বাড়ির কাজ বা প্রতিষ্ঠানের যে কোন নির্দেশনা ডায়েরীর মাধ্যমে অভিভাবককে অবহিত করা হবে। ছাত্র- ছাত্রীর ডায়েরীতে কোন প্রয়োজনীয় তথ্য প্রদান করা হয়েছে কিনা তা দেখে অভিভাবক নিয়মিত স্বাক্ষর করবেন এবং সে অনুযায়ী ব্যবস্থা গ্রহণ করবেন। </p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/parent.jpg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>অভিভাবক দিবস</h4>
                <p>প্রতি মাসে একবার অভিভাবক দিবস অনুষ্ঠিত হবে। উক্ত অভিভাবক দিবসের সভায় সংশ্লিষ্ট ফর্ম শ্রেণি শিক্ষক ও বিষয় শিক্ষকের সাথে অভিভাবকগন সরাসরি সাক্ষাতের মাধ্যমে ছাত্র/ছাত্রীদের অবস্থা ও মান উন্নয়ন সম্পর্কে আলোচনা করবেন। </p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('assets/img/cldr.jpg') }}" style="width:180px; height: 100px; object-fit: cover; border-radius: 5%;" alt=""></div>
                <h4>একাডেমিক ক্যালেন্ডার</h4>
                <p>প্রতি সেমিস্টারে স্কুলের যাবতীয় কার্যাবলী, অনুষ্ঠানসূচি, সেমিস্টার ছুটি , বিভিন্ন পরীক্ষার সময়সূচি ও ফলাফল ঘোষণার তারিখ সেমিস্টারের শুরুতেই একাডেমিক ক্যালেন্ডারের মাধ্যমে অভিভাবকদের জানানোর ব্যবস্থা করা হবে।   </p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Services Section -->
           
        </div>
    </div>
  </section>
@endsection