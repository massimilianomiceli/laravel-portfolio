<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    {{-- Boxicons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    {{-- Vite --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="body-pd">

    {{-- Header --}}
    <header class="header" id="header">
        {{-- Mobile menu toggle --}}
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>

        {{-- User dropdown --}}
        <div class="btn-group d-flex user-menu">

            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                aria-label="Open user menu">
                <img src="https://res.cloudinary.com/dpjpz26qm/image/upload/v1674890312/codepen/avatar/man_1_cpqkhl.png"
                    class="img-fluid" alt="User profile">
            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>
                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                        <i class="bx bx-home-alt-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bx bx-user-circle"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        ">
                        <i class="bx bx-log-out-circle"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </header>

    {{-- Sidebar --}}
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">

            <div>
                {{-- Logo --}}
                <a href="{{ route('dashboard') }}" class="nav_logo">
                    <i class="bx bx-code-block nav_logo-icon"></i>

                    <span class="nav_logo-name">
                        Laravel Portfolio
                    </span>
                </a>

                {{-- Navigation links --}}
                <div class="nav_list">
                    {{-- Projects --}}
                    <a href="{{ route('projects.index') }}"
                        class="nav_link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                        <i class="bx bx-briefcase-alt-2 nav_icon"></i>
                        <span class="nav_name">
                            Projects
                        </span>
                    </a>
                    {{-- Technologies --}}
                    <a href="{{ route('technologies.index') }}"
                        class="nav_link {{ request()->routeIs('technologies.*') ? 'active' : '' }}">
                        <i class="bx bx-code-alt nav_icon"></i>
                        <span class="nav_name">
                            Technologies
                        </span>
                    </a>
                    {{-- Types --}}
                    <a href="{{ route('types.index') }}"
                        class="nav_link {{ request()->routeIs('types.*') ? 'active' : '' }}">
                        <i class="bx bx-category-alt nav_icon"></i>
                        <span class="nav_name">
                            Types
                        </span>
                    </a>
                    {{-- Profile --}}
                    <a href="{{ route('profile.edit') }}"
                        class="nav_link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <i class="bx bx-user-circle nav_icon"></i>
                        <span class="nav_name">
                            Profile
                        </span>
                    </a>
                </div>
            </div>

            {{-- Logout --}}
            <a href="{{ route('logout') }}" class="nav_link"
                onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                ">
                <i class="bx bx-log-out-circle nav_icon"></i>

                <span class="nav_name">
                    Logout
                </span>
            </a>

        </nav>
    </div>

    {{-- Main content --}}
    <main>
        <div class="pt-3">
            @yield('content')
        </div>
    </main>

    {{-- Logout form --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</body>

</html>
