@extends('auth')

@section('title', 'Create Account')

@section('content')

<h4 class="text-center fw-bold mb-4">Create Account</h4>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>      
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf

    <!-- Full Name -->
    <div class="mb-3">
        <input type="text" 
               name="name" 
               class="form-control @error('name') is-invalid @enderror" 
               placeholder="Full Name"
               value="{{ old('name') }}"
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

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

    <!-- Phone with Country Code -->
    <div class="mb-3">
        <div class="input-group">
            <select name="country_code" class="form-select" style="max-width:120px;" required>
                <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>🇺🇸 +1</option>
                <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>🇬🇧 +44</option>
                <option value="+91" {{ old('country_code') == '+91' ? 'selected' : '' }}>🇮🇳 +91</option>
                <option value="+971" {{ old('country_code') == '+971' ? 'selected' : '' }}>🇦🇪 +971</option>
                <option value="+92" {{ old('country_code') == '+92' ? 'selected' : '' }}>🇵🇰 +92</option>
            </select>

            <input type="text" 
                   name="phone" 
                   class="form-control @error('phone') is-invalid @enderror" 
                   placeholder="Phone Number"
                   value="{{ old('phone') }}"
                   required>
        </div>
        @error('phone')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Profile Image -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Profile Image</label>
        <input type="file" 
               name="image" 
               class="form-control @error('image') is-invalid @enderror"
               accept="image/*"
               onchange="previewImage(event)">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <!-- Image Preview -->
        <div class="mt-2">
            <img id="image-preview" src="{{ asset('storage/default.png') }}" width="120" class="rounded">
        </div>
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

    <!-- Confirm Password -->
    <div class="mb-3">
        <input type="password" 
               name="password_confirmation" 
               class="form-control" 
               placeholder="Confirm Password"
               required>
    </div>

    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-success fw-bold">
            Create Account
        </button>
    </div>

    <hr>

    <div class="text-center">
        <span class="small">Already have an account?</span>
        <a href="{{ route('login') }}" class="fw-semibold">Login</a>
    </div>

</form>

@endsection

@section('scripts')
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('image-preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection

