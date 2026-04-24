@extends('auth')

@section('title', 'Verify Email')

@section('content')

<h4 class="text-center fw-bold mb-3">Verify Your Email</h4>

<h2 class="text-center  text-muted mb-4">
    We've sent a verification link to your email.
</h2>
<p class="text  text-muted mb-3">
    you can sent email only twice in one minute.
</p>



@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <div class="d-grid">
        <button type="submit" class="btn btn-primary fw-bold">
            Resend Verification Email
        </button>
    </div>
</form>

@endsection

