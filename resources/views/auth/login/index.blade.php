@extends('auth.layout.base')
@section('title', 'Login')
@section('form-content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Username" id="username" name="username" value="{{ old('username') }}"
            required class="@error('username') is-invalid @enderror">
        @error('username')
            <span class="error-message">{{ $message }}</span>
        @enderror
        <label for="password">Password</label>
        <input type="password" placeholder="Password" class="@error('username') is-invalid @enderror" id="password"
            name="password">
        <small style="float:right"><a href="{{ url('forgot-password') }}">Forgotten password ?</a></small>
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror
        <button>Log In</button>
        <div style="text-align: center;padding-top:5px;">
            Or <a href="{{ route('register') }}">Sign Up</a>
        </div>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </form>
@endsection
