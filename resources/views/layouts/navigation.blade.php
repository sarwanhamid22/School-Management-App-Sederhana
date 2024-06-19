<!-- Navbar -->
<nav x-data="{ open: false }" class="bg-light border-b">
    <nav class="main-header navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                </li>
                <li class="nav-item ml-5"> <!-- Adjust margin-left for more space -->
                    <!-- Replacing Dashboard with Brand Logo -->
                    <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center">
                        <img src="{{ asset('assets/dist/img/Smk_Gamelab.png') }}" alt="SMK Gamelab Logo"
                            class="brand-image img-circle elevation-3" style="opacity: .8; width: 30px; height: 30px;">
                        <span class="brand-text font-weight-light ml-3">SMK Gamelab</span>
                        <!-- Adjust margin-left for more space -->
                    </a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto mr-5"> <!-- Adjust margin-right for more space -->
                <!-- User Menu -->
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                            data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/dist/img/Admin.png') }}" class="rounded-circle" width="31"
                                alt="Admin">
                            <span class="ml-2">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="min-width: 200px;">
                            <div class="dropdown-header d-flex align-items-center">
                                <img src="{{ asset('assets/dist/img/Admin.png') }}" class="img-circle elevation-2"
                                    width="45" alt="Admin">
                                <div class="ml-3">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <h10><span class="text-muted">{{ Auth::user()->email }}</span></h10>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="fas fa-user-circle mr-2"></i> My Profile
                            </a>
                            <!-- Additional items can be added here -->
                            @stack('additionalDropdownItems')
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</nav>

<!-- Optional: Add Bootstrap CSS and JS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .dropdown-menu {
        min-width: auto;
        /* Make the dropdown menu width flexible */
    }
</style>
