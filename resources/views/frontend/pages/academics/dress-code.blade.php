@extends('frontend.include.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <!-- <h2>About</h2> -->
                    <h3> <span> Dress Code </span></h3>
                </div>
            <div class="row col-lg-12">
                @foreach ($dresses as $dress)
                    <div class="col-lg-4">
                        <h5 class="dress-title">{{$dress->title}}</h5>
                        <div class="dress-box">
                            <img src="{{ asset($dress->file) }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
