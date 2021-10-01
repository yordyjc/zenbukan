<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('juez.includes.css')
    @include('juez.includes.data')
    <title>Combates | Zenbukan</title>
</head>
<body style="background:#fff">
<br>
<br>
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-block">
                    <a href="{{url('juez/categorias')}}">
                        <i class="icon feather icon-home f-50 f-w-600 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Regresar al inicio"></i>
                    </a>
                </div>
                <br>
                <div class="card" style="background:#000; color:#fff">
                    <div class="card-header offset-md-1">
                        <div class="row">
                            <div col-lg-2 col-md-2 col-sm-2>
                                <div class="card-block"><h3>{{$posicionkata->inscripcion->modalidad->kata}}</h3></div>

                            </div>
                            <div col-lg-2 col-md-2 col-sm-2>
                                <div class="card-block">
                                    <img src="{{$posicionkata->inscripcion->club->pais->bandera}}" width="40px"/>
                                </div>

                            </div>
                            <div col-lg-2 col-md-2 col-sm-2>
                                <div class="card-block">
                                    <h3>{{$posicionkata->inscripcion->club->pais->simbolo}}</h3>
                                </div>

                            </div>
                            <div col-lg-4 col-md-4 col-sm-4>
                                <div class="card-block">
                                    <h3>{{$posicionkata->inscripcion->competidor->apellidos}}, {{$posicionkata->inscripcion->competidor->nombres}}</h3>
                                </div>

                            </div>
                            <div class="offset-md-4"></div>
                            <div col-lg-2 col-md-2 col-sm-2>
                                <div class="card-block">
                                    @if($posicionkata->final != null)
                                    @switch($posicionkata->final)
                                        @case(1)
                                            <h3>Final</h3>
                                            @break
                                        @case(2)
                                            <h3>Semifinal 1</h3>
                                            @break
                                        @case(3)
                                            <h3>Semifinal 2</h3>
                                            @break
                                    @endswitch

                                    @else
                                    <h3>Ronda {{$posicionkata->ronda}}</h3>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-block offset-md-1">
                    <form action="{{url('/juez/categorias/calificacion/kata')}}" method="post" enctype="multipart/form-data">
                    <input type="text" name="orden" value="{{$posicionkata->orden}}">
                    <input type="hidden" name="modalidad" value="{{$posicionkata->modalidad_id}}">
                    <input type="text" name="ronda" value="{{$posicionkata->ronda}}">
                    <input type="text" name="grupo" value="{{$posicionkata->grupo}}">
                    <input type="text" name="final" value="{{$posicionkata->final}}">
                    <input type="hidden" name="ultGrupo" value="{{$ultGrupo}}">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="text-center"><h4>Nivel Técnico</h4></div>
                                <br>
                                    <div class="form-group {{ $errors->has('tecnico') ? ' has-danger' : '' }} row">
                                        <div class="col-md-6">
                                            <select class="form-control form-control-round {{ $errors->has('tecnico1') ? ' form-control-danger' : '' }}" id="tecnico1" name="tecnico1">
                                                <option value ="">Seleccione un valor</option>
                                                <option value =0>0</option>
                                                <option value =5>5</option>
                                                <option value =6>6</option>
                                                <option value =7>7</option>
                                                <option value =8>8</option>
                                                <option value =9>9</option>
                                                <option value =10>10</option>
                                            </select>
                                            @if ($errors->has('tecnico1'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico1') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-round {{ $errors->has('tecnico2') ? ' form-control-danger' : '' }}" id="tecnico2" name="tecnico2">
                                                    <option value ="">Seleccione un valor</option>
                                                    <option value =0>.0</option>
                                                    <option value =0.2> .2</option>
                                                    <option value =0.4> .4</option>
                                                    <option value =0.6> .6</option>
                                                    <option value =0.8> .8</option>
                                            </select>
                                            @if ($errors->has('tecnico2'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico2') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>


                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-5">
                                <div class="text-center"><h4>Nivel Atletico</h4></div>

                                <br>

                                    @csrf
                                    <input type="hidden" name="posicionkata_id" value={{$posicionkata->id}}>
                                    <div class="form-group {{ $errors->has('atletico') ? ' has-danger' : '' }} row">
                                        <div class="col-md-6">
                                            <select class="form-control form-control-round {{ $errors->has('atletico1') ? ' form-control-danger' : '' }}" id="atletico1" name="atletico1">
                                                <option value ="">Seleccione un valor</option>
                                                <option value =0>0</option>
                                                <option value =5>5</option>
                                                <option value =6>6</option>
                                                <option value =7>7</option>
                                                <option value =8>8</option>
                                                <option value =9>9</option>
                                                <option value =10>10</option>
                                            </select>
                                            @if ($errors->has('atletico1'))
                                            <div class="col-form-label">
                                                {{ $errors->first('atletico1') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                        <select class="form-control form-control-round {{ $errors->has('atletico2') ? ' form-control-danger' : '' }}" id="atletico2" name="atletico2">
                                            <option value ="">Seleccione un valor</option>
                                            <option value =0>.0</option>
                                            <option value =0.2> .2</option>
                                            <option value =0.4> .4</option>
                                            <option value =0.6> .6</option>
                                            <option value =0.8> .8</option>
                                        </select>
                                        @if ($errors->has('atletico2'))
                                        <div class="col-form-label">
                                            {{ $errors->first('atletico2') }}
                                        </div>
                                        @endif
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="col-sm-10 offset-sm-1">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary btn-round btn-block m-b-0">
                                        <i class="icofont icofont-save"></i> Calificar
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="reset" class="btn btn-outline-primary btn-round btn-block m-b-0">
                                        <i class="icofont icofont-refresh"></i> Limpiar
                                    </button>
                                </div>
                            </div>
                        </div><!-- /.col-sm-10 offset-sm-1 -->
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('juez.includes.js')
</body>
</html>
