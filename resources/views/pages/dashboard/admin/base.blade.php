<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="KOMBATE Damelan">

    <title>R-Event ◊ Super Panel</title>
    <link href="{{ asset('assets/super/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/super/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/super/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/super/alert/toastr.min.css') }}">

    <style>
        * {
            font-size: small;
        }

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

        .sidebar {
            margin-top: 1rem;
            background-color: #ddd;
            position: fixed;
            top: 0;
            left: -200px;
            height: 100%;
            width: 200px;
            transition: all 0.3s;
            z-index: 98;
        }

        .sidebar.open {
            left: 0;
        }

        nav {
            z-index: 99;
        }

        @media screen and (max-width: 600px) {
            .sidebar {
                margin-top: 0;
                position: fixed;
                top: 60px;
                left: -200px;
                height: calc(100% - 60px);
                width: 200px;
                transition: all 0.3s;
                z-index: 1;
            }

            .sidebar-header {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 60px;
            }

            .sidebar-header h2 {
                margin: 0;
                font-size: 1.2rem;
            }

            .sidebar-links {
                display: none;
                padding-top: 20px;
            }

            .sidebar.open .sidebar-links {
                display: block;
            }

            .sidebar.open {
                left: 0;
            }
        }

        .sidebar-header {
            padding: 10px;
            text-align: center;
        }

        .sidebar-header h2 {
            margin: 0;
        }

        .sidebar-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-links li {
            margin-bottom: 10px;
        }

        .sidebar-links a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }

        .sidebar-links a:hover,
        .sidebar-links a.active {
            background-color: #ccc;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">
        <div class="sidebar">
            <div class="sidebar-header">
                <h4>R-Events</h4>
            </div>
            <ul class="sidebar-links">
                <li><a class="{{ Request::routeIs('admin.index') ? 'active' : '' }}"
                        href="{{ route('admin.index') }}">Dashboard</a></li>
                <li><a class="{{ Request::routeIs('admin.users.*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">Users</a></li>
                <li><a class="{{ Request::routeIs('admin.events.*') ? 'active' : '' }}"
                        href="{{ route('admin.events.index') }}">Events</a></li>
                <li><a class="{{ Request::routeIs('admin.categories.*') ? 'active' : '' }}"
                        href="{{ route('admin.events.categories.index') }}">Event Categories</a></li>
            </ul>
        </div>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-flex"
                    style="justify-content: space-between">
                    <div class="header center">
                        <h5 style="display:inline" class="navbar-left">R-Event ◊ Super Panel</h5>
                        <form action="{{ route('logout') }}" id="logoutForm" method="post" style="display:inline">
                            @csrf
                            <a class="navbar-right ml-5 btn btn-danger btn-sm" id="logoutBtn">Se
                                deconnecter</a>
                            <script>
                                let form = document.getElementById("logoutForm");
                                let btn = document.getElementById("logoutBtn");
                                btn.addEventListener("click", function() {
                                    form.submit();
                                })
                            </script>
                        </form>
                    </div>
                    {{-- <i class="fa-solid fa-bars"></i> --}}
                    <button class="text-white btn btn-sm btn-secondary" id="toggle-sidebar">Toggle Sidebar</button>
            </div>
            </nav>
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Statistiques</h1>
                <p class="mb-4">Statistiques complète de l'ensemble des opérations R-Event</p>
            </div>
        </div>
    </div>
    <div class="px-3 py-4">
        @yield('content')
    </div>

    @yield('add-feature')


    <script>
        const toggleSidebar = document.getElementById('toggle-sidebar');
        const sidebar = document.querySelector('.sidebar');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });
    </script>
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
    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}", "Erreur !", {
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
                    "sEmptyTable": "Aucune donnée disponible dans le tableau",
                    "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing": "Traitement...",
                    "sSearch": "Rechercher :",
                    "sZeroRecords": "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sLast": "Dernier",
                        "sNext": "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
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
