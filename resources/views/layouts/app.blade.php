<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Museum/MuseumHeaderStyle/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Museum/AdminFields/adminbars.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Museum/Links/animationlink.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Museum/MuseumHeaderStyle/header.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>

<header>
    <div id="main" class="duplicate">
        <ul class="nav ul-header">

            <li class="li-header">
                <a class="link-header" href="{{ url('/') }}" title="Домой">
                  <span class="icon-stack">
                    <i class="fas fa-home"></i>

                  </span>
                    <span class="text">Домой</span>
                </a>
            </li>

            <li class="li-header">
                <a class="link-header" href="{{ route('museum.about') }}" title="О нас">
                  <span class="icon-stack">
                    <i class="fas fa-book-open"></i>

                  </span>
                    <span class="text">О нас</span>
                </a>
            </li>

            <li class="li-header">
                <a class="link-header" href="{{ url('/') }}" title="Новости">
                  <span class="icon-stack">
                    <i class="fas fa-newspaper"></i>

                  </span>
                    <span class="text">Новости</span>
                </a>
            </li>

            <li class="li-header">
                <a class="link-header" href="{{route('contact')}}" title="Связь">
                  <span class="icon-stack">
                    <i class="fas fa-phone"></i>
                  </span>
                    <span class="text">Связь</span>
                </a>
            </li>


            <li class="li-header">
                @if(Auth::check())
                    <a class="link-header" href="/museum/posts" title="Экспонаты">
                      <span class="icon-stack">
                        <i class="fab fa-medium"></i>
                      </span>
                        <span class="text">Экспонаты</span>
                    </a>
                @endif
            </li>



        </ul>
    </div>
    <div id="stickyContent"></div>







        {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel museum-navbar">--}}
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel museum-navbar">
            <div class="container">


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link navbar-museum-style-text" style="color:#d3cbce" href="{{ route('login') }}"><i class="fas fa-user-circle"></i> {{__('Войти')}}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link navbar-museum-style-text" style="color:#d3cbce" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{__('Регистрация')}}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}  <span class="caret"></span>
                                </a>


                                @if(Auth::check())
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Выйти') }}
                                        </a>
                                        @if( Auth::user()->role === 'admin')
                                            <a class="dropdown-item" href="/admin/museum/posts"><i class="fas fa-clipboard"></i> Статьи</a>
                                            <a class="dropdown-item" href="/admin/museum/categories"><i class="fas fa-layer-group"></i> Категории</a>
                                            <a class="dropdown-item" href="{{route('museum.admin.users.index')}}"><i class="fas fa-users"></i> Пользователи</a>
                                            <a class="dropdown-item" href="{{route('museum.admin.contact.edit', 1)}}"><i class="fas fa-phone"></i> Связь</a>
                                            <a class="dropdown-item" href="{{route('museum.admin.partners.index')}}"><i class="fas fa-handshake"></i> Партнеры</a>
                                            <a class="dropdown-item" href="{{route('museum.admin.about.edit', 1)}}"><i class="fas fa-book-open"></i> О нас</a>
                                            <a class="dropdown-item" href="{{route('museum.admin.event.index')}}"><i class="fas fa-bullhorn"></i> События</a>
                                            <a class="dropdown-item" href="{{route('museum.admin.tour.index')}}"><i class="fas fa-atlas"></i> Экскурсии</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            <i class="fas fa-address-card fa-1x"></i> {{ __('Профиль') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endif
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
    </nav>
</header>

        {{--</nav>--}}

        <main class="py-4">
            @yield('content')
        </main>

<footer>

    <div class="footer">
        <div id="button"></div>
        <div id="container" >
            <div id="cont">
                <div class="footer_center">
                    <h3 class="text-white">Design by SSAU 2019.</h3>
                </div>
            </div>
        </div>
    </div>

</footer>

</body>
</html>

<script>

    document.getElementById('stickyContent').innerHTML = document.getElementById('main').innerHTML;

</script>
