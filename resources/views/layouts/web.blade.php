<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard-guru.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pelanggaran.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-table.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="wrapper">
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <img class="nav_logo-icon" src="{{ asset('images/logo_harbas.png') }}" alt="logo" style="max-width: 30px;max-height: 30px;"> <span class="nav_logo-name">Harapan Bangsa</span> </a>
                    <div class="nav_list">
                        @include('layouts.menu')
                    </div>
                </div> <a href="/detail/{{Auth::user()->level}}/{{Auth::user()->id}}" class="nav_link {{ Request::is('detail/siswa/{$id}') ? 'active' : '' }}">
                    <i class='bx bx-user-circle nav_icon bxs-lg'></i>
                    <span class="nav_name">{{Auth::user()->name}}</span>

                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            @yield('content')
        </div>
        <!--Container Main end-->
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Monitor Pelanggaran App -->
    <script src="{{ asset('js/web.js') }}"></script>
</body>

</html>