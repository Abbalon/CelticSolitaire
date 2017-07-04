@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper row3">
            <div class="spacer">
                <!-- ################################################################################################ -->
                <div class="wrapper row0">
                    <div id="topbar" class="clear spacer">
                        <div class="fl_left">
                            <h1 class="font-x2"><a href="">Update data</a></h1>
                        </div>
                    </div>
                </div>
                <!-- ################################################################################################ -->
                <main class="container clear">
                    <!-- ################################################################################################ -->
                    <!-- main body -->
                    <!-- ################################################################################################ -->

                    <form name="formUpdate" class="form-horizontal" role="form" method="POST"
                          action="javascript:updateUser(document.formUpdate);">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put"/>

                        <div class="content">
                            <!-- ################################################################################################ -->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="group">
                                    <div class="one_quarter first">
                                        <label for="name" class="control-label">Name</label>
                                    </div>
                                    <div class="three_quarter">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" autofocus>

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
                                               value="{{ old('nick') }}" autofocus>

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
                                               value="{{ old('email') }}" autofocus>

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
                            <div class="form-group{{ $errors->has('telf') ? ' has-error' : '' }}">

                                <div class="group">
                                    <div class="one_quarter first">
                                        <label for="telf" class="control-label">Teléfono</label>
                                    </div>
                                    <div class="three_quarter">
                                        <input id="telf" type="telf" class="form-control" name="telf">

                                        @if ($errors->has('telf'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('telf') }}</strong>
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
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- ################################################################################################ -->

                            <div class="one_half right">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
