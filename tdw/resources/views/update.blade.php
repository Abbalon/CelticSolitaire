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
            <li><a href="pages/gallery.html">Update</a></li>
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
      <form action="#" method="post">
                  <div class="one_third first">
                    <label for="name">Name <span>*</span></label>
                    <input type="text" name="name" id="name" value="" size="22">
                  </div>
                  <div class="one_third">
                    <label for="email">Mail <span>*</span></label>
                    <input type="text" name="email" id="email" value="" size="22">
                  </div>
                  <div class="one_third">
                    <label for="url">Website</label>
                    <input type="text" name="url" id="url" value="" size="22">
                  </div>
                  <div>
                    <input name="submit" type="submit" value="Submit Form">
                    &nbsp;
                    <input name="reset" type="reset" value="Reset Form">
                  </div>
                </form>
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ -->
      <!-- / main body -->

@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nick') ? ' has-error' : '' }}">
                            <label for="nick" class="col-md-4 control-label">Nick</label>

                            <div class="col-md-6">
                                <input id="nick" type="nick" class="form-control" name="nick" value="{{ old('nick') }}" required>

                                @if ($errors->has('nick'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
