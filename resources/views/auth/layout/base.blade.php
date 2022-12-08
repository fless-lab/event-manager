<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Manager : @yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/users/auth/css/toastinette.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/auth/css/styles.css') }}">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    @yield('form-content')
    <script src="{{ asset('assets/users/auth/js/toastinette.js') }}"></script>
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
</body>

</html>
