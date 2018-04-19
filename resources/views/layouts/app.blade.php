<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/2Weekscss.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

@yield('css')
    <!-- Jquery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" ></script>
</head>
<body>

    <nav id="nav">
        <div id="nav-account">
            @guest
            @else
                <div id="nav-account-icon" style="background: #070025  url('{{ asset(Auth::user()->load('accounts_image')->accounts_image->avatar_url) }}')no-repeat 50% 50% / cover;"></div>
            @endguest
            <div id="nav-account-name">
                @guest
                    <a href="{{ route('login') }}">Connexion <br/> Inscription</a>
                @else
                    <a href="{{ route('user-page',['usr_login' => Auth::user()->login]) }}">{{ Auth::user()->first_name }} <br/> {{Auth::user()->last_name}}</a>
                @endguest
            </div>
        </div>
        <div id="nav-items-links" class="hidden-xs">
            @guest
            @else
                <a id="nav-exit" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
            <a href="{{ url('/simulation') }}">Simulation</a>
            <a href="{{ url('/selectTeam') }}">Equipes</a>
            <a href="#">Championnats</a>
            <a href="#">Home</a>
            <a id="nav-Logo" href="{{ url('/') }}">STATS&CO<span>&#169;</span></a>
        </div>
    </nav>

    {{--content--}}
    <div id="container">
        @yield('container')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
