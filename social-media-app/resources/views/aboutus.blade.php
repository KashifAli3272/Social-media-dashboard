@extends('index')

@section('title', 'About Us')

@section('content')

<div class="container py-5">

    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">About Our Social App</h1>
        <p class="text-muted">
            Connecting people. Sharing moments. Building communities.
        </p>
    </div>

    <!-- About Section -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f"
                 class="img-fluid rounded shadow-sm"
                 alt="Social Media Community">
        </div>
        <div class="col-md-6">
            <h3 class="fw-semibold">Who We Are</h3>
            <p class="text-muted">
                Our Social App is a modern social networking platform designed to bring people
                together from around the world. We provide a space where users can connect,
                share ideas, post updates, send messages, and grow meaningful relationships.
            </p>
            <p class="text-muted">
                Whether you're here to network professionally or stay connected with friends,
                our platform is built to make communication simple, secure, and enjoyable.
            </p>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="row text-center mb-5">
        <div class="col-md-6 mb-4">
            <div class="p-4 shadow-sm rounded bg-light h-100">
                <i class="bi bi-bullseye fs-1 text-primary"></i>
                <h4 class="mt-3 fw-semibold">Our Mission</h4>
                <p class="text-muted">
                    To create a safe and innovative digital space where people can share,
                    communicate, and collaborate without limits.
                </p>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="p-4 shadow-sm rounded bg-light h-100">
                <i class="bi bi-eye fs-1 text-success"></i>
                <h4 class="mt-3 fw-semibold">Our Vision</h4>
                <p class="text-muted">
                    To become a leading social platform that empowers communities,
                    encourages creativity, and connects the world through technology.
                </p>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="text-center mb-4">
        <h3 class="fw-bold">What We Offer</h3>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded h-100">
                <i class="bi bi-chat-dots fs-1 text-primary"></i>
                <h5 class="mt-3">Instant Messaging</h5>
                <p class="text-muted">
                    Communicate in real-time with secure and fast messaging features.
                </p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded h-100">
                <i class="bi bi-people fs-1 text-success"></i>
                <h5 class="mt-3">Community Building</h5>
                <p class="text-muted">
                    Create connections, join groups, and build meaningful relationships.
                </p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded h-100">
                <i class="bi bi-shield-lock fs-1 text-danger"></i>
                <h5 class="mt-3">Secure Platform</h5>
                <p class="text-muted">
                    Your privacy and security are our top priority.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection
