@extends('frontend.include.app')
@section('content')
<section>
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <!-- <h2>About</h2> -->
        <h3>প্রতিষ্ঠানের <span> নিয়মাবলী</span></h3>
      </div>

      <div class="row skills-content rules">
          <ul class="row">
            @foreach ($rules as $rule)
                <li class="col-6">{{$rule->rule}}</li>
            @endforeach            
          </ul>

      </div>

    </div>
  </section>
@endsection