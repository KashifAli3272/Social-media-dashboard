@extends('index')

@section('title', 'Profile')

@section('content')



<div class="container-fluid">

    <!-- Profile Header -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body d-flex flex-column flex-md-row align-items-center">
            
            <!-- Avatar -->
           <!-- Avatar -->
<div class="me-md-4 text-center mb-3 mb-md-0">
    <img 
        src="{{ asset('storage/' . auth()->user()->image) ?? asset('storage/default.png') }}" 
        alt="User Avatar"
        class="rounded-circle img-fluid border border-3 border-primary shadow-sm"
        style="width: 120px; height: 120px; object-fit: cover;">
</div>

            
            <!-- User Info -->
            <div class="flex-grow-1 text-center text-md-start">
                <h3 class="mb-1">{{ auth()->user()->name ?? 'John Doe' }}</h3>
             
                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">Edit Profile</a>
            </div>

            <!-- Profile Stats -->
            <div class="d-flex flex-column text-center ms-md-4 mt-3 mt-md-0">
                <div class="mb-2">
                    <h5 class="mb-0">{{auth()->user()->posts}}</h5>
                    <small class="text-muted">Posts</small>
                </div>
                <div class="mb-2">
                    <h5 class="mb-0">{{ auth()->user()->messages}}</h5>
                    <small class="text-muted">Messages</small>
                </div>
                <div>
                    <h5 class="mb-0">{{ auth()->user()->followers}}</h5>
                    <small class="text-muted">Followers</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Details & Activity -->
    <div class="row g-4">

        <!-- Personal Details -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    Personal Details
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><strong>Full Name:</strong> {{ auth()->user()->name ?? 'John Doe' }}</li>
                        <li class="mb-2"><strong>Email:</strong> {{ auth()->user()->email ?? 'john.doe@example.com' }}</li>
                        <li class="mb-2"><strong>Phone:</strong> {{ auth()->user()->phone ?? 'N/A' }}</li>
                        <li class="mb-2"><strong>Location:</strong> {{ auth()->user()->location ?? 'Islamabad, PAK' }}</li>
                        
                    </ul>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    Recent Activity
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Posted a new update
                            <span class="text-muted small">Today</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Sent a message to Jane
                            <span class="text-muted small">Yesterday</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Updated profile picture
                            <span class="text-muted small">Feb 9, 2026</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Liked a post
                            <span class="text-muted small">Feb 8, 2026</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
