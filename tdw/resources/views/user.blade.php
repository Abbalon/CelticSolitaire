@extends('layouts.app')

@section('option')
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="spacer">
    <nav id="mainav" class="clear">
      <ul class="clear">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a class="drop" href="#">Profile</a>
          <ul>
            <li><a href="/update">Update</a></li>
            <li><a href="pages/full-width.html">Delete</a></li>
          </ul>
        </li>
        <li><a class="drop" href="#">Play</a>
          <ul>
            <li><a href="#">New</a></li>
            <li><a href="#">Restore last</a>
        </ul>
    </nav>
  </div>
</div>
<!-- ################################################################################################ -->
@endsection

@section('content')
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="spacer">
    <main class="container clear">
      <div class="one_half first">
        <article>
          <h3 class="font-x1"><i class="fa fa-random"></i> &nbsp; Última puntuación</h3>
          <p class="nospace">Quisque mollis nisl a hendrerit eleifend cum sociis natoque penatibus et magneis dis parturient <a href="#">read more &raquo;</a></p>
        </article>
      </div>
      <div class="one_half">
        <article>
          <h3 class="font-x1"><i class="fa fa-angellist"></i> &nbsp; Mejores 5 puntuaciones</h3>
          <p class="nospace">Praesent vehicula ipsum erat at congue lorem placerat egestas nulla gravida vitae purus sit amet <a href="#">read more &raquo;</a></p>
        </article>
      </div>
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ -->
      <!-- / main body -->

@endsection
