@extends('layouts.adminLayout')

@section('option')
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="spacer">
    <nav id="mainav" class="clear">
      <ul class="clear">
        <li class="active"><a href="/admin">Home</a></li>
        <li><a id="validate" >Validate</a></li>
        <li><a id="top10">Top 10</a></li>
        <li><a class="drop" href="#">Crud</a>
          <ul>
            <li><a class="drop" href="#">Users</a>
              <ul>
                <li><a id="userSelect">Select</a></li>
                <li><a href="/update">Update</a></li>
                <li><a href="">Delete</a></li>
              </ul>
            </li>
            <li><a class="drop" href="#">game</a>
              <ul>
                <li><a href="">Select</a></li>
                <li><a href="/update">Update</a></li>
                <li><a href="">Delete</a></li>
              </ul>
            </li>
        </ul>
      </li>
    </ul>
    </nav>
  </div>
</div>
<!-- ################################################################################################ -->
@endsection

@section('content')
<!-- ################################################################################################ -->
<div id="adminRow3" class="wrapper row3">
  <div class="spacer">
    <main class="container clear">
      <div id="options" class="content">

      </div>
      <div id="feetDiv" class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ -->
      <!-- / main body -->

@endsection
