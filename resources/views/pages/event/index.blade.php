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

    button {
        outline: none;
        border: none;
    }

    button a {
        color: #fff;
        text-decoration: none;
        border: none;
    }

    button a:hover {
        color: #fff;
        border: none;
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

                    <button class="btn btn-success btn-lg text-white my-5"><a href="#" data-toggle="modal"
                            class="btn btn-light-blue btn-md" data-target="#updateUserModal{{ $event->id }}">Reserver une
                            place</a></button>
                </div>
                <div class="modal fade" id="updateUserModal{{ $event->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="updateUserLabel{{ $event->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Reserver un ticket pour
                                    <b>{{ $event->title }}
                                    </b>
                                </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" id="update_user_form" action="{{ route('events') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="hidden" class="form-control form-control-user" id="event_id"
                                                name="event_id" placeholder="#" value="{{ $event->id }}">
                                        </div>
                                        @if (Auth::user())
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="hidden" class="form-control form-control-user" id="user_id"
                                                    name="user_id" placeholder="#" value="{{ Auth::user()->id }}">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <select class="form-control" name="tarif_id" id="tarif_id" required>
                                            <option disabled value>Selectionnez un ticket</option>
                                            @foreach ($tarifs as $tarif)
                                                @if ($event->id == $tarif->event_id)
                                                    <option value="{{ $tarif->id }}"
                                                        @if ($event->id == $tarif->event_id) selected @endif>
                                                        {{ $tarif->name }}
                                                        {{ $tarif->price }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-secondary" href="#!" type="button" data-dismiss="modal">Annuler</a>
                                <button class="btn btn-success" type="submit">Reserver</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center section-top-border">
        <h1 class="text-center" style="text-decoration: underline">Events details here</h1>
        <p>Promoted by : <b
                style="color:green">{{ $event->promoter->lastname }}&nbsp;{{ $event->promoter->firstname }}</b>
        </p>
        <br><br>
        <p style="text-align: start" class="container">
            {{ $event->description }} {{ date('d/m/Y H:i', $event->start_date) }}
            {{ date('d/m/Y H:i', $event->end_date) }}
        </p>
    </div>
@endsection




@section('footer')
    @include('pages.layout.footer')
@endsection
