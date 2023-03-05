@extends('pages.layout.base')
@section('title', 'Events')
@section('header')
@section('bgColor', 'bg-dark')
@include('pages.layout.header')
@endsection

<style>
.card {
    margin: 6% 0%;
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

.card img {
    height: 270px;
    object-fit: cover;
    object-position: center;
}

.card-title:hover {
    color: rgb(9, 85, 125);
}

.btn {
    background: gray;
    color: black
}

.event-bagde {
    position: absolute;
    width: fit-content !important;
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
                        <h1 class="mb-12">Consultez notre liste d'événements</h1>
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
                                    <a href="{{ route('events.show', $event) }}">
                                        <img class="card-img-top" src="{{ $event->cover }}" alt="Card image cap">
                                    </a>
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>


                                <div class="card-body">


                                    <a href="{{ route('events.show', $event) }}">
                                        <h4 class="card-title">{{ $event->title }}</h4>
                                    </a>

                                    <p class="card-text description">{{ $event->description }}</p>

                                    <a href="#" data-toggle="modal" class="btn btn-light-blue btn-md"
                                        data-target="#updateUserModal{{ $event->id }}">Reserver</a>

                                </div>
                                <div class="modal fade" id="updateUserModal{{ $event->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="updateUserLabel{{ $event->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reserver un ticket pour
                                                    <b>{{ $event->title }}
                                                    </b>
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="user" id="update_user_form" action="#"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="hidden" class="form-control form-control-user"
                                                                id="event_id" name="event_id" placeholder="#"
                                                                value="{{ $event->id }}">
                                                        </div>
                                                        @if (Auth::user())
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="hidden"
                                                                    class="form-control form-control-user"
                                                                    id="user_id" name="user_id" placeholder="#"
                                                                    value="{{ Auth::user()->id }}">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="ticket_id" id="ticket_id">
                                                            <option disabled value>Selectionnez un ticket</option>

                                                            @foreach ($types as $type)
                                                                @if ($event->id == $type->event_id)
                                                                    @foreach ($tickets as $ticket)
                                                                        @if ($type->id == $ticket->type_id)
                                                                            <option value="{{ $ticket->id }}"
                                                                                @if ($type->id == $ticket->type_id) selected @endif>
                                                                                {{ $ticket->name }}
                                                                                {{ $type->price }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach

                                                        </select>
                                                    </div>



                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-secondary" href="#!" type="button"
                                                    data-dismiss="modal">Annuler</a>
                                                <button class="btn btn-success" type="submit">Reserver</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
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
