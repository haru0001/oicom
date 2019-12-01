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
        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP"> --}}
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600"> --}}
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Font Awesome -->
        <script src="{{ asset('fontawesome/js/all.min.js') }}" type="text/javascript"></script>
        
    </head>
    <body>
        <div id="app" class="container-scroller">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="/">OICOM</a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item">
                            <a href="twitter" class="nav-link">Twitter Login</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid page-body-wrapper">
                @yield('content')
            </div>
        </div>
    </body>
</html>
