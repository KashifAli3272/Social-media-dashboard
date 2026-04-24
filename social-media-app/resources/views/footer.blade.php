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
                        <a href="{{ route('home') }}"
                           class="text-secondary text-decoration-none {{ request()->routeIs('home') ? 'text-white fw-semibold' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('profile') }}"
                           class="text-secondary text-decoration-none {{ request()->routeIs('profile') ? 'text-white fw-semibold' : '' }}">
                            Profile
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('about') }}"
                           class="text-secondary text-decoration-none {{ request()->routeIs('about') ? 'text-white fw-semibold' : '' }}">
                            About
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('contact') }}"
                           class="text-secondary text-decoration-none {{ request()->routeIs('contact') ? 'text-white fw-semibold' : '' }}">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Social -->
            <div class="col-lg-4">
                <h5 class="fw-semibold mb-3">Follow Us</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-secondary fs-5">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-secondary fs-5">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-secondary fs-5">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <!-- Bottom -->
        <div class="text-center text-secondary small">
            &copy; {{ now()->year }} Social Media App. All rights reserved.
        </div>
    </div>
</footer>
