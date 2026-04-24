<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Social Media App')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #adb5bd;
        }

        .sidebar .nav-link:hover {
            background-color: #343a40;
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
        }
    </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            <i class="bi bi-share-fill me-1"></i> Social App
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTop">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTop">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('search') ? 'active' : '' }}"
                       href="{{ route('search') }}">
                        <i class="bi bi-search-heart-fill"></i> Search
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('setting') ? 'active' : '' }}"
                       href="{{ route('setting') }}">
                        <i class="bi bi-gear me-1"></i> Settings
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('aboutus') ? 'active' : '' }}"
                       href="{{ route('aboutus') }}">
                        <i class="bi bi-info-circle me-1"></i> About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('notifications.index') ? 'active' : '' }}"
                       href="{{ route('notifications.index') }}">
                        <i class="bi bi-bell me-1"></i> Notifications
                    </a>
                </li>

                <!-- Logout (Correct POST + Proper Styling) -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="mb-0">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-danger p-0 ms-lg-3">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="d-flex">

    <!-- Sidebar -->
    <aside class="sidebar bg-dark text-light p-3 d-none d-lg-block" style="width: 250px;">
        <h6 class="text-uppercase text-secondary">Navigation</h6>
        <hr class="border-secondary">

        <ul class="nav nav-pills flex-column">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('profile') }}"
                   class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <i class="bi bi-person me-2"></i> Profile
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('messages.inbox') }}"
                   class="nav-link {{ request()->routeIs('messages.inbox') ? 'active' : '' }}">
                    <i class="bi bi-chat-dots me-2"></i> Messages
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('notifications.index') }}"
                   class="nav-link {{ request()->routeIs('notifications.index') ? 'active' : '' }}">
                    <i class="bi bi-bell me-2"></i> Notifications
                </a>
            </li>

        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow-1 p-4 bg-light">
        @yield('content')
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!-- Footer -->
<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row gy-4">
            <!-- About -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-semibold mb-3">About Us</h5>
                <p class="text-secondary small">
                    A modern social networking platform designed to connect people,
                    share ideas, and build communities worldwide.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-semibold mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none {{ request()->routeIs('dashboard') ? 'text-white fw-semibo

