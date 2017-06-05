@extends('layouts.app')

@section('content')
<div class="wrapper twoCols">

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    {{ Auth::user()->name }}
                  </div>

                  <div class="panel-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      Perfil usuario
                                    </div>

                                    <div class="panel-body">
                                        Cuerpo perfil usuario
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      Ir al juego
                                    </div>

                                    <div class="panel-body">
                                        Imagen del juego
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
