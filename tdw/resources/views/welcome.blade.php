<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Celtic Solitaire</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>-->
    </head>
    <body id="top" class="bgded fixed" style="background-image:url({{ asset('images/Stonehenge_BackGround.jpg') }});">

      <div class="wrapper row0">
        <div id="topbar" class="clear">
          <!-- ################################################################################################ -->
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
            @if (Route::has('login'))
            <ul class="faico clear">
              @if (Auth::check())
                <li><a href="{{ url('/home') }}" title="Home"><i class="fa fa-home"></i></a></li>
              @else
                <li><a href="{{ url('/login') }}" title="Login"><i class="fa fa-sign-in"></i></a></li>
                <li><a href="{{ url('/register') }}" title="Register"><i class="fa fa-user-plus"></i></a></li>
              @endif
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
            <!-- ################################################################################################ -->
            <div id="logo" class="fl_left">
                <h1><a href="/">Celtic Solitaire</a></h1>
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
            <!-- ################################################################################################ -->
          </header>
        </div>
      </div>
      <!-- ################################################################################################ -->


    </body>
</html>
