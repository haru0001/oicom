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
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

        <!-- Font Awesome -->
        <script src="{{ asset('fontawesome/js/all.min.js') }}" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
        
    </head>
    <body>
        <div id="app" class="container-scroller">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a href="{{ url('dashboard/') }}" class="navbar-brand brand-logo">OICOM</a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ str_limit($user->name, $limit = 20, $end = '...') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ url('twitter/logout') }}" class="dropdown-item">
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <a href="#" class="nav-link">
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
                                <span class="menu-title">Home</span>
                            </a>
                        </li>
    
                        <li class="nav-item">
                            <a href="{{ url('dashboard/tweets') }}" class="nav-link">
                                <span class="menu-title">List</span>
                            </a>
                        </li>

                        <li class="nav-item sidebar-actions">
                            <span class="nav-link">
                                <a href="{{ url('dashboard/tweets/create') }}" class="btn btn-block btn-lg btn-danger text-white radius mt-4">追い込む</a>
                            </span>
                        </li>
                    </ul>
                </nav>

                <main class="main-panel">
                    @yield('content')
                    <footer class="footer bg-dark">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 OICOM All rights reserved.</span>
                        </div>
                    </footer>
                </main>
            </div>
        </div>
    </body>
</html>
