<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="{{ asset('assets') }}/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="/">
                    <span class="align-middle">JATI</span>
                </a>

                <li class="sidebar-item {{ Request::path() === 'admin_dashboard' ? 'active' : '' }}">
                    <a class="sidebar-link" href="/admin_dashboard">
                        <i class="align-middle" data-feather="sliders"></i> <span
                            class="align-middle">Dashboard</span>
                    </a>
                </li>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Jurnal
                    </li>

                    <li class="sidebar-item {{ Request::path() === 'admin_vol_jurnal' || Request::path() === 'admin_tambah_vol_jurnal' || Request::route()->getName() === 'admin_detailvoljurnal' ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin_vol_jurnal">
                            <i class="align-middle me-2" data-feather="paperclip"></i> <span class="align-middle">Volume Jurnal</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::path() === 'admin_jurnal' || Request::route()->getName() === 'admin_detailjurnal' ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin_jurnal">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Jurnal</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Manajemen
                    </li>

                    <li class="sidebar-item {{ Request::path() === 'admin_manajemen_user' || Request::path() === 'admin_tambahuser' 
                    || Request::route()->getName() === 'admindetailuser' || Request::route()->getName() === 'adminedituser'
                    || Request::route()->getName() === 'admin_isiprofile' || Request::route()->getName() === 'admin_ubahprofile' ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin_manajemen_user">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Author</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::path() === 'admin_manajemen_editor' || Request::path() === 'admin_tambaheditor' 
                    || Request::route()->getName() === 'admindetaileditor' || Request::route()->getName() === 'adminediteditor'
                     ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin_manajemen_editor">
                            <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Editor</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::path() === 'admin_manajemen_reviewer' || Request::path() === 'admin_tambahreviewer' 
                    || Request::route()->getName() === 'admindetailreviewer' || Request::route()->getName() === 'admineditreviewer'
                     ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin_manajemen_reviewer">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Reviewer</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::path() === 'admin_manajemen_admin' || Request::path() === 'admin_tambahadmin' 
                    || Request::route()->getName() === 'admindetailadmin' || Request::route()->getName() === 'admineditadmin'
                     ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin_manajemen_admin">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Admin</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{ asset('assets') }}/img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1"
                                    alt="Charles Hall" /> <span class="text-dark">{{ Auth::guard('admin')->user()->username }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                @yield('content')
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="https://adminkit.io/"
                                    target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted"
                                    href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin
                                        Template</strong></a> &copy;
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets') }}/js/app.js"></script>
</body>

</html>
