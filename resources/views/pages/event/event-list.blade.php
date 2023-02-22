@extends('pages.layout.base')
@section('title', 'Events')
@section('header')
    @section('bgColor', 'bg-dark')
    @include('pages.layout.header')
@endsection

<style>
    .card {
        margin: 5% 0%;
    }

    .card-body {
        margin: 0% 0% 0% 3%;
        padding: 6% 0%;
    }
    .description {
    max-height: 4.5em;
    line-height: 1.5em;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}

.card img{
    height: 270px;
    object-fit: cover;
    object-position: center;
}
.card-title:hover{
    color: rgb(9, 85, 125);
}

.event-bagde{
    position: absolute;
    width: fit-content!important;
    left: -10px;
}
</style>

@section('main')
    <section style="min-height: 60vh">
        <section class="schedule-area pb-100" id="schedule">
            <div class="container" style="margin-top: 100px">
                <div class="row d-flex justify-content-center">
                    <div>
                        <div class="title text-center">
                            <h1 class="mb-10">Consultez notre liste d'événements</h1>
                            <p>Vous pouvez utiliser les champs de recherche pour filtrer votre demande.</p>
                            <p>
                            <div class="input-group mb-3 px-3">
                                <input type="text" class="form-control" placeholder="Rechercher ......"
                                    aria-label="Nom de l'evenement">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                            </div>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="container">


                    <div class="card-deck row">

                        @foreach ($events as $event)
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="card h-100">
                                {{-- <span class="badge badge-success event-badge">Dans 3 jours</span> --}}
                                <div class="view ">
                                    <a href="{{route("events.show",$event)}}">
                                        <img class="card-img-top" src="{{$event->cover}}"
                                        alt="Card image cap">
                                    </a>
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>


                                <div class="card-body">


                                    <a href="{{route("events.show",$event)}}">
                                        <h4 class="card-title">{{$event->title}}</h4>
                                    </a>

                                    <p class="card-text description">{{$event->description}}</p>

                                    <button type="button" class="btn btn-light-blue btn-md">Reserver</button>

                                </div>

                            </div>

                        </div>
                        @endforeach


                    </div>


                </div>
            </div>
        </section>
    </section>
@endsection


@section('footer')
    @include('pages.layout.footer')
@endsection
