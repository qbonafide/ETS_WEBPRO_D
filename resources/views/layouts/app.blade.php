<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITStudy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        nav {
            background-color: #f6f0ea;
        }
        .nav-link {
            color: #4b1f0e !important;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .nav-link:hover {
            color: #a0522d !important;
            border-bottom: 3px solid #a0522d;
            padding-bottom: 2px;
        }
        .profile-icon {
            color: white;
            background-color: #4b1f0e;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            margin-right: 5px;
        }
        .profile-section {
            display: flex;
            align-items: center;
            margin-left: auto;
        }
        .profile-section .dropdown-menu {
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            border-radius: 8px;
            padding: 10px;
        }
        .profile-section .btn-danger {
            font-size: 0.85rem;
        }
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }
            .profile-section {
                justify-content: center !important;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/" style="color:#4a2c2a;">ITStudy</a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/location">Location</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/booking">Booking</a></li>
                    <li class="nav-item"><a class="nav-link" href="/reservation">Reservation</a></li>
                </ul>

                <div class="profile-section mt-3 mt-lg-0">
                    @auth
                    <div class="dropdown">
                        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="profileDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-icon">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <span class="profile-name">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="profileDropdown" style="min-width:200px;">
                            <li class="mb-1">
                                <strong>Logged in as:</strong><br>
                                {{ Auth::user()->email }}
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger w-100">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="d-flex align-items-center text-decoration-none">
                        <div class="profile-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <span class="profile-name">Login</span>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')
</body>
</html>
