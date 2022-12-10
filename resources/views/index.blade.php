@extends('pages.layout.base')
@section('title', 'Home')

@section('header')
    @include('pages.layout.header')
@endsection

<style>
    :root {
        --event-card-ovelay-color: rgba(4, 9, 30, 0.459);
    }



    .event-card {
        border-radius: 0.5rem;
    }

    .single-gallery-image {
        border-radius: 0.5rem;
        background-clip: padding-box;
        box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
    }

    .single-gallery-image:hover {
        font-size: larger;
    }


    .single-gallery-image {
        display: grid;
        place-content: center;
        position: relative;
    }

    .event-title {
        color: rgb(237, 240, 241);
    }
</style>


@section('main')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-9 col-md-12">
                    <h6>Hey dear visitor</h6>
                    <h1 class="text-white">
                        Welcome On R-Event
                    </h1>
                    <h3 style="color: white;" class="mt-4">Book your event now and enjoy !!!</h3>
                </div>
            </div>
        </div>
    </section>
    <div class="section-top-border overlay-bg" style="margin-top: -250px">
        <div class="row gallery-item mx-2">
            <div class="col-md-4 event-card">
                <a href="{{ asset('assets/users/gen/img/g1.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background:linear-gradient(var(--event-card-ovelay-color), var(--event-card-ovelay-color)), url({{ asset('assets/users/gen/img/g1.jpg') }});">
                        <h2 class="event-title">Event Title Appears</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-4 event-card">
                <a href="{{ asset('assets/users/gen/img/g2.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background:linear-gradient(var(--event-card-ovelay-color), var(--event-card-ovelay-color)), url({{ asset('assets/users/gen/img/g2.jpg') }});">
                        <h2 class="event-title">Event Title Appears</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-4 event-card">
                <a href="{{ asset('assets/users/gen/img/g3.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background:linear-gradient(var(--event-card-ovelay-color), var(--event-card-ovelay-color)), url({{ asset('assets/users/gen/img/g3.jpg') }});">
                        <h2 class="event-title">Event Title Appears</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-6 event-card">
                <a href="{{ asset('assets/users/gen/img/g4.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background:linear-gradient(var(--event-card-ovelay-color), var(--event-card-ovelay-color)), url({{ asset('assets/users/gen/img/g4.jpg') }});">
                        <h2 class="event-title">Event Title Appears</h2>

                    </div>
                </a>
            </div>
            <div class="col-md-6 event-card">
                <a href="{{ asset('assets/users/gen/img/g5.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background:linear-gradient(var(--event-card-ovelay-color), var(--event-card-ovelay-color)), url({{ asset('assets/users/gen/img/g5.jpg') }});">
                        <h2 class="event-title">Event Title Appears</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-4 event-card">
                <a href="{{ asset('assets/users/gen/img/g6.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background:linear-gradient(var(--event-card-ovelay-color), var(--event-card-ovelay-color)), url({{ asset('assets/users/gen/img/g6.jpg') }});">
                        <h2 class="event-title">Event Title Appears</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-4 event-card">
                <a href="{{ asset('assets/users/gen/img/g7.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background:linear-gradient(var(--event-card-ovelay-color), var(--event-card-ovelay-color)), url({{ asset('assets/users/gen/img/g7.jpg') }});">
                        <h2 class="event-title">Event Title Appears</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-4 event-card">
                <a href="{{ asset('assets/users/gen/img/g8.jpg') }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background:linear-gradient(var(--event-card-ovelay-color), var(--event-card-ovelay-color)), url({{ asset('assets/users/gen/img/g8.jpg') }});">
                        <h2 class="event-title">Event Title Appears</h2>
                    </div>
                </a>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('events') }}" class="genric-btn info medium radius">See all events &nbsp;&nbsp;<i
                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
    </div>


@endsection



@section('footer')
    @include('pages.layout.footer')
@endsection
