<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Manager : Reset Password</title>
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
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <h3>Reset Password</h3>
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email">Email</label>
        <input type="text" placeholder="Email adress" name="email" value="{{ $request->email }}" readonly
            id="email" required class="@error('email') is-invalid @enderror">
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password" required
            class="@error('password') is-invalid @enderror">
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror
        <label for="passwordConfirm">Confirm Password</label>
        <input type="password" placeholder="Confirm your password" name="password_confirmation" id="passwordConfirm"
            required>

        <button>Reset Password</button>
        <div style="text-align: center;padding-top:5px;">
            Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
        </div>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </form>
</body>

</html>
