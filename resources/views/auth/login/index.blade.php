<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Manager : Login</title>
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
    <form>
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Username" id="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password">
        <small style="float:right"><a href="">Forgotten password ?</a></small>

        <button>Log In</button>
        <div style="text-align: center;padding-top:5px;">
            Or <a href="{{ route('register') }}">Sign Up</a>
        </div>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </form>
</body>

</html>
