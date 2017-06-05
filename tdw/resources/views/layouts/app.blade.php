<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Celtic Solitaire') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFont.css') }}">

    <!-- JS -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('js/Model.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body id="top" class="bgded fixed" style="background-image:url({{ asset('images/Stonehenge_BackGround.jpg') }});">
<!-- ################################################################################################ -->
<div class="wrapper row0">
    <div id="topbar" class="clear">
        <div class="fl_left">
            <ul class="faico clear">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>

        <div class="fl_right">
            <ul class="faico clear">
              @if (!Auth::guest())
                <li><a href="/user?id={{ Auth::user()->id }}" title="Home"><i class="fa fa-home"></i></a></li>
              @else
                <li><a href="/" title="Home"><i class="fa fa-home"></i></a></li>
              @endif
                <!-- Authentication Links  -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" title="Login"><i class="fa fa-sign-in"></i></a></li>
                    <li><a href="{{ url('/register') }}" title="Register"><i class="fa fa-user-plus"></i></a></li>
                @else
                    <li><a href="{{ route('logout') }}" title="Logout" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
            </ul>
            @endif
        </div>
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
    <div class="spacer">
        <header id="header" class="clear">
            <div id="logo" class="fl_left">
                <h1><a href="index.html">Celtic Solitaire
                        @if (!Auth::guest())
                            - {{ Auth::user()->name }}
                        @endif
                    </a></h1>
            </div>
            <div class="fl_right">
                <form class="clear" method="post" action="#">
                    <fieldset>
                        <legend>Search:</legend>
                        <input type="text" value="" placeholder="Search Here">
                        <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
                    </fieldset>
                </form>
            </div>
        </header>
    </div>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
    <div class="spacer">
        <nav id="mainav" class="clear">
            <ul class="clear">
              @if (!Auth::guest())
                @if(Auth::User()->isAdmin == 1)
                  <li class="active"><a href="/admin">Home</a></li>
                @else
                  <li class="active"><a href="/user?id={{ Auth::user()->id }}">Home</a></li>
                @endif
                <li><a class="drop" href="#">Profile</a>
                    <ul>
                        <li><a href="/update?id={{ Auth::user()->id }}">Update</a></li>
                        <li><a href="javascript:dropUser({{ Auth::user()->id }});">Delete</a></li>
                    </ul>
                </li>
                <li><a class="drop" href="#">Play</a>
                    <ul id="menuPlay">
                        <li><a href="/game" onclick="javascript:newGame({{ Auth::user()->id }})">New</a></li>
                        <li><a onclick="javascript:saveGame({{ Auth::user()->id }})">Save</a></li>
                        <li><a href="#">Restore last</a></li>
                    </ul>
                </li>
              @else
                <li class="active"><a href="/">Home</a></li>
              @endif
            </ul>
        </nav>
    </div>
</div>
<!-- ################################################################################################ -->

@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="{{ asset('js/userFuntions.js') }}"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
