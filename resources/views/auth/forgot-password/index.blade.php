@extends('auth.layout.base')
@section('title', 'Forgot Password')
@section('form-content')

    <form action="{{ route('password.request') }}" method="POST">
        @csrf
        <h3>Forgot Password</h3>
        <label for="email">Email</label>
        <input type="text" placeholder="Email adress" name="email" value="{{ old('email') }}" id="email" required
            class="@error('email') is-invalid @enderror">
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
@endsection
