@extends('pages.dashboard.promoter.base')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card shadow ml-3 mr-3">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 text-gray-800">Reservations</h1>
                    <div class="text text-center">
                        <a href="#" class="d-none d-sm-inline-block ml-7 btn btn-sm btn-primary shadow-sm"
                            href="#" data-toggle="modal" data-target="#addTicketModal"><i
                                class="fas fa-users fa-sm text-white-50"></i>Ajouter un type de ticket</a>
                        <a href="#" class="d-none d-sm-inline-block  btn btn-sm btn-primary shadow-sm" href="#"
                            data-toggle="modal" data-target="#addEventModal"><i
                                class="fas fa-users fa-sm text-white-50"></i>Ajouter un ticket</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Evenement</th>
                                <th>Ticket</th>
                                <th>Nom & </th>

                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($reservations as $reservation)
                                @foreach ($events as $event)
                                    @if ($event->id == $reservation->event_id)
                                        @foreach ($tickets as $ticket)
                                            @if ($ticket->id == $reservation->ticket_id)
                                                @foreach ($users as $user)
                                                    @if ($user->id == $reservation->user_id)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $event->title }}</td>
                                                            <td>{{ $ticket->name }}</td>
                                                            <td>{{ $user->lastname }}</td>

                                                            <td>
                                                                <form
                                                                    action="{{ route('promoter.events.delete', $event->id) }}"
                                                                    method="POST" class="inline-block">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="btn btn-inline text-danger">
                                                                        Supprimer
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    @section('add-feature')
        <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau ticket</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="event" method="POST" id="add_event_form"
                            action="{{ route('promoter.ticket.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-2" style="margin-top: 20px">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control" name="type_id" id="type_id">
                                        <option disabled value>Selectionnez un prix</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->price }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="title"
                                        name="name" placeholder="Libelle du ticket">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 20px">
                                <input type="text" class="form-control form-control-user" id="title" name="number"
                                    placeholder="Nombre de ticket par libelle">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-success">Ajouter</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

@section('add')
    <div class="modal fade" id="addTicketModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un type de ticket</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="event" method="POST" id="add_event_form" action="{{ route('promoter.type.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-2" style="margin-top: 20px">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control" name="event_id" id="event_id">
                                    <option disabled value>Selectionnez un evenement</option>
                                    @foreach ($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="title"
                                    name="price" placeholder="Prix">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                            <button class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
@endsection
