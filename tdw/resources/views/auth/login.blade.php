@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper row3">
        <div class="spacer">
            <!-- ################################################################################################ -->
            <div class="wrapper row0">
                <div id="topbar" class="clear spacer">
                    <div class="fl_left">
                        <h1><a href="">Login</a></h1>
                    </div>
                </div>
            </div>
            <!-- ################################################################################################ -->
            <main class="container clear">
                <!-- ################################################################################################ -->
                <!-- main body -->
                <!-- ################################################################################################ -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="content">
                        <!-- ################################################################################################ -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="group">
                                <div class="one_quarter first">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                </div>
                                <div class="three_quarter">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- ################################################################################################ -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="group">
                                <div class="one_quarter first">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <div class="three_quarter">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- ################################################################################################ -->
                        <div class="group demo form-group">
                            <div class="one_quarter first">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="two_third">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>

                        <!-- ################################################################################################ -->
                    </div>
                </form>
                <!-- ################################################################################################ -->
            </main>
        </div>
    </div>
</div>
@endsection
