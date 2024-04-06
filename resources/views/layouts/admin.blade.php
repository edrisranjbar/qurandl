<!DOCTYPE html>
<html lang="fa">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'مدیریت')</title>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <link href="{{ asset('assets/css/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2-override.css') }}" rel="stylesheet">
    <script>
        const webBaseUrl = "{{ url('/') }}";
        const apiBaseUrl = `${webBaseUrl}/api`;
    </script>
    @vite(['resources/js/app.js', 'resources/js/analytics-chart.js'])
    <!-- FavIcon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
</head>

<body id="page-top" dir="rtl">
<div id="wrapper">
    @include('templates.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav
                    class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn d-md-none btn-circle">
                    <i class="fa fa-bars"></i>
                </button>
                <h1 class="float-end fs-5 mr-5">@yield('title')</h1>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ml-2 border rounded" href="#" id="userDropdown"
                           role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user fa-sm fa-fw text-gray-600"></i>
                            <span class="mr-2 d-none d-lg-inline text-dark">
                                        {{ auth('admin')->user()->fullName }}
                                    </span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu shadow animated--grow-in text-right"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                <i class="fas fa-user fa-sm fa-fw ml-2 text-gray-600"></i>
                                حساب کاربری
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw ml-2 text-gray-600"></i>
                                خروج
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            @yield('content')
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center text-muted my-auto">
                            <span>
                                طراحی و توسعه توسط &nbsp;
                                <a href="https://www.itadbeer.com/" target="_blank">
                                    <strong>آی‌تدبیر</strong>
                                </a>
                            </span>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/sb-admin-2.js') }}"></script>
<script src="{{ asset('assets/js/sidebar.js') }}" defer></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/admin/dynamic-lists.js') }}" defer></script>
@yield('js')
</body>

</html>