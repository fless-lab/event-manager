@extends('auth.layout.base')
@section('title', 'Reset Password')
@section('form-content')
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <h3>Reset Password</h3>
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email">Email</label>
        <input type="text" placeholder="Email adress" name="email" value="{{ $request->email }}" readonly id="email"
            required class="@error('email') is-invalid @enderror">
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
@endsection
