<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} | SMK Gamelab</title>
    <link rel="icon" href="{{ asset('assets/dist/img/Smk_Gamelab.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Additional CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    @yield('addCss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-flex align-items-center flex-grow-1">
                    <h2 class="m-0" style="flex-grow: 1;">{{ $title ?? 'SMK Gamelab' }}</h2>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown" aria-expanded="false">
                        @role('admin')
                            <img src="{{ asset('assets/dist/img/Admin.png') }}" class="rounded-circle" width="31" alt="Admin">
                        @elserole('teacher')
                            <img src="{{ asset('assets/dist/img/Teacher.png') }}" class="rounded-circle" width="31" alt="Teacher">
                        @elserole('student')
                            <img src="{{ asset('assets/dist/img/Student.png') }}" class="rounded-circle" width="31" alt="Student">
                        @endrole
                        <span class="ml-2">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 200px;">
                        <div class="dropdown-header d-flex align-items-center">
                            @role('admin')
                                <img src="{{ asset('assets/dist/img/Admin.png') }}" class="img-circle elevation-2" width="45" alt="Admin">
                            @elserole('teacher')
                                <img src="{{ asset('assets/dist/img/Teacher.png') }}" class="img-circle elevation-2" width="45" alt="Teacher">
                            @elserole('student')
                                <img src="{{ asset('assets/dist/img/Student.png') }}" class="img-circle elevation-2" width="45" alt="Student">
                            @endrole
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
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </form>
                    </div>
                </li>
            @endif            
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('assets/dist/img/Smk_Gamelab.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMK Gamelab</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                            <!-- Komunikasi -->
                            <li class="nav-item">
                                <a href="{{ url('/communications') }}" class="nav-link {{ Request::is('communications') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-comments"></i>
                                    <p>Komunikasi</p>
                                </a>
                            </li>
                        @role('admin')
                        <!-- Manajemen Sekolah -->
                        <li class="nav-item has-treeview {{ Request::is('classes*') || Request::is('subjects*') || Request::is('attendances*') || Request::is('grades*') || (Request::is('reports') && !Request::is('reports/create')) || Request::is('teachers*') || Request::is('students*') || Request::is('teaching_schedules*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('classes*') || Request::is('subjects*') || Request::is('attendances*') || Request::is('grades*') || (Request::is('reports') && !Request::is('reports/create')) || Request::is('teachers*') || Request::is('students*') || Request::is('teaching_schedules*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    Manajemen Sekolah
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Data Guru -->
                                <li class="nav-item">
                                    <a href="{{ route('listTeachers') }}" class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}">
                                        <p>Data Guru</p>
                                    </a>
                                </li>
                                <!-- Data Siswa -->
                                <li class="nav-item">
                                    <a href="{{ route('listStudents') }}" class="nav-link {{ Request::is('students') || Request::is('students/create') || Request::is('students/*/edit') ? 'active' : '' }}">
                                        <p>Data Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('classes.index') }}" class="nav-link {{ Request::is('classes*') ? 'active' : '' }}">
                                        <p>Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subjects.index') }}" class="nav-link {{ Request::is('subjects*') ? 'active' : '' }}">
                                        <p>Mata Pelajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listTeachingschedules') }}" class="nav-link {{ Request::is('teaching_schedules*') ? 'active' : '' }}">
                                        <p>Jadwal Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listAttendances') }}" class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
                                        <p>Kehadiran Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listGrades') }}" class="nav-link {{ Request::is('grades*') ? 'active' : '' }}">
                                        <p>Nilai Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reports.index') }}" class="nav-link {{ Request::is('reports') && !Request::is('reports/create') ? 'active' : '' }}">
                                        <p>Penilaian Sekolah</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                
                        @role('student')
                        <!-- Manajemen Siswa -->
                        <li class="nav-item has-treeview {{ Request::is('students*') || Request::is('attendances*') || Request::is('grades*') || Request::is('reports/create') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('students*') || Request::is('attendances*') || Request::is('grades*') || Request::is('reports/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    Manajemen Siswa
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('listStudents') }}" class="nav-link {{ Request::is('students') || Request::is('students/create') || Request::is('students/*/edit') ? 'active' : '' }}">
                                        <p>Profil Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listGrades') }}" class="nav-link {{ Request::is('grades*') ? 'active' : '' }}">
                                        <p>Nilai Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listAttendances') }}" class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
                                        <p>Kehadiran Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reports.create') }}" class="nav-link {{ Request::is('reports/create') ? 'active' : '' }}">
                                        <p>Suara Siswa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                
                        @role('teacher')
                        <!-- Manajemen Guru -->
                        <li class="nav-item has-treeview {{ Request::is('teachers*') || Request::is('teaching_schedules*') || Request::is('grades*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('teachers*') || Request::is('teaching_schedules*') || Request::is('grades*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    Manajemen Guru
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('listTeachers') }}" class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}">
                                        <p>Profil Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listTeachingschedules') }}" class="nav-link {{ Request::is('teaching_schedules*') ? 'active' : '' }}">
                                        <p>Jadwal Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listGrades') }}" class="nav-link {{ Request::is('grades*') ? 'active' : '' }}">
                                        <p>Nilai Siswa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                        
                        <!-- Manajemen Keuangan -->
                        @role('admin')
                        <li class="nav-item has-treeview {{ Request::is('payments*') || Request::is('financial-reports*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('payments*') || Request::is('financial-reports*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>
                                    Manajemen Keuangan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('listPayments') }}" class="nav-link {{ Request::is('payments*') ? 'active' : '' }}">
                                        <p>Tracking Pembayaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('financial-reports.index') }}" class="nav-link {{ Request::is('financial-reports*') ? 'active' : '' }}">
                                        <p>Laporan Keuangan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                        
                    </ul>
                </nav>                
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- REQUIRED SCRIPTS -->
        @include('sweetalert::alert')
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
        <!-- Additional JavaScript -->
        @yield('addJavascript')
    </div>
</body>

</html>
