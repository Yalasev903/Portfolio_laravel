<!DOCTYPE html>
<html lang="zxx">
     <head>
          <meta charset="UTF-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>@yield('title')</title>
          <meta name="csrf-token" content="{{ csrf_token() }}">
      
          <!-- SEO -->
          <meta name="description" content="@yield('description', 'Професійний програміст дизайнер із досвідом Laravel, PHP, Figma, JS.')">
          <link rel="canonical" href="{{ url()->current() }}">
      
          <!-- Open Graph / Facebook / Telegram / Viber -->
          <meta property="og:type" content="website" />
          <meta property="og:title" content="@yield('title')" />
          <meta property="og:description" content="@yield('description', 'Я професійний програміст дизайнер з досвідом у Figma, HTML5, CSS3, Bootstrap, Javascript, PHP, WordPress, MySQL та Laravel.')" />
          <meta property="og:image" content="{{ asset('templates/my_template/assets/images/about-team-img2.png') }}" />
          <meta property="og:image:alt" content="Професійний програміст-дизайнер" />
          <meta property="og:url" content="{{ url()->current() }}" />
          <meta property="og:site_name" content="Portfolio" />
      
          <!-- Twitter -->
          <meta name="twitter:card" content="summary_large_image" />
          <meta name="twitter:title" content="@yield('title')" />
          <meta name="twitter:description" content="@yield('description', 'Я професійний програміст дизайнер з досвідом у Figma, HTML5, CSS3, Bootstrap, Javascript, PHP, WordPress, MySQL та Laravel.')" />
          <meta name="twitter:image" content="{{ asset('templates/my_template/assets/images/about-team-img2.png') }}" />
          <meta name="twitter:image:alt" content="Професійний програміст-дизайнер" />
      
          <!-- Favicon -->
          <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('templates/my_template/assets/images/favicons/apple-icon-180x180.png') }}">
          <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('templates/my_template/assets/images/favicons/favicon-32x32.png') }}">
          <link rel="manifest" href="/manifest.json">
          <meta name="theme-color" content="#ffffff">
      
          <!-- Styles -->
          <link rel="stylesheet" href="{{ asset('templates/my_template/assets/css/bootstrap.min.css') }}"/>
          <link rel="stylesheet" href="{{ asset('templates/my_template/assets/css/style.css') }}"/>
          <link rel="stylesheet" href="{{ asset('templates/my_template/assets/css/mobile.css') }}"/>
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
                        <a class="navbar-brand pt-0" href="{{ url('/') }}"><img src="{{ asset('templates/my_template/assets/images/redlight-logo.png') }}" alt="" class="img-fluid diverge-logo" /></a>
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
                                            <a class="nav-link text-decoration-none navbar-text-color home-margin-top" href="{{ url('/') }}">Головна<span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-decoration-none navbar-text-color" href="{{ url('/about') }}">О нас</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-decoration-none navbar-text-color" href="{{ url('/services') }}">Послуги</a>
                                        </li>
                                        <li class="nav-item dropdown redlight-dropdown">
                                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Важливе</a>
                                                <div class="dropdown-menu dropdown-content-redlight">
                                                    <ul class="list-unstyled">
                                                        <li class="nav-item"> <a class="dropdown-item nav-link" href="{{ url('/faq') }}">FAQs</a></li>
                                                        <li class="nav-item"> <a class="dropdown-item nav-link" href="{{ url('/teams') }}">Team</a></li>
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
                                                    <a href="{{ url('/admin_panel') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
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
                                            <li class="list-unstyled d-lg-inline-block"><a class="nav-link contact" href="{{ url('/contact') }}">Зв'язок з нами</a></li>
                                        </ul>
                                    </div>
                                </div>
                    </nav>
                </div>
            </div>
        </header>
