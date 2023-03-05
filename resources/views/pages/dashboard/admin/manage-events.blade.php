@extends('pages.dashboard.admin.base')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Evenements</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#"
                    data-toggle="modal" data-target="#addEventModal"><i class="fas fa-users fa-sm text-white-50"></i>Ajouter un
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
                            <th>Lieux</th>
                            <th>Categorie</th>
                            <th>Status</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Date d'enregistrement</th>
                            <th>Evaluer</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->place }}</td>
                                <td>{{ $event->category->name }}</td>
                                <td>{{ $event->status }}</td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->end_date }}</td>
                                <td>{{ $event->created_at }}</td>
                                <td><a style="color: blue" href="#" data-toggle="modal"
                                        data-target="#evaluateEventModal{{ $event->id }}">Evaluer</a></td>

                                <td><a style="color: green" href="#" data-toggle="modal"
                                        data-target="#updateEventModal{{ $event->id }}">Mettre à
                                        jour</a></td>
                                <td>
                                    <form action="{{ route('admin.events.delete', $event->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-inline text-danger">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade" id="updateEventModal{{ $event->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="updateEventLabel{{ $event->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Mettre à
                                                jour l'evenement <b>{{ $event->title }} </b>
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="event" method="POST" id="update_event_form"
                                                action="{{ route('admin.events.update', $event) }}"
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
                                                        <select class="form-control" name="category_id" id="category_id">
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
                                                            id="place" name="place" placeholder="Lieux de l'evenement"
                                                            value="{{ $event->place }}">
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="file" class="form-control" id="cover"
                                                            name="cover" placeholder="Photo de couverture de l'evenement"
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

                            <div class="modal fade" id="evaluateEventModal{{ $event->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="updateEventLabel{{ $event->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Evaluer l'evenement
                                                <b>{{ $event->title }} </b>
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="event" method="POST" id="add_event_form"
                                                action="{{ route('admin.events.evaluate', $event) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="form-group row mb-2" style="margin-top: 20px">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select class="form-control" name="status" id="status">
                                                            <option disabled value>Selectionnez une option</option>
                                                            <option value="validated"
                                                                @if ($event->status == 'validated') selected @endif>Valider
                                                            </option>
                                                            <option value="pending"
                                                                @if ($event->status == 'pending') selected @endif>En cours
                                                            </option>
                                                            <option value="rejected"
                                                                @if ($event->status == 'rejected') selected @endif>Rejeter
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer" style="border:none!important;">
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
                        @endforeach
                    </tbody>
                </table>
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
                    <form class="event" method="POST" id="add_event_form" action="{{ route('admin.events.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-2" style="margin-top: 20px">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="title"
                                    name="title" placeholder="Titre">
                            </div>
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
                            <textarea class="form-control form-control-user" name="description" id="description" cols="30" rows="10">
                                </textarea>
                        </div>
                        <div class="form-group row mb-2" style="margin-top: 20px">
                            <div class="col-sm-6">
                                <input type="place" class="form-control form-control-user" id="place"
                                    name="place" placeholder="Lieux de l'evenement">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="file" class="form-control" id="cover" name="cover"
                                    placeholder="Photo de couverture de l'evenement">
                            </div>
                        </div>
                        <hr style="margin-bottom: 0.2rem"><label>Autres informations</label>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="date" class="form-control form-control-user"
                                    placeholder="Date & heure de début de l'evenement" name="start_date" id="start_date">
                                <input type="time" class="form-control form-control-user"
                                    placeholder="Date & heure de début de l'evenement" name="start_time" id="start_time">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="date" class="form-control form-control-user"
                                    placeholder="Date & heure de début de l'evenement" name="end_date" id="end_date">
                                <input type="time" class="form-control form-control-user"
                                    placeholder="Date & heure de début de l'evenement" name="end_time" id="end_time">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control" name="status" id="status">
                                    <option value="validated">Validé</option>
                                    <option value="pending">En attente</option>
                                    <option value="rejected">Rejeté</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control" name="promoter_id" id="promoter_id">
                                    <option disabled value>Selectionnez un promoteur</option>
                                    @foreach ($promoters as $promoter)
                                        <option value="{{ $promoter->id }}">{{ $promoter->lastname }}
                                            {{ $promoter->firstname }}</option>
                                    @endforeach
                                </select>
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
@endsection
