@extends('pages.dashboard.promoter.base1')
@section('cont')
<script>
    document.getElementById('event').setAttribute('class','nav-link active')
</script>
        <!-- /.content-header -->
        <div class="card shadow ml-3 mr-3" style="width : 100%">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 text-gray-800">Evenements</h1>

                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#"
                        data-toggle="modal" data-target="#addEventModal"><i
                            class="fas fa-users fa-sm text-white-50"></i>Ajouter un
                        évenement</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Titre</th>
                                <th>Descrition</th>
                                <th>Lieux </th>
                                <th>Categorie</th>
                                <th>Status</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Tarifs</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($events as $event)
                                @if ($event->promoter_id == Auth::user()->id)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->place }}</td>
                                        <td>{{ $event->category->name }}</td>
                                        <td>{{ $event->status }}</td>
                                        <td>{{ date('d/m/Y H:i', $event->start_date) }}</td>
                                        <td>{{ date('d/m/Y H:i', $event->end_date) }}</td>
                                        <td><a style="color: blue" href="#" data-toggle="modal"
                                                data-target="#updateTarifModal{{ $event->id }}">Tarifs</a>
                                        </td>
                                        <td><a style="color: green" href="#" data-toggle="modal"
                                                data-target="#updateEventModal{{ $event->id }}">Mettre à
                                                jour</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('promoter.events.delete', $event->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-inline text-danger">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                <div class="modal fade" id="updateEventModal{{ $event->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="updateEventLabel{{ $event->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mettre à
                                                    jour l'evenement <b>{{ $event->title }}</b>
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="event" method="POST" id="update_event_form"
                                                    action="{{ route('promoter.events.update', $event) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group row mb-2" style="margin-top: 20px">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user"
                                                                id="title" name="title" placeholder="Titre"
                                                                value="{{ $event->title }}">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <select class="form-control" name="category_id"
                                                                id="category_id">
                                                                <option disabled value>Selectionnez une categorie</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        @if ($category->id == $event->category_id) selected @endif>
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 20px">
                                                        <textarea class="form-control form-control-user" name="description" id="description" cols="30" rows="10">{{ $event->description }}</textarea>
                                                    </div>
                                                    <div class="form-group row mb-2" style="margin-top: 20px">
                                                        <div class="col-sm-6">
                                                            <input type="place" class="form-control form-control-user"
                                                                id="place" name="place"
                                                                placeholder="Lieux de l'evenement"
                                                                value="{{ $event->place }}">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="file" class="form-control" id="cover"
                                                                name="cover"
                                                                placeholder="Photo de couverture de l'evenement"
                                                                value="{{ $event->cover }}">
                                                        </div>
                                                    </div>

                                                    <hr style="margin-bottom: 0.2rem"><label>Autres informations</label>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="date" class="form-control form-control-user"
                                                                placeholder="Date & heure de début de l'evenement"
                                                                name="start_date" id="start_date"
                                                                value="{{ date('d/m/Y', $event->start_date) }}">
                                                            <input type="time" class="form-control form-control-user"
                                                                placeholder="Date & heure de début de l'evenement"
                                                                name="start_time" id="start_time"
                                                                value="{{ date('h:i', $event->start_date) }}">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="date" class="form-control form-control-user"
                                                                placeholder="Date & heure de début de l'evenement"
                                                                name="end_date" id="end_date"
                                                                value="{{ date('d/m/Y', $event->end_date) }}">
                                                            <input type="time" class="form-control form-control-user"
                                                                placeholder="Date & heure de début de l'evenement"
                                                                name="end_time" id="end_time"
                                                                value="{{ date('h:i', $event->end_date) }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" href="#!" type="button"
                                                            data-dismiss="modal">Annuler</a>
                                                        <button class="btn btn-success" type="submit">Mettre à
                                                            jour</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="updateTarifModal{{ $event->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="updateEventLabel{{ $event->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajout d'un Ticket
                                                    <b>{{ $event->title }}</b>
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="event" method="POST" id="update_event_form"
                                                    action="{{ route('promoter.tarif.store') }}">
                                                    @csrf

                                                    <div class="form-group row mb-2" style="margin-top: 20px">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user"
                                                                id="name" name="name"
                                                                placeholder="Libelle du ticket" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2" style="margin-top: 20px">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user"
                                                                id="price" name="price"
                                                                placeholder="Prix du ticket" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2" style="margin-top: 20px">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user"
                                                                id="num" name="num" placeholder="Quantité"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2" style="margin-top: 20px">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="date" class="form-control form-control-user"
                                                                id="start_date" name="start_date" placeholder=""
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2" style="margin-top: 20px">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="date" class="form-control form-control-user"
                                                                id="end_date" name="end_date" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" href="#!" type="button"
                                                            data-dismiss="modal">Annuler</a>
                                                        <button class="btn btn-success" type="submit">Ajouter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    @endsection

    @section('add-feature')
        <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel évenement</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="event" method="POST" id="add_event_form"
                            action="{{ route('promoter.events.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-2" style="margin-top: 20px">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="title"
                                        name="title" placeholder="Titre" required>
                                </div>
                                <input type="hidden" name="promoter_id" value="{{ Auth::user()->id }}">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control" name="category_id" id="category_id">
                                        option disabled value>Selectionnez une categorie</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 20px">
                                <textarea class="form-control form-control-user" name="description" id="description" cols="30" rows="10"
                                    required>
                                </textarea>
                            </div>
                            <div class="form-group row mb-2" style="margin-top: 20px">
                                <div class="col-sm-6">
                                    <input type="place" class="form-control form-control-user" id="place"
                                        name="place" placeholder="Lieux de l'evenement" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="file" class="form-control" id="cover" name="cover"
                                        placeholder="Photo de couverture de l'evenement" required>
                                </div>

                            </div>
                            <hr style="margin-bottom: 0.2rem"><label>Autres informations</label>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-user"
                                        placeholder="Date & heure de début de l'evenement" name="start_date"
                                        id="start_date" required>
                                    <input type="time" class="form-control form-control-user"
                                        placeholder="Date & heure de début de l'evenement" name="start_time"
                                        id="start_time" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-user"
                                        placeholder="Date & heure de début de l'evenement" name="end_date" id="end_date"
                                        required>
                                    <input type="time" class="form-control form-control-user"
                                        placeholder="Date & heure de début de l'evenement" name="end_time" id="end_time"
                                        required>
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