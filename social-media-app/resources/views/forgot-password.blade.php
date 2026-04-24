@extends('auth')

@section('title', 'Forgot Password')

@section('content')

<h4 class="text-center fw-bold mb-4">Forgot Password</h4>

@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
    </div>

    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary fw-bold">
            Send Reset Link
        </button>
    </div>

    <div class="text-center">
        <a href="{{ route('login') }}" class="small">Back to Login</a>
    </div>

</form>

@endsection
