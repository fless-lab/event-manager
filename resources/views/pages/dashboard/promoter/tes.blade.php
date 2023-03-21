@extends('pages.dashboard.promoter.base1')
@section('cont')
    <script>
        document.getElementById('reservations').setAttribute('class','nav-link active')
    </script>
    
    <div class="card shadow " style="width: 100%;">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Reservations</h1>
                <div class="card-tools">
                    <form action=" {{ route('promoter.search2') }} " method="get">
                        <div class="input-group input-group-sm" style="width: 150px;">  
                            <input type="text" name="name" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>  
                        </div>
                    </form>
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
                                @if ($event->promoter_id == Auth::user()->id)
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
                                @endif   
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                {{ $reservations->links() }}
            </div>
        </div>
    </div>
@endsection
