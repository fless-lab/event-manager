<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/fav.png">
    <meta name="author" content="Abdou-Raouf ATARMLA">
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
</head>

<body>

    @yield('header')

    @yield('main')

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
</body>

</html>
