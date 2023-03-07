<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event Manager</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/promoters/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="{{ route('index') }}" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('index') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <p class="brand-link text-center">
                <span class="brand-text font-weight-light">R-Event</span>
            </p>
            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview ">
                            <a href="{{ route('promoter.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('promoter.events.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Events
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('promoter.types.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Reservations
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div>
            @yield('content')
        </div>
        @yield('add-feature')
        @yield('add')
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/dashboard/promoters/js/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/dashboard/promoters/js/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/dashboard/promoters/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/dashboard/promoters/js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/dashboard/promoters/js/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/dashboard/promoters/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/promoters/js/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/dashboard/promoters/js/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/dashboard/promoters/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/promoters/js/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/dashboard/promoters/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/dashboard/promoters/js/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/dashboard/promoters/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dashboard/promoters/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/dashboard/promoters/js/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dashboard/promoters/js/demo.js') }}}"></script>
    <script>
        $(function() {
            var url = window.location;
            // for single sidebar menu
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');

            // for sidebar menu and treeview
            $('ul.nav-treeview a').filter(function() {
                    return this.href == url;
                }).parentsUntil(".nav-sidebar > .nav-treeview")
                .css({
                    'display': 'block'
                })
                .addClass('menu-open').prev('a')
                .addClass('active');
        });
    </script>

</body>

</html>
