<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Manager : Forgot Password</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/users/auth/css/styles.css') }}">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="{{ route('password.request') }}" method="POST">
        @csrf
        <h3>Forgot Password</h3>
        @if (session('status'))
            <h4 style="color: green">{{ session('status') }}</h4>
        @endif
        <label for="email">Email</label>
        <input type="text" placeholder="Email adress" name="email" value="{{ old('email') }}" id="email"
            required class="@error('email') is-invalid @enderror">
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror

        <button>Recover Password</button>
        <div style="text-align: center;padding-top:5px;">
            <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Sign Up</a>
        </div>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </form>
</body>

</html>
