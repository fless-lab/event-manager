<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        background: url({{ asset('assets/super/img/undraw_profile_1.svg') }}) center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        color: #fff;
    }

    .test {
        margin: 20px;
    }
</style>

<body>
    <div class="wrapper">
        <div class="test">
            @foreach ($reservations as $reservation)
                @foreach ($promoters as $promoter)
                    @foreach ($events as $event)
                        @if ($promoter->id == $event->promoter_id)
                            @if ($event->id == $reservation->event_id)
                                @foreach ($tarifs as $tarif)
                                    @if ($tarif->id == $reservation->tarif_id)
                                        @foreach ($users as $user)
                                            @if ($user->id == $reservation->user_id)
                                                <p>Evenement :{{ $event->title }}</p>
                                                <p>Ticket :{{ $tarif->name }}</p>
                                                <p>Prix :{{ $tarif->price }}</p>
                                                <p>Nom :{{ $user->lastname }} </p>
                                                <p>Prénom :{{ $user->firstname }}</p>
                                                <p>Promoter : {{ $promoter->lastname }}</p>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        </div>
        <div class="card">
            <div class="card-body">
                {!! QrCode::size(150)->generate('KOMBATE Damelan') !!}
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


</body>

</html>
