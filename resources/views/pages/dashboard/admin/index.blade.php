<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Abdou-Raouf ATARMLA">

    <title>R-Event ◊ Dashboard</title>
    <link href="{{ asset("assets/super/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/super/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/super/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/super/alert/toastr.min.css') }}">

    <style>
        label.invalid {
            color: red;
            font-size: 13px;
        }

        input.invalid {
            border: 1px solid red;
        }

        input.success {
            border: 1px solid green;
        }

    </style>

</head>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="header center">
                        <span class="navbar-left">RapidBus ◊ Super Panel</span>
                        <a href="{{ route('logout') }}" class="navbar-right ml-5 btn btn-danger btn-sm">Se
                            deconnecter</a>
                    </div>
            </div>
            </nav>
            <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">COMPAGNIES</h1>
                <p class="mb-4">Liste complète des compagnies qui sont enregistrées dans notre base et qui
                    utilisent le service.</p>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Compagnies</h1>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#"
                                data-toggle="modal" data-target="#addCompagnieModal"><i
                                    class="fas fa-users fa-sm text-white-50"></i>Ajouter une compagnie</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Numéro</th>
                                        <th>Date d'enregistrement</th>
                                        <th>Administrateur</th>
                                        <th>Nom d'utilisateur</th>
                                        <th>Mot de passe</th>
                                        <th>Mettre à jour</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compagnies as $compagnie)
                                        <tr>
                                            <td>{{ $compagnie->nom }}</td>
                                            <td>{{ $compagnie->email }}</td>
                                            <td>+228 {{ $compagnie->phone }}</td>
                                            <td>{{ $compagnie->created_at }}</td>
                                            @foreach ($admins as $admin)
                                                @if ($compagnie->id==$admin->compagnie_id)
                                                <td>{{ $admin->nom }} {{ $admin->prenom }}</td>
                                                <td>{{ $admin->username }}</td>
                                                @endif
                                            @endforeach
                                            <td>********</td>
                                            <td><a style="color: green" href="#" data-toggle="modal"
                                                    data-target="#updateCompagnieModal{{ $compagnie->id }}">Mettre à
                                                    jour</a></td>
                                            <td>
                                                <form
                                                    action="{{ route('compagnie.delete', $compagnie->mime) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="btn btn-inline text-danger">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="updateCompagnieModal{{ $compagnie->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="updateCompagnieLabel{{ $compagnie->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Mettre à
                                                            jour la compagnie <b>{{ $compagnie->nom }}</b></h5>
                                                        <button class="close" type="button"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="user" id="update_compagnie_form"
                                                            action="{{ route('compagnie.update', $compagnie->mime) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method("PUT")
                                                            <div class="form-group row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <input type="text" class="form-control form-control-user" id="nom" name="nom"
                                                                    placeholder="Nom de la compagnie" value="{{ $compagnie->nom }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                                                    placeholder="Adresse mail" value="{{ $compagnie->email }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <input type="text" class="form-control form-control-user" id="phone" name="phone"
                                                                    placeholder="Numéro de téléphone" value="+228 {{ $compagnie->phone }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control form-control-user" id="siege" name="siege"
                                                                    placeholder="Siège de la compagnie" value="{{ $compagnie->siege }}">
                                                                </div>
                                                            </div>
                                                            <hr style="margin-bottom: 0.2rem"><label>Information sur l'administrateur de la compagnie</label>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <input type="text" class="form-control form-control-user" id="nom_admin"
                                                                        name="nom_admin" value="{{ $admin->nom }}" placeholder="Nom de l'admin">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control form-control-user" id="prenom_admin"
                                                                        name="prenom_admin"value="{{ $admin->prenom }}" placeholder="Prenom de l'admin">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <input type="text" class="form-control form-control-user" id="username"
                                                                        name="username" value="{{ $admin->username }}" placeholder="Nom d'utilisateur" >
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="password" class="form-control form-control-user" id="password"
                                                                        name="password" placeholder="Nouveau mot de passe">
                                                                </div>
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

            </div>
        </div>
    </div>

    </div>

    <div class="modal fade" id="addCompagnieModal" tabindex="-1" role="dialog" aria-labelledby="addCompagnieLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle compagnie</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" id="add_compagnie_form"
                        action="{{ route("compagnie.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="nom" name="nom"
                                placeholder="Nom de la compagnie">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control form-control-user" id="email" name="email"
                                placeholder="Adresse mail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="phone" name="phone"
                                placeholder="Numéro de téléphone">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="siege" name="siege"
                                placeholder="Siège de la compagnie">
                            </div>
                        </div>
                        <hr style="margin-bottom: 0.2rem"><label>Information sur l'administrateur de la compagnie</label>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="nom_admin"
                                    name="nom_admin" placeholder="Nom de l'administrateur">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="prenom_admin"
                                    name="prenom_admin" placeholder="Prenom de l'administrateur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="username"
                                    name="username" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password"
                                    name="password" placeholder="Mot de passe">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="logo">Logo de la compagnie</label>
                            <input type="file" name="logo" accept="image/*" id="logo">
                        </div> --}}
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                            <button class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('assets/super/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/super/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/super/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/super/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/super/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/super/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/super/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('assets/super/alert/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/super/alert/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/super/alert/sweetalert.min.js') }}"></script>


    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}", "Félicitation !", {
                timeOut: 5000
            });
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}", "Erreur !", {
                    timeOut: 5000
                });
            </script>
        @endforeach
        </h6>
    @endif
    <script>
         var table = $('#dataTable')
                .DataTable({
                    "language": {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            },
                });



        window.baseUrl = "{{ URL::to('/') }}";

        var addCompagnieValidator = $("#add_compagnie_form").validate({
            errorClass: "invalid",
            validClass: "success",
            rules: {
                nom: {
                    required: true,
                    minlength: 2,
                },
                email: {
                    required: true,
                    email: true
                },
                siege: {
                    required: true,
                    minlength: 2,
                },
                phone: {
                    required: true,
                },
                nom_admin: {
                    required: true,
                    minlength: 2,
                },
                prenom_admin: {
                    required: true,
                    minlength: 2,
                },
                username: {
                    required: true,
                    minlength: 2,
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                nom: {
                    required: "Veuillez renseigner le nom de la compagnie.",
                    minlength: "Le nom est trop court."
                },
                siege: {
                    required: "Veuillez renseigner le siège de la compagnie.",
                    minlength: "Nom de lieux trop court."
                },
                phone: {
                    required: "Veuillez renseigner le nom de la compagnie.",
                },
                email: {
                    required: "Veuillez renseigner l'adresse mail de la compagnie.",
                    email: "Veuillez entrer une adresse mail valide."
                },
                password: {
                    required: "Veuillez renseigner le mot de passe.",
                    minlength: "Mot de passe trop court.",
                },
                nom_admin: {
                    required: "Veuillez renseigner le nom de l'admin'.",
                    minlength: "Le nom est trop court."
                },
                prenom_admin: {
                    required: "Veuillez renseigner le nom de l'admin'.",
                    minlength: "Le nom est trop court."
                },
                username: {
                    required: "Veuillez renseigner le nom d'utilisateur'.",
                    minlength: "Le nom est trop court."
                },
            },
        });
    </script>

</body>

</html>
