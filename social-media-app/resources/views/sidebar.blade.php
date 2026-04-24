@php
    $unreadNotifications = \App\Models\Notification::where('is_read', false)->count();
@endphp

<!-- Sidebar -->
<aside class="bg-dark text-light vh-100 p-3" style="width: 250px;">
    
    <!-- Brand / Title -->
    <div class="mb-4">
        <h5 class="fw-bold">Social App</h5>
        <hr class="border-secondary">
    </div>

    <!-- Navigation -->
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item mb-2">
            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'active bg-primary text-white' : 'text-light' }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('profile') }}"
               class="nav-link {{ request()->routeIs('profile') ? 'active bg-primary text-white' : 'text-light' }}">
                <i class="bi bi-person me-2"></i>
                Profile
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('messages') }}"
               class="nav-link {{ request()->routeIs('messages') ? 'active bg-primary text-white' : 'text-light' }}">
                <i class="bi bi-chat-dots me-2"></i>
                Messages
            </a>
        </li>

        <!-- Notifications with Badge -->
        <li class="nav-item mb-2">
            <a href="{{ route('notifications.index') }}"
               class="nav-link d-flex justify-content-between align-items-center 
               {{ request()->routeIs('notifications.*') ? 'active bg-primary text-white' : 'text-light' }}">

                <span>
                    <i class="bi bi-bell me-2"></i>
                    Notifications
                </span>

                @if($unreadNotifications > 0)
                    <span class="badge bg-danger">
                        {{ $unreadNotifications }}
                    </span>
                @endif

            </a>
        </li>

    </ul>

</aside>
