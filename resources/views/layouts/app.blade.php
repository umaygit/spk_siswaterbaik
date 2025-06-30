<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Prestasi Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px; /* Slightly wider for better readability */
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --dark-bg: #343a40;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        #wrapper {
            display: flex;
            transition: all 0.3s ease;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            width: var(--sidebar-width);
            margin-left: calc(-1 * var(--sidebar-width)); /* Hidden by default on small screens */
            transition: margin 0.3s ease-in-out;
            background-color: var(--dark-bg);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1); /* Subtle shadow */
            position: fixed;
            z-index: 1000; /* Above content */
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 20px 15px;
            font-size: 1.5rem;
            color: white;
            text-align: center;
            font-weight: 700;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        #sidebar-wrapper .list-group-item {
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.8);
            background-color: transparent;
            border: none;
            display: flex;
            align-items: center;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        #sidebar-wrapper .list-group-item:hover,
        #sidebar-wrapper .list-group-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        #sidebar-wrapper .list-group-item i {
            margin-right: 12px;
            font-size: 1.1rem;
        }

        /* Content Area Styling */
        #page-content-wrapper {
            width: 100%;
            padding-left: 0; /* Default for mobile */
            transition: padding-left 0.3s ease-in-out;
        }

        /* Navbar Styling */
        .navbar {
            padding: 10px 20px;
            background-color: white !important;
            border-bottom: 1px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            position: sticky; /* Make it stick on scroll */
            top: 0;
            z-index: 999;
        }
        .navbar-brand {
            color: var(--dark-bg) !important;
            font-weight: 700;
            font-size: 1.4rem;
        }
        .navbar .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Toggled State */
        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        #wrapper.toggled #page-content-wrapper {
            padding-left: var(--sidebar-width); /* Push content to the right */
        }

        /* Responsive Adjustments */
        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0; /* Always visible on desktop */
            }
            #page-content-wrapper {
                padding-left: var(--sidebar-width); /* Push content to the right */
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: calc(-1 * var(--sidebar-width)); /* Hide on desktop when toggled */
            }
            #wrapper.toggled #page-content-wrapper {
                padding-left: 0; /* Content takes full width when sidebar hidden */
            }
            .navbar .toggle-btn {
                display: none; /* Hide toggle button on desktop */
            }
        }

        /* Main content padding */
        .container-fluid.py-4 {
            padding-top: 25px !important;
        }

        /* Card Styling for Dashboard elements */
        .dashboard-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); /* Stronger shadow */
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }
        .dashboard-card .card-body {
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Align content to start */
            padding: 25px;
        }
        .dashboard-card .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin-right: 20px;
            color: white; /* Icons are white */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-card .card-text {
            font-size: 2.5rem; /* Larger number */
            font-weight: 700;
            margin-bottom: 0;
        }
        .dashboard-card .card-title {
            font-size: 1rem;
            text-transform: uppercase;
            color: var(--secondary-color);
            margin-bottom: 5px;
        }
        .dashboard-card .card-footer {
            background-color: var(--light-bg);
            border-top: 1px solid #e9ecef;
            padding: 10px 25px;
        }
        .dashboard-card .card-footer a {
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .dashboard-card.bg-primary .icon-circle { background-color: var(--primary-color); }
        .dashboard-card.bg-success .icon-circle { background-color: var(--success-color); }
        .dashboard-card.bg-warning .icon-circle { background-color: var(--warning-color); }

        /* Logout button in sidebar */
        .sidebar-logout-form {
            position: absolute;
            bottom: 20px;
            width: 100%;
            padding: 0 20px;
        }
        .sidebar-logout-form .btn {
            font-weight: 600;
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

    </style>
</head>
<body>

<div class="d-flex" id="wrapper">
    <div class="bg-dark border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">SPK Prestasi</div>
        <div class="list-group list-group-flush">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('admin.kriteria.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.kriteria.*') ? 'active' : '' }}">
                <i class="fas fa-balance-scale"></i> Kriteria
            </a>
            <a href="{{ route('admin.subkriteria.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.subkriteria.*') ? 'active' : '' }}">
                <i class="fas fa-sliders-h"></i> Sub Kriteria
            </a>
            <a href="{{ route('admin.siswa.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Siswa
            </a>
            <a href="{{ route('admin.penilaian.data') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.penilaian.*') ? 'active' : '' }}">
                <i class="fas fa-clipboard-check"></i> Penilaian
            </a>
            <a href="{{ route('admin.hasil') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.hasil') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Laporan
            </a>
        </div>
        <div class="sidebar-logout-form">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-block">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="btn btn-primary" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand ml-auto d-none d-md-block" href="{{ route('admin.dashboard') }}">Sistem Pendukung Keputusan Penentuan Prestasi Siswa </a>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name ?? 'Admin' }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-top-nav').submit();">
                            Logout
                        </a>
                        <form id="logout-form-top-nav" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $("#sidebarToggle").on('click', function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        // Close sidebar when clicking outside on small screens
        $(document).on('click', function(e) {
            if ($(window).width() <= 768) {
                if (!$(e.target).closest('#sidebar-wrapper').length && !$(e.target).closest('#sidebarToggle').length) {
                    if ($("#wrapper").hasClass("toggled")) {
                        $("#wrapper").removeClass("toggled");
                    }
                }
            }
        });

        // Handle active class for sidebar links
        // This is handled by Laravel Blade's request()->routeIs, but good to have JS fallback/enhancement
        // var path = window.location.pathname;
        // $('.list-group-item').each(function() {
        //     if ($(this).attr('href') === path) {
        //         $(this).addClass('active');
        //     } else {
        //         $(this).removeClass('active');
        //     }
        // });
    });
</script>

</body>
</html>