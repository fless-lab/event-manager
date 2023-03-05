<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/fav.png">
    <meta name="author" content="KOMBATE Damelan">
    <meta name="description" content="Event management webapp">
    <meta name="keywords" content="events">
    <meta charset="UTF-8">
    <title>Event Manager - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/users/gen/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/gen/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/gen/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/gen/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/gen/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/gen/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/gen/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/gen/css/main.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/users/auth/css/toastinette.min.css') }}">
    <style>
        #preloader {
            background: #000 url("{{ asset('assets/users/gen/img/loader.gif') }}") no-repeat center center;
            background-size: 15%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 1000;
        }
    </style>
</head>

<body>
    @yield('preloader')
    @yield('header')

    @yield('main')
    @yield('add-feature')

    @yield('footer')

    <script src="{{ asset('assets/users/gen/js/jquery-2.2.4.min.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/users/gen/js/bootstrap.min.js') }} "></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="{{ asset('assets/users/gen/js/easing.min.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/hoverIntent.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/superfish.min.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/jquery.ajaxchimp.min.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/jquery.magnific-popup.min.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/owl.carousel.min.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/jquery.sticky.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/jquery.nice-select.min.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/parallax.min.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/mail-script.js') }} "></script>
    <script src="{{ asset('assets/users/gen/js/main.js') }} "></script>
    <script src="{{ asset('assets/users/auth/js/toastinette.js') }}"></script>
    @yield('script');
    <script>
        @if (session('status'))
            Toastinette.init({
                position: 'top-center',
                title: 'Status',
                message: "{{ session('status') }}",
                type: 'success',
                progress: true,
                autoClose: 5000
            });
        @endif

        @if (session('registration'))
            Toastinette.init({
                position: 'top-center',
                title: 'Active your account',
                message: "{{ session('registration') }}",
                type: 'warning',
                progress: true,
                autoClose: 10000
            });
        @endif

        @if (session('success'))
            Toastinette.init({
                position: 'top-center',
                title: 'Success',
                message: "{{ session('success') }}",
                type: 'success',
                progress: true,
                autoClose: 5000
            });
        @endif

        @if (session('error'))
            Toastinette.init({
                position: 'top-center',
                title: 'Error',
                message: "{{ session('error') }}",
                type: 'error',
                progress: true,
                autoClose: 5000
            });
        @endif

        @if (session('info'))
            Toastinette.init({
                position: 'top-center',
                title: 'Info',
                message: "{{ session('info') }}",
                type: 'info',
                progress: true,
                autoClose: 5000
            });
        @endif

        @if (session('warning'))
            Toastinette.init({
                position: 'top-center',
                title: 'Warning',
                message: "{{ session('warning') }}",
                type: 'warning',
                progress: true,
                autoClose: 5000
            });
        @endif
    </script>

    <script>
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function() {
            loader.style.display = "none";
        });
    </script>
</body>

</html>
