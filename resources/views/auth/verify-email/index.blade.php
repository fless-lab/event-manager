@extends('auth.layout.base')
@section('title', 'Email Verification')
@section('form-content')
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <h3>Verify Email</h3>
        <small style="text-align:center;">
            <p style="color: rgb(0, 191, 255);">[Verification required] Please check
                your email inbox
                for a verification
                link.</p>
        </small>
        <br>
        <div style="text-align: center;margin-bottom:-20px;">
            <p>or</p>
        </div>
        <button>Resend new verification link</button>
    </form>
@endsection
