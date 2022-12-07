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
    <form class="register-form">
        <h3>SignUp Here</h3>


        <label for="firstname">Firstname</label>
        <input type="text" placeholder="Your firstname" id="firstname">

        <label for="lastname">Lastname</label>
        <input type="text" placeholder="Your lastname" id="lastname">

        <label for="email">Email</label>
        <input type="text" placeholder="Email adress" id="email">

        <label for="phone">Phone</label>
        <input type="tel" placeholder="Phone (Prefix with country code)" id="phone">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password">

        <label for="passwordConfirm">Confirm Password</label>
        <input type="password" placeholder="Confirm your password" id="passwordConfirm">

        <label style="display: inline-flex;position: relative;cursor: pointer;">
            <input style="height:18px" type="checkbox">
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
