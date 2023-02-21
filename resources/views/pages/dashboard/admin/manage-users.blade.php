@extends('pages.dashboard.admin.base')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Utilisateurs</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#"
                    data-toggle="modal" data-target="#addUserModal"><i
                        class="fas fa-users fa-sm text-white-50"></i>Ajouter un utilisateur</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Numéro</th>
                            <th>Type d'utilisateur</th>
                            <th>Nom d'utilisateur</th>
                            <th>Mot de passe</th>
                            <th>Date d'enregistrement</th>
                            <th>Mettre à jour</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>********</td>
                                <td>{{ $user->created_at }}</td>
                                <td><a style="color: green" href="#" data-toggle="modal"
                                        data-target="#updateUserModal{{ $user->id }}">Mettre à
                                        jour</a></td>
                                <td>
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-inline text-danger">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade" id="updateUserModal{{ $user->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="updateUserLabel{{ $user->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Mettre à
                                                jour l'utilisateur <b>{{ $user->lastname }} {{ $user->firstname }}</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="user" id="update_user_form"
                                                action="{{ route('admin.users.update', $user) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="lastname" name="lastname" placeholder="Nom"
                                                            value="{{ $user->lastname }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-user"
                                                            id="firstname" name="firstname" placeholder="Prénom"
                                                            value="{{ $user->firstname }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="email" class="form-control form-control-user"
                                                            id="email" name="email" placeholder="Adresse mail"
                                                            value="{{ $user->email }}">
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="phone" name="phone" placeholder="Numéro de téléphone"
                                                            value="{{ $user->phone }}">
                                                    </div>
                                                </div>
                                                <hr style="margin-bottom: 0.2rem"><label>Information de connexion</label>

                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="username" name="username" value="{{ $user->username }}"
                                                            placeholder="Nom d'utilisateur">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="password" class="form-control form-control-user"
                                                            id="password" name="password"
                                                            placeholder="Nouveau mot de passe">
                                                    </div>
                                                </div>
                                                <div class="form-group row container" style="position: relative">
                                                    <input type="checkbox" name="promoter" @if ($user->role->name=="Promoter") checked=true @endif id="promoter" style="position:absolute;top:5px">
                                                    <label for="promoter" class="px-4"> Cet utilisateur est un promoteur.</label>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel utilisateur</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" id="add_user_form" action="{{ route('admin.users.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="lastname"
                                    name="lastname" placeholder="Nom">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="firstname"
                                    name="firstname" placeholder="Prénom(s)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="email" class="form-control form-control-user" id="email"
                                    name="email" placeholder="Adresse mail">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="phone"
                                    name="phone" placeholder="Numéro de téléphone">
                            </div>
                        </div>
                        <hr style="margin-bottom: 0.2rem"><label>Information de connextion</label>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="username"
                                    name="username" placeholder="Nom d'utilisateur (optionnel)">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password"
                                    name="password" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="form-group row container" style="position: relative">
                            <input type="checkbox" name="promoter" id="promoter" style="position:absolute;top:5px">
                            <label for="promoter" class="px-4"> Cet utilisateur est un promoteur.</label>
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
