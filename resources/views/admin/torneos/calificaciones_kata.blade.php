@extends('admin.layouts.app')

@section('title')
Resultados de Cat.
@endsection

@section('torneos')
active pcoded-trigger
@endsection

@section('lista-torneos')
active
@endsection

@section('content')
@php
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
Use App\Models\Calificacioneskata;
setlocale(LC_TIME, 'es_ES.UTF-8');
Carbon::setLocale('es');

function concatenar($numero){
    $n=strlen($numero);
    if ($n==1) {
        $a='0000'.$numero;
    }
    else if ($n==2) {
        $a='000'.$numero;
    }
    else if ($n==3) {
        $a='00'.$numero;
    }
    else if ($n==4) {
        $a='0'.$numero;
    }
    else{
        $a=$numero;
    }
    return $a;
}
function ordenar($id)
{
    $ordenado=Calificacioneskata::where('posicioneskata_id',$id)->orderBy('puntajeTecnico','asc')->get();
    return $ordenado;
}
function promTec($puntajes)
{
    $sum=0;
    foreach($puntajes as $puntaje)
    {
        $sum=$sum+$puntaje->puntajeTecnico;
    }
    return $res=$sum*0.7;

}
function promAth($puntajes)
{
    $sum=0;
    foreach($puntajes as $puntaje)
    {
        $sum=$sum+$puntaje->puntajeAtletico;
    }
    return $res=$sum*0.3;
}
@endphp

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('title')</h5>

            </div>
            <div class="card-block">

                <div class="table-responsive">
                    <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Nombres</th>
                                <th>Club</th>
                                <th>Ronda</th>
                                <th>Grupo</th>
                                <th>Nivel</th>
                                <th>Puntajes</th>
                                <th>Peso</th>
                                <th>Res. Parcial</th>
                                <th>Res. Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($posiciones)>0)
                                @foreach ($posiciones as $posicion)
                                    <tr>
                                        <td>
                                            Nro. {{ concatenar($posicion->id) }}
                                        </td>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <div class="d-inline-block">
                                                    <h6>
                                                        <img src="{{$posicion->inscripcion->club->pais->bandera}}" alt="" width="25px">  {{$posicion->inscripcion->competidor->nombres }} {{ $posicion->inscripcion->competidor->apellidos }}
                                                        <p>({{$posicion->inscripcion->club->pais->nombre}}, {{$posicion->inscripcion->club->pais->simbolo}}) </p>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{$posicion->inscripcion->club->nombre}}
                                        </td>
                                        <td>{{$posicion->ronda}}</td>
                                        <td>{{$posicion->grupo}}</td>
                                        <td >
                                            <div class="row col-md-12">TEC</div>
                                            <div class="row col-md-12">ATH</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row col-md-12">
                                                @if(count($posicion->puntajes))
                                                    @foreach(ordenar($posicion->id) as $puntajes)
                                                        {{$puntajes->puntajeTecnico}}&nbsp;&nbsp;
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="row col-md-12">
                                                @if(count($posicion->puntajes))
                                                    @foreach($posicion->puntajes as $puntajes)
                                                        {{$puntajes->puntajeAtletico}}&nbsp;&nbsp;
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row col-md-12">*0.7</div>
                                            <div class="row col-md-12">*0.3</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row col-md-12">
                                                {{promTec($posicion->puntajes)}}
                                            </div>
                                            <div class="row col-md-12">{{promAth($posicion->puntajes)}}</div>
                                        </td>
                                        <td class="text-center"><strong><h4>{{promTec($posicion->puntajes) + promAth($posicion->puntajes)}}</h4></strong></td>
                                    </tr>
                                @endforeach

                                <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">¡Alto!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="POST" id="form-modal">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Esta acción no podrá deshacerse. ¿Quieres continuar?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger btn-round">
                                                        <i class="icofont icofont-ui-delete"></i> Sí
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-round" data-dismiss="modal">
                                                        <i class="icofont icofont-circled-left"></i> Cancelar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready( function () {
        $('#fitnessTable').DataTable({
            // "paging":    false,
            //"info":      false,
            // "searching": false,
            "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
            "language": {
                "lengthMenu": "Mostrar  _MENU_  registros por página",
                "zeroRecords": "Ningún registro encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "Sin registros",
                "infoFiltered": "(búsqueda realizada en _MAX_  registros)",
                "search": "Buscar: ",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            },
            "order":[]
        });
    });
    function eliminarModal(id){
        var formModal=$("#form-modal");
        var url=location.origin;
        var path=location.pathname
        formModal.attr('action',url+path+'/'+id);
    }
</script>
@endsection
