@extends('pages.layout.base')
@section('title', 'Home')

@section('header')
    @include('pages.layout.header')
@endsection

@section('main')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-9 col-md-12">
                    <h6></h6>
                    <h1 class="text-white">
                        Welcome On R-Event
                    </h1>
                    <div class="countdown">
                        <div id="timer" class="text-white"></div>
                    </div>
                    <h4><i class="fa-solid fa-calendar"></i> 05th - 09th March, 2021</h4>
                    <h4><i class="fa-solid fa-map"></i> 56/8, Dhanmondi, Dhaka - 1205</h4>
                </div>
            </div>
        </div>
    </section>
    <div class="section-top-border">
        <div class="row gallery-item">
            <div class="col-md-4">
                <a href="{{ asset('assets/users/gen/img/g1.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url({{ asset('assets/users/gen/img/g1.jpg') }});">
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ asset('assets/users/gen/img/g2.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url({{ asset('assets/users/gen/img/g2.jpg') }});">
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ asset('assets/users/gen/img/g3.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url({{ asset('assets/users/gen/img/g3.jpg') }});">
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ asset('assets/users/gen/img/g4.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url({{ asset('assets/users/gen/img/g4.jpg') }});">
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ asset('assets/users/gen/img/g5.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url({{ asset('assets/users/gen/img/g5.jpg') }});">
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ asset('assets/users/gen/img/g6.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url({{ asset('assets/users/gen/img/g6.jpg') }});">
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ asset('assets/users/gen/img/g7.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url({{ asset('assets/users/gen/img/g7.jpg') }});">
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ asset('assets/users/gen/img/g8.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url({{ asset('assets/users/gen/img/g8.jpg') }});">
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection



@section('footer')
    @include('pages.layout.footer')
@endsection
