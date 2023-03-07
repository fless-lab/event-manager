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
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
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
                                <th>Nom & Prénom </th>
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
                                        @foreach ($tarifs as $tarif)
                                            @if ($tarif->id == $reservation->tarif_id)
                                                @foreach ($users as $user)
                                                    @if ($user->id == $reservation->user_id)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $event->title }}</td>
                                                            <td>{{ $tarif->name }}</td>
                                                            <td>{{ $user->lastname }} {{ $user->firstname }}</td>

                                                            <td>
                                                                <form
                                                                    action="{{ route('promoter.reservation.delete', $reservation->id) }}"
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

    </div>
@endsection
