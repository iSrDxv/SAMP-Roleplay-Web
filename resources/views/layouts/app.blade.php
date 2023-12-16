<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="samp, gta sa, gta, lvm, roleplay, gta5, gta v, fenixzone, neshy">
    <meta name="og:title" content="LVM Roleplay">
    <meta name="og:description" content="Un servidor de GTA: San Andreas, creado con SA:MP">
    <meta name="og:image" content="https://images5.alphacoders.com/596/596248.jpg">
    <meta name="og:site_name" content="LVM">
    <meta name="og:locale" content="es_ES">
    <meta name="og:type" content="article">
    <meta name="og:author" content="Claude (iSrDxv)">
    <meta name="og:section" content="gta">
    <meta name="og:published_time" content="2023/12/1 02:28">

    <!-- Favicon Icon -->
    <link  rel="apple-touch-icon"  size="57x57"  href="{{ asset('apple-icon-57x57.png') }}"> 
    <link  rel="apple-touch-icon"  sizes="72x72"  href="{{ asset('apple-icon-72x72.png') }}"> 
    <link  rel="apple-touch-icon"  sizes="114x114"  href="{{ asset('apple-icon-114x114.png') }}"> 
    <link  rel="apple-touch-icon"  sizes="144x144"  href="{{ asset('apple-icon-114x114.png') }}"> 
    <link  rel="apple-touch-icon"  sizes="152x152"  href="{{ asset('apple-icon-152x152.png') }}"> 
    <link  rel="apple-touch-icon"  sizes="180x180"  href="{{ asset('apple-icon-180x180.png') }}"> 
    <link  rel="icon"  type= "image/png"  sizes="192x192"   href="{{ asset('android-icon-192x192.png') }}"> 
    <link  rel="icon"  type= "image/png"  sizes="32x32"  href="{{ asset('favicon-32x32.png') }}"> 
    <link  rel="icon"  type= "image/png"  sizes="96x96"  href="{{ asset('favicon-96x96.png') }}">
    <link  rel="icon"  tipo= "imagen/png"  sizes="16x16"  href="{{ asset('favicon-16x16.png') }}"> 
    <link  rel="manifest"  href= "/manifest.json"> 
    <meta  name="msapplication-TileColor"  content="#ffffff"> 
    <meta  name="msapplication-TileImage"  content="/ms-icon-144x144.png"> 
    <meta  name="theme-color"  content="#000000">

    <!-- Twitter Card -->
    <meta name="twitter:title" content="LVM Roleplay - SA:MP">
    <meta name="twitter:description" content="Un servidor de GTA: San Andreas, creado con SA:MP">
    <meta name="twitter:url" content="https://lvm-roleplay.xyz">
    <meta name="twitter:image:src" content="https://images5.alphacoders.com/596/596248.jpg">
    <meta name="twitter:image:alt" content="GTA: San Andreas">
    <meta name="twitter:creator" content="@lvm_roleplay">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <meta name="author" content="iSrDxv">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LVM') }} Roleplay</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Sans&family=Lato:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">

    @yield('head')

    <style type="text/css">
        #app {
            background-color: #f8fafc;
        }
        #logged-in {
            background-color: #000;
        }
    </style>
</head>
<body id="app">
    <div>
        <nav class="navbar navbar-expand-md navbar-light sticky-top bg-white border-bottom shadow-sm">
            <div class="container">
                <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none" href="{{ url('/') }}">
                    <object class="bi me-2" width="40" height="32" data="{{ asset('assets/devil.svg') }}"></object>
                    <span class="fs-4">{{ config('app.name', 'LVM') }} Roleplay</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item"><a href="{{route('home')}}" class="nav-link active" aria-current="page">Inicio</a></li>
                        @endauth
                        @endif
                        <li class="nav-item"><a href="{{route('cambios')}}" class="nav-link">Novedades</a></li>
                        <li class="nav-item"><a href="https://discord.com/invite/JUjMjFpz2r" class="nav-link">Discord</a></li>
                        <li style="background-color: #f28f0c;" class="rounded nav-item"><a href="{{route('tienda')}}" class="nav-link">Tienda</a></li>      
                        <li class="rounded nav-item"><a href="{{route('foro')}}" class="nav-link">Foro</a></li>
                        <li style="background-color: #34e718;" class="rounded nav-item"><a href="{{route('estado')}}" class="nav-link">Estado</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                     <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>
