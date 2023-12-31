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
                        @foreach ($notices as $notice)
                            <tr>
                                <td>{{ $notice->date }}</td>
                                <td>{{ $notice->notice }}</td>
                                <td><a href="{{ asset($notice->file) }}">Download</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
