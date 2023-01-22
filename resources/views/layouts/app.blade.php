<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Font Awesome 5.15.1 CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            font-family: Roboto, sans-serif;
            color: #000000;
            background: #FFFFFF;
        }

        .navbar {
            padding-left: 42px;
            padding-right: 35px;
        }

        .navbar-brand {
            font-size: 24px;
        }

        .nav-item {
            margin-left: 6px;
            margin-right: 6px;
        }

        .login-button {
            background: #515151;
            border-radius: 5px;
            width: 178px;
            height: 40px;
            color: white !important;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
        }

        .upload-button {
            background: #C4C4C4;
            border-radius: 5px;
            width: 178px;
            height: 40px;
            color: #515151 !important;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
        }

        .favorite-button {
            width: 178px;
            height: 40px;
            border: 1px solid #C4C4C4;
            border-radius: 5px;
            color: #515151 !important;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
        }

        .user-button {
            font-size: 14px;
            line-height: 16px;
            align-items: center;
            text-align: center;
            text-transform: uppercase;
            color: #515151 !important;
            font-weight: bold;
        }

        .my-container {
            padding-left: 42px;
            padding-right: 41px;
            color: #000000;
        }

        .my-container .my-header {
            margin-bottom: 21px;
            font-weight: 700;
            font-size: 34px;
            line-height: 40px;

        }

        .my-container .col-2 {
            margin-bottom: 30px;
        }

        .my-container .title {
            margin-top: 16px;
            margin-bottom: 19px;
            font-weight: 700;
            font-size: 18px;
        }

        .my-container .description {
            font-weight: 400;
            font-size: 16px;
            line-height: 19px;
        }

        .my-container .favorite {
            margin-top: 20px;
        }

        .my-container .load-more-button {
            width: 292px;
            height: 69px;
            background: #515151;
            border-radius: 500px;
            color: #FFFFFF;
            font-size: 18px;
            margin-top: 10px;
            text-transform: uppercase;
        }
    </style>
    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <li class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-center upload-button" href="{{route('upload')}}">Upload</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-center login-button" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item ">
                        <a class="nav-link user-button">{{ Auth()->user()->email }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link favorite-button" href=""><i class="fas fa-heart mr-4 ml-1"></i>Favorites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center upload-button" href="{{route('upload')}}">Upload</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-center login-button" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    </li>
                @endguest
            </ul>
    </nav>
    <div class="content-wrapper">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
