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


</head>
<body id="top" class="bgded fixed" style="background-image:url({{ asset('images/Stonehenge_BackGround.jpg') }});">
<!-- ################################################################################################ -->
              <div class="wrapper row0">
                <div id="topbar" class="clear">
                  <div class="fl_left">
                    <ul class="faico clear">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                  </div>

                  <div class="fl_right">
                    <ul class="faico clear">
                      <li><a href="{{ url('/') }}" title="Home"><i class="fa fa-home"></i></a></li>
                        <!-- Authentication Links -->
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

        @yield('option')

        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>window.jQuery ||
      document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
    </script>
    <script src="{{ asset('js/plugins.js') }}"></script>

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
