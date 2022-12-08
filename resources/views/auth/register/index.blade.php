<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Manager : Register</title>
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
    <form class="register-form" action="{{ route('register') }}" method="POST">
        @csrf
        <h3>SignUp Here</h3>


        <label for="firstname">Firstname</label>
        <input type="text" placeholder="Your firstname" name="firstname" value="{{ old('firstname') }}"
            id="firstname" class="@error('firstname') is-invalid @enderror">
        @error('firstname')
            <span class="error-message">{{ $message }}</span>
        @enderror

        <label for="lastname">Lastname</label>
        <input type="text" placeholder="Your lastname" name="lastname" value="{{ old('lastname') }}" id="lastname"
            required class="@error('lastname') is-invalid @enderror">
        @error('lastname')
            <span class="error-message">{{ $message }}</span>
        @enderror
        <label for="email">Email</label>
        <input type="text" placeholder="Email adress" name="email" value="{{ old('email') }}" id="email"
            required class="@error('email') is-invalid @enderror">
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
        <label for="phone">Phone</label>
        <input type="tel" placeholder="Phone (Prefix with country code)" name="phone" value="{{ old('phone') }}"
            required id="phone" class="@error('phone') is-invalid @enderror">
        @error('phone')
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

        <label style="display: inline-flex;position: relative;cursor: pointer;" value="{{ old('promoter') }}">
            <input style="height:18px" type="checkbox" name="promoter">
            <small style="white-space: nowrap;position: absolute;top:7px;left:2rem;">I am an event promoter.</small>
        </label>

        <button>Sign Up</button>
        <div style="text-align: center;padding-top:5px;">
            Or <a href="{{ route('login') }}">Login</a>
        </div>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </form>
</body>

</html>
