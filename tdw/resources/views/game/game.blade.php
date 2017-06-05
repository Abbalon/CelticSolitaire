@extends('layouts.app')

@section('content')

<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="spacer">
    <main class="container clear">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <div class="sidebar one_quarter first">
        <!-- ################################################################################################ -->

        <form id="sidePanel">
            <p class="font-x1" id="score"></p>

            <form id="countdown">
                <h3 id="ctdown"></h3>
            </form>

            <form id="variant">
                <h4>Game Variant</h4>
                Central Space <input type="radio" name="variant" value="central" checked><br>
                Random Space <input type="radio" name="variant" value="random">
            </form>


            <form id="timer">
                <h4>Timer</h4>
                <p> Hour : Mins : Secs </p>
                <input type="text" id="hours" class="clock" value="" maxlength="2"> :
                <input type="text" id="minutes" class="clock" value="" maxlength="2"> :
                <input type="text" id="seconds" class="clock" value="" maxlength="2">
            </form>
        </form>

        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <div class="content three_quarter">
        <!-- ################################################################################################ -->

        <div id="playSpace">
                  <div id="sq1"></div>
                  <div id="sq2"></div>
                  <div id="sq3"></div>
                  <div id="sq4"></div>
                  <div id="sq5"></div>
              </div>

        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ -->

<script src= "{{ asset('js/Game.js') }}"></script>

@endsection
