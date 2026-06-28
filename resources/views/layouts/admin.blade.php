<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body id="body-pd">

    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="btn-group d-flex" style="width: 60px">

            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://res.cloudinary.com/dpjpz26qm/image/upload/v1674890312/codepen/avatar/man_1_cpqkhl.png"
                    class="img-fluid" alt="" style="width: 35px;">
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('dashboard') }}"><i class='bx bxs-widget'></i> Dashboard</a>
                </li>
                <li><a class="dropdown-item" href="{{ url('profile') }}"><i class='bx bx-user-circle'></i> Profile</a>
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class='bx bx-exit'></i> Logout</a></li>
                <!-- da capire cosa fa esattamente -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i><span
                        class="nav_logo-name">Laravel Portfolio</span> </a>
                <div class="nav_list">
                    <a href="{{ url('dashboard') }}" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="{{ url('profile') }}" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span
                            class="nav_name">Users</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span
                            class="nav_name">Messages</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span
                            class="nav_name">Bookmark</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span
                            class="nav_name">Files</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                            class="nav_name">Stats</span> </a>
                </div>
            </div>
            <a href="{{ route('logout') }}"" class="nav_link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class='bx bx-log-out nav_icon'></i> Logout</a>
        </nav>
    </div>

    <main>
        <div class="pt-3">
            @yield('content')
        </div>
    </main>

</body>

</html>
