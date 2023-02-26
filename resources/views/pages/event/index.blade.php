@extends('pages.layout.base')
@section('title', 'Home')

@section('header')
    @include('pages.layout.header')
@endsection
<style>
    .banner-area {
        background: url({{ $event->cover }}) center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
    }
</style>
@section('main')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-9 col-md-12">
                    <h6></h6>
                    <h1 class="text-white">
                        {{ $event->title }}
                    </h1>
                    <div class="countdown">
                        <div id="timer" class="text-white"></div>
                    </div>
                    <h4><i class="fa-solid fa-calendar"></i>{{ date('d-m-Y h:i A', $event->start_date) }} -
                        {{ date('d-m-Y h:i A', $event->end_date) }}</h4>
                    <h4><i class="fa-solid fa-map"></i> {{ $event->place }}</h4>

                    <button class="btn btn-success btn-lg text-white my-5">Reserver une place</button>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center section-top-border">
        <h1 class="text-center" style="text-decoration: underline">Events details here</h1>
        <p>Promoted by : <b style="color:green">{{ $event->promoter->lastname }}&nbsp;{{ $event->promoter->firstname }}</b>
        </p>
        <br><br>
        <p style="text-align: start" class="container">
            {{ $event->description }}  {{$event->start_date}} {{$event->end_date}}
        </p>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var countDownDate = {{$event->start_date}};//new Date("March 5, 2023 15:37:25").getTime();
            countDownDate =  Number(countDownDate);
            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                console.log(countDownDate,now,distance);

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                document.getElementById("timer").innerHTML = "<div class='start-in'>Débute dans :</div>" +
                    days + "<span>jours  </span>: " + hours + "<span>heures</span>: " +
                    minutes + "<span>mins  </span>: " + seconds + "<span>secs  </span>";

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("timer").innerHTML = "EXPIRE";
                }
            }, 1000);
        });
    </script>
@endsection


@section('footer')
    @include('pages.layout.footer')
@endsection
