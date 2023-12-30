@extends('frontend.include.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="section-title p-0">
                <h3> Photo Gallery</h3>
            </div>

        </div>
    </div>

    <section>
        <div class="container">
            @foreach ($photo_events as $event)
                <div class="section-title p-0">
                    <h3>  <span> {{ $event->name }} </span></h3>
                </div>
                <div class="row">
                    <div class="gallery-image">
                        @foreach ($event->galleries as $item)
                            <div class="img-box p-0">
                                <img src="{{ asset($item->file) }}" alt="" />
                                <div class="transparent-box"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
