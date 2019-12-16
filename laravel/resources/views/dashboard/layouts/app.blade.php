<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>OICOM</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP"> --}}
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600"> --}}
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

        <!-- Font Awesome -->
        <script src="{{ asset('js/all.min.js') }}" type="text/javascript"></script>

        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.standalone.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/off-canvas.js') }}"></script>
        
    </head>
    <body>
        <div id="app" class="container-scroller">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a href="{{ url('/') }}" class="navbar-brand brand-logo text-dark">OICOM</a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <ul class="navbar-nav ml-auto align-items-center d-none d-lg-block">
                        <li class="nav-item dropdown">
                            <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ str_limit($user->name, $limit = 20, $end = '...') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ url('twitter/logout') }}" class="dropdown-item">
                                    Logout
                                </a>
                            </div>

                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <i class="fal fa-bars"></i>
                    </button>
                </div>
            </nav>

            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <a href="{{ url('dashboard/') }}" class="nav-link">
                                <div class="nav-profile-image">
                                    <img src="{{ $user->profile_image_url }}" alt="profile">
                                    <span class="login-status online"></span>
                                </div>
                                <div class="nav-profile-text d-flex flex-column">
                                    <span class="mb-2">{{ str_limit($user->name, $limit = 15, $end = '...') }}</span>
                                    <span class="text-secondary text-small">{{ str_limit($user->screen_name, $limit = 20, $end = '...') }}</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('dashboard') }}" class="nav-link">
                                <span class="menu-title">HOME</span>
                            </a>
                        </li>
    
                        <li class="nav-item">
                            <a href="{{ url('dashboard/tweets') }}" class="nav-link">
                                <span class="menu-title">LIST</span>
                            </a>
                        </li>

                        <li class="nav-item sidebar-actions">
                            <span class="nav-link">
                                <a href="{{ url('dashboard/tweets/create') }}" class="btn btn-block btn-lg btn-danger text-white radius mt-4">追い込む</a>
                            </span>
                        </li>

                        <li class="nav-item border-top text-center mt-5">
                            <a href="{{ url('twitter/logout') }}" class="nav-link justify-content-center">
                                <span class="menu-title text-secondary">Logout</span>
                            </a>
                        </li>

                    </ul>
                </nav>

                <main class="main-panel">
                    @yield('content')
                    <footer class="footer bg-dark">
                        <div class="d-sm-flex justify-content-center">
                            <span class="text-muted text-center d-block">Copyright © 2019 OICOM All rights reserved.</span>
                        </div>
                    </footer>
                </main>
            </div>
        </div>
    </body>
</html>
