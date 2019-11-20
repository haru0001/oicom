<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>OICOM</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP"> --}}
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600"> --}}
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Font Awesome -->
        {{-- <script src="{{ asset('fontawesome/js/all.min.js') }}" type="text/javascript"></script> --}}
        
    </head>
    <body>
        <div id="app" class="container-scroller">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="/">OICOM</a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Name
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="" class="dropdown-item">プロフィール</a>
                                <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <a href="#" class="nav-link">
                                <div class="nav-profile-image">
                                    <img src="https://placehold.jp/80x80.png" alt="profile">
                                    <span class="login-status online"></span>
                                    <!--change to offline or busy as needed-->
                                </div>
                                    <div class="nav-profile-text d-flex flex-column">
                                    <span class="font-weight-bold mb-2">Name</span>
                                    <span class="text-secondary text-small">screen_name</span>
                                </div>
                                <i class="fad fa-bookmark text-success nav-profile-badge"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item sidebar-actions">
                            <span class="nav-link">
                                <div class="border-bottom">
                                    <h6 class="font-weight-normal mb-3">Projects</h6>
                                </div>
                                <a class="btn btn-block btn-lg btn-gradient-primary text-white mt-4">追い込む</a>
                            </span>
                        </li>
                    </ul>
                </nav>

                <main class="main-panel">
                    @yield('content')
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 OICOM All rights reserved.</span>
                        </div>
                    </footer>
                </main>
            </div>






            {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto align-items-center">
                            <!-- Authentication Links -->
                            @if (isset($test))
                                <li class="nav-item">
                                    <a class="nav-link" href="">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Register</a>
                                </li>
                            @else
                                <li class="nav-item mr-5">
                                    <a href="{{ url('tweets/create') }}" class="btn btn-md btn-primary">追い込む</a>
                                </li>
                                <li class="nav-item">
                                    <img src="https://placehold.jp/50x50.png" class="rounded-circle" width="50" height="50">
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        name<span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="" class="dropdown-item">プロフィール</a>
                                        <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav> --}}
        </div>
    </body>
</html>
