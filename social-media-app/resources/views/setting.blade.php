@extends('index')

@section('title', 'Settings')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">⚙️ Account Settings</h2>

    {{-- Success Alerts --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('password_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('password_success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            {{-- Tabs --}}
            <ul class="nav nav-tabs mb-4" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ session('tab') != 'password' ? 'active' : '' }}" 
                            id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab">
                        Profile
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ session('tab') == 'password' ? 'active' : '' }}" 
                            id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab">
                        Password
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                {{-- Profile Tab --}}
                <div class="tab-pane fade {{ session('tab') != 'password' ? 'show active' : '' }}" id="profile" role="tabpanel">
                    <form action="{{ route('settings.updateProfile') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-semibold py-2">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Password Tab --}}
                <div class="tab-pane fade {{ session('tab') == 'password' ? 'show active' : '' }}" id="password" role="tabpanel">
                    <form action="{{ route('settings.updatePassword') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        {{-- Current Password --}}
                        <div class="mb-3">
                            <label for="current_password" class="form-label fw-semibold">Current Password</label>
                            <div class="input-group">
                                <input type="password" name="current_password" id="current_password"
                                       class="form-control @error('current_password') is-invalid @enderror" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('current_password')">Show</button>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- New Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">New Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">Show</button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text">Minimum 8 characters.</div>
                        </div>

                        {{-- Confirm New Password --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">Show</button>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success fw-semibold py-2">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Password Toggle Script --}}
<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const btn = field.nextElementSibling;
        if (field.type === "password") {
            field.type = "text";
            btn.textContent = "Hide";
        } else {
            field.type = "password";
            btn.textContent = "Show";
        }
    }

    // Bootstrap 5 validation
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

@endsection
