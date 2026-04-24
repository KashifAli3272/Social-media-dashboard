@extends('auth')

@section('title', 'Set New Password')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-5" style="max-width: 420px; width: 100%;">
        <h3 class="text-center fw-bold mb-4">Set a New Password</h3>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Error Alert --}}
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Reset Password Form --}}
        <form action="{{ route('password.update') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $email }}" readonly>
            </div>

            {{-- New Password --}}
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">New Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter new password" required>
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                        Show
                    </button>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-text">Minimum 8 characters.</div>
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                <div class="input-group">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-enter new password" required>
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">
                        Show
                    </button>
                </div>
            </div>

            {{-- Submit --}}
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary fw-semibold py-2">Reset Password</button>
            </div>

            {{-- Back to Login --}}
            <div class="text-center">
                <a href="{{ route('login') }}" class="small text-decoration-none">← Back to Login</a>
            </div>
        </form>
    </div>
</div>

{{-- Password Toggle Script --}}
<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        if (field.type === "password") {
            field.type = "text";
        } else {
            field.type = "password";
        }
    }
</script>
@endsection



