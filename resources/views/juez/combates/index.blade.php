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
@php
function siguiente($c, $combates)
{
    $siguiente = $combates->where('posicion', $c->posicion+1);
    //$r= $siguiente->inscripcion_id;
    echo $siguiente;
}
@endphp
<body style="background:#fff">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header col-md-10 offset-md-1">
                        <h3 class="text-center">{{$torneo->nombre}} {{$modalidad->kata}} {{$modalidad->kumite}}</h3>
                        <div class="card-header-right">
                            <h3>Ronda: {{$combates->first()->ronda}}</h3>
                        </div>
                    </div>
                    <div class="card-block offset-md-1">

                        @if($combates->count() > 0)
                            @foreach($combates as $combate)
                                @if(($combate->posicion % 2) == 1)
                                <div class="row">
                                    <div class="col-md-1 col-sm-1 col-1">
                                        @if($combate->inscripcion_id !=0)
                                            <img src="{{$combate->inscripcion->competidor->club->pais->bandera}}" alt="" width="55px">
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if($combate->inscripcion_id !=0)
                                            <div class="btn btn-outline-primary btn-block">{{$combate->inscripcion->competidor->nombres}}</div>
                                        @else
                                        <div class="btn btn-outline-primary btn-block">Robot</div>
                                        @endif

                                    </div>
                                    <div class="col-md-1">
                                        <h4 class="text-center">VS</h4>
                                    </div>

                                @else

                                    <div class="col-md-1">
                                        @if($combate->inscripcion_id !=0)
                                            <img src="{{$combate->inscripcion->competidor->club->pais->bandera}}" alt="" width="55px">
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if($combate->inscripcion_id !=0)
                                            <div class="btn btn-outline-danger btn-block">{{$combate->inscripcion->competidor->nombres}}</div>
                                        @else
                                            <div class="btn btn-outline-danger btn-block">-</div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <div class="btn-group">
                                            <a class="btn btn-secondary btn-round" href="{{url('juez/kata/'.$combate->inscripcion_id)}}">Kata</a>
                                            <button class="btn btn-success btn-round">Kumite</button>
                                        </div>

                                    </div>
                                    </div>
                                    <br>
                                @endif

                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('juez.includes.js')
</body>
</html>
