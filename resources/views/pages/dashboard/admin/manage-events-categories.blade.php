@extends('pages.dashboard.admin.base')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Utilisateurs</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#"
                    data-toggle="modal" data-target="#addUserModal"><i class="fas fa-users fa-sm text-white-50"></i>Ajouter une
                    catégorie</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Date d'enregistrement</th>
                            <th>Mettre à jour</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td><a style="color: green" href="#" data-toggle="modal"
                                        data-target="#updateUserModal{{ $category->id }}">Mettre à
                                        jour</a></td>
                                <td>
                                    <form action="{{ route('admin.events.categories.delete', $category->id) }}"
                                        method="POST" class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-inline text-danger">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade" id="updateUserModal{{ $category->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="updateUserLabel{{ $category->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Mettre à
                                                jour la categorie</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="user" method="POST" id="add_user_form"
                                                action="{{ route('admin.events.categories.update', $category) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="title" name="title"
                                                            placeholder="{{ $category->title }}"
                                                            value="{{ $category->title }}">
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="description" name="description"
                                                            placeholder="{{ $category->description }}"
                                                            value="{{ $category->description }}">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('add-feature')
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle catégorie</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" id="add_user_form"
                        action="{{ route('admin.events.categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="title" name="title"
                                    placeholder="Titre">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="description"
                                    name="description" placeholder="Description">
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
