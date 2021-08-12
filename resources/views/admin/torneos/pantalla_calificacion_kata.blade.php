<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.include.css')
    @include('admin.include.data')
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
                            <div col-lg-12 col-md-12 col-sm-12>
                                <div class="card-block"><h3>{{$posicionkata->inscripcion->modalidad->kata}}</h3></div>

                            </div>

                        </div>

                    </div>
                    <div class="card-block offset-md-1">

                        <div class="row">
                            <div class="col-md-4" style="background:firebrick;">
                                holas
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div col-lg-12 col-md-12 col-sm-12>
                                        <div class="card-block">
                                            <h3>{{$posicionkata->inscripcion->competidor->apellidos}}, {{$posicionkata->inscripcion->competidor->nombres}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div col-lg-6 col-md-6 col-sm-6>
                                        <div class="card-block">
                                            <img src="{{$posicionkata->inscripcion->club->pais->bandera}}" width="40px"/>
                                        </div>
                                    </div>
                                    <div col-lg-6 col-md-6 col-sm-6>
                                        <div class="card-block">
                                            <h3>{{$posicionkata->inscripcion->club->pais->nombre}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div col-lg-12 col-md-12 col-sm-12>
                                        <div class="card-block">
                                            <h3>{{$posicionkata->inscripcion->club->nombre}}</h3>
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
    @include('admin.include.js')
</body>
</html>
