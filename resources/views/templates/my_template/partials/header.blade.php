<!DOCTYPE html>
<html lang="zxx">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>@yield('title')</title>
<link rel="apple-touch-icon" sizes="57x57" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('templates/my_template/assets/images/favicons/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ secure_asset('templates/my_template/assets/images/favicons/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('templates/my_template/assets/images/favicons/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ secure_asset('templates/my_template/assets/images/favicons/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('templates/my_template/assets/images/favicons/favicon-16x16.png') }}">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ secure_asset('templates/my_template/assets/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" href="{{ secure_asset('templates/my_template/assets/css/style.css') }}"/>
<link rel="stylesheet" href="{{ secure_asset('templates/my_template/assets/css/mobile.css') }}"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
    integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
</head>
<body>
    <!-- HEADER-SECTION -->
    <div class="home-header-section">
        <header class="header">
            <div class="main-header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a class="navbar-brand pt-0" href="{{ secure_url('/') }}"><img src="{{ secure_asset('templates/my_template/assets/images/redlight-logo.png') }}" alt="" class="img-fluid diverge-logo" /></a>
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        {{-- <li class="nav-item active"> --}}
                                        <li class="nav-item">
                                            <a class="nav-link text-decoration-none navbar-text-color home-margin-top" href="{{ secure_url('/') }}">Головна<span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-decoration-none navbar-text-color" href="{{ secure_url('/about') }}">О нас</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-decoration-none navbar-text-color" href="{{ secure_url('/services') }}">Послуги</a>
                                        </li>
                                        <li class="nav-item dropdown redlight-dropdown">
                                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Важливе</a>
                                                <div class="dropdown-menu dropdown-content-redlight">
                                                    <ul class="list-unstyled">
                                                        <li class="nav-item"> <a class="dropdown-item nav-link" href="{{ secure_url('/faq') }}">FAQs</a></li>
                                                        <li class="nav-item"> <a class="dropdown-item nav-link" href="{{ secure_url('/teams') }}">Team</a></li>
                                                        {{-- <li class="nav-item"> <a class="dropdown-item nav-link" href="{{ url('/testimonial') }}">Testimonials</a></li> --}}
                                                    </ul>
                                                 </div>
                                        </li>
                                        <li class="nav-item dropdown redlight-dropdown">
                                            <a class="nav-link" href="{{ route('cases_view.index') }}" id="navbarDropdown2" role="button"  aria-haspopup="true" aria-expanded="false">Кейси</a>
                                                <div class="dropdown-menu dropdown-content-redlight blogs-section-drop-down">
                                                    {{-- <ul class="list-unstyled">
                                                        <li class="nav-item"> <a class="dropdown-item fierce-menu nav-link" href="{{ url('/single-post') }}">Single Post</a></li>
                                                     </ul> --}}
                                                </div>
                                        </li>
                                        <li class="nav-item dropdown redlight-dropdown d-none">

                                            @if (Route::has('login'))
                                                @auth
                                                    <a href="{{ secure_url('/admin_panel') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                        Dashboard
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                        Log in
                                                    </a>

                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                            Register
                                                        </a>
                                                    @endif
                                                @endauth
                                        @endif


                                        </li>
                                    </ul>
                                    <div class="btn-talk ml-auto">
                                        <ul class="m-0 p-0">
                                            <li class="list-unstyled d-lg-inline-block"><a class="nav-link contact" href="{{ secure_url('/contact') }}">Зв'язок з нами</a></li>
                                        </ul>
                                    </div>
                                </div>
                    </nav>
                </div>
            </div>
        </header>
