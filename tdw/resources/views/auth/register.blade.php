@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper row3">
            <div class="spacer">
                <!-- ################################################################################################ -->
                <div class="wrapper row0">
                    <div id="topbar" class="clear spacer">
                        <div class="fl_left">
                            <h1><a href="">Register</a></h1>
                        </div>
                    </div>
                </div>
                <!-- ################################################################################################ -->
                <main class="container clear">
                    <!-- ################################################################################################ -->
                    <!-- main body -->
                    <!-- ################################################################################################ -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <div class="content">
                            <!-- ################################################################################################ -->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="group">
                                    <div class="one_quarter first">
                                        <label for="name" class="control-label">Name</label>
                                    </div>
                                    <div class="three_quarter">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- ################################################################################################ -->
                            <!-- ################################################################################################ -->
                            <div class="form-group{{ $errors->has('nick') ? ' has-error' : '' }}">

                                <div class="group">
                                    <div class="one_quarter first">
                                        <label for="nick" class="control-label">Nick</label>
                                    </div>
                                    <div class="three_quarter">
                                        <input id="nick" type="text" class="form-control" name="nick"
                                               value="{{ old('nick') }}" required autofocus>

                                        @if ($errors->has('nick'))
                                            <span class="help-block">
                                          <strong>{{ $errors->first('nick') }}</strong>
                                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- ################################################################################################ -->
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
                            <!-- ################################################################################################ -->
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="group">
                                    <div class="one_quarter first">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <div class="three_quarter">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- ################################################################################################ -->
                            <!-- ################################################################################################ -->
                            <div class="form-group">

                                <div class="group">
                                    <div class="one_quarter first">
                                        <label for="password-confirm" class="control-label">Confirm Password</label>
                                    </div>
                                    <div class="three_quarter">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- ################################################################################################ -->
                            <div class="two_third">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
