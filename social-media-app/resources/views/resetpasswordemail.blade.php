@extends('auth')

@section('title', 'Reset Password')

@section('content')

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h4 class="text-center fw-bold mb-4">Reset Password</h4>

        <!-- Alerts -->
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            
        

            <div class="mb-3">
                <input type="email" 
                       name="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       placeholder="Enter your email" 
                       value="{{ old('email') }}" 
                       required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary fw-bold">Verify Email</button>
            </div>

            <div class="text-center">
                <a href="{{ route('login') }}" class="small">Back to Login</a>
            </div>
        </form>
    </div>
</div>

@endsection
