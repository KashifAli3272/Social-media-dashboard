@extends('auth')

@section('title', 'Edit Profile')

@section('content')

<h4 class="text-center fw-bold mb-4">Edit Profile</h4>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Full Name -->
    <div class="mb-3">
        <input type="text" 
               name="name" 
               class="form-control @error('name') is-invalid @enderror" 
               placeholder="Full Name"
               value="{{ old('name', auth()->user()->name) }}"
               >
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
               value="{{ old('email', auth()->user()->email) }}"
               required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Phone with Country Code -->
    <div class="mb-3">
        <div class="input-group">
            <select name="country_code" class="form-select" style="max-width:120px;" required>
                @php $code = old('country_code', auth()->user()->country_code); @endphp
                <option value="+1" {{ $code == '+1' ? 'selected' : '' }}>🇺🇸 +1</option>
                <option value="+44" {{ $code == '+44' ? 'selected' : '' }}>🇬🇧 +44</option>
                <option value="+91" {{ $code == '+91' ? 'selected' : '' }}>🇮🇳 +91</option>
                <option value="+971" {{ $code == '+971' ? 'selected' : '' }}>🇦🇪 +971</option>
                <option value="+92" {{ $code == '+92' ? 'selected' : '' }}>🇵🇰 +92</option>
            </select>

            <input type="text" 
                   name="phone" 
                   class="form-control @error('phone') is-invalid @enderror" 
                   placeholder="Phone Number"
                   value="{{ old('phone', auth()->user()->phone) }}"
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

        <!-- Current Image Preview -->
        <div class="mt-3 text-center">
            <img id="image-preview"
                 src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('storage/default.png') }}"
                 width="120"
                 height="120"
                 class="rounded-circle border border-3 border-primary"
                 style="object-fit: cover;">
        </div>
    </div>

    <hr>

    <h6 class="fw-bold">Change Password (Optional)</h6>

    <!-- Password -->
    <div class="mb-3">
        <input type="password" 
               name="password" 
               class="form-control @error('password') is-invalid @enderror" 
               placeholder="New Password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <input type="password" 
               name="password_confirmation" 
               class="form-control" 
               placeholder="Confirm New Password">
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary fw-bold">
            Update Profile
        </button>
    </div>

</form>

@endsection

@section('scripts')
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        document.getElementById('image-preview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
