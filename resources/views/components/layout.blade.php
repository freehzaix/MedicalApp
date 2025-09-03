<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titlePage') | ClinicApp</title>

    <!-- Styles / Scripts -->
    @vite(['resources/js/app.js'])

    <link rel="icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link"></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('img/logo.jpg') }}" alt="{{ config('app.name') }}" width="100%">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Tableau de bord
                                </p>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('users.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    Utilisateurs
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index', ['role' => 'admin']) }}"
                                        class="nav-link {{ request()->fullUrlIs(url('users?role=admin')) ? 'active' : '' }}">
                                        <i class="fas fa-user-shield nav-icon"></i>
                                        <p>Admins</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.index', ['role' => 'caissier']) }}"
                                        class="nav-link {{ request()->fullUrlIs(url('users?role=caissier')) ? 'active' : '' }}">
                                        <i class="fas fa-cash-register nav-icon"></i>
                                        <p>Caissiers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.index', ['role' => 'medecin']) }}"
                                        class="nav-link {{ request()->fullUrlIs(url('users?role=medecin')) ? 'active' : '' }}">
                                        <i class="fas fa-user-md nav-icon"></i>
                                        <p>Médecins</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.index', ['role' => 'comptable']) }}"
                                        class="nav-link {{ request()->fullUrlIs(url('users?role=comptable')) ? 'active' : '' }}">
                                        <i class="fas fa-calculator nav-icon"></i>
                                        <p>Comptables</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item menu-open">
                            <a href="{{ route('specialites.index') }}"
                                class="nav-link {{ request()->routeIs('specialites.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>Specialités</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('medecins.index') }}"
                                class="nav-link {{ request()->routeIs('medecins.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-md"></i>
                                <p>Medecins</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('patients.index') }}"
                                class="nav-link {{ request()->routeIs('patients.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Patients</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('rendezvous.index') }}"
                                class="nav-link {{ request()->routeIs('rendezvous.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>Rendez-vous</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('departements.index') }}"
                                class="nav-link {{ request()->routeIs('departements.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Départements</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('typeexamens.index') }}"
                                class="nav-link {{ request()->routeIs('typeexamens.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>Type d'examens</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('services.index') }}"
                                class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-briefcase-medical"></i>
                                <p>Services</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>Comptabilités</p>
                            </a>
                        </li>
                        <hr />
                        <li class="nav-item menu-open">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Se déconnecter</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        {{ $slot }}
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2025 <a href="#">Centre Médical les Perles</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success') || session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                });

                @if (session('success'))
                    Toast.fire({
                        icon: 'success',
                        title: '{{ session('success') }}'
                    });
                @endif

                @if (session('error'))
                    Toast.fire({
                        icon: 'error',
                        title: '{{ session('error') }}'
                    });
                @endif
            });
        </script>
    @endif

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>


</body>

</html>
