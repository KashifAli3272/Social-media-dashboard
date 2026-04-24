@extends('auth')

@section('title', 'Login')

@section('content')

<h4 class="text-center fw-bold mb-4">Login</h4>

<!-- Session Alerts -->
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email -->
    <div class="mb-3">
        <input type="email" 
               name="email" 
               class="form-control @error('email') is-invalid @enderror" 
               placeholder="Email Address" 
               value="{{ old('email') }}" 
               required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-3">
        <input type="password" 
               name="password" 
               class="form-control @error('password') is-invalid @enderror" 
               placeholder="Password" 
               required>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Remember Me -->
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Remember Me</label>
    </div>

    <!-- Submit Button -->
    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary fw-bold">Login</button>
    </div>

    <!-- Forgot Password -->
    <div class="text-center mb-2">
        <a href="{{ route('password.request') }}" class="small">Forgot Password?</a>
    </div>

    <hr>

    <!-- Create Account -->
    <div class="text-center">
        <span class="small">Don't have an account?</span>
        <a href="{{ route('register') }}" class="fw-semibold">Create Account</a>
    </div>

</form>

@endsection
