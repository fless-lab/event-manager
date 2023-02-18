@extends("layouts.dashboard")

@section("contenu")
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Responsive Table</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Organisateur</th>
                                <th>Type</th>
                                <th>Lieu</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th width="320px" class="text text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                               <td> {{ ++$i}} </tq>
                                <td> {{ $event->titre }} </td>
                                <td> {{ $event->organisateur }} </td>
                                <td> {{ $event->type }} </td>
                                <td> {{ $event->lieu }} </td>
                                <td> {{ $event->date_deb }} </td>
                                <td> {{ $event->date_fin }} </td>
                                <td>
                                    <from action="" method="POST">
                                        @method('post')
                                        @csrf
                                        <a class="btn btn-info" href="{{ route('details', $event->id) }}">Details</a>
                                        <a class="btn btn-primary" href="#">Mise à jour</a>
                                        <a class="btn btn-danger" href="#">Supprimer</a>

                                    </from>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection