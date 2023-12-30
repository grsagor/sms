@extends('frontend.include.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <!-- <h2>About</h2> -->
                    <h3> <span> ফলাফল </span></h3>
                </div>

                @if ($result)
                    <div class="pdf-view">
                        <object data="{{ asset($result->file) }}" type="application/pdf" width="100%" height="100%">
                            <p>Alternative text - include a link <a href="{{ asset($result->file) }}">to the PDF!</a></p>
                        </object>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
