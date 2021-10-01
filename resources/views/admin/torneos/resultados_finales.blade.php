@extends('admin.layouts.app')

@section('title')
Resultados finales
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
@endphp

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('title')</h5>

            </div>
            <div class="card-block">

                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Club</th>
                                <th>Puntaje final</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($campeones)>0)
                                @foreach($campeones as $posicion)
                                <tr>
                                    <td>
                                    {{$posicion->inscripcion->competidor->nombres }} {{ $posicion->inscripcion->competidor->apellidos }}
                                    <p>({{$posicion->inscripcion->club->pais->nombre}}, {{$posicion->inscripcion->club->pais->simbolo}})</p>
                                    </td>

                                    <td>{{$posicion->inscripcion->club->nombre}}</td>
                                    <td>{{$posicion->puntajefinal}}</td>
                                    <td>
                                        @if($posicion->final==1)
                                        <i class="feather icon-award f-w-600 f-18" style="color:#FFBF00"></i> <span class="label label-warning">Oro</span>
                                        @else
                                        <i class="feather icon-award f-w-600 f-18" style="color:#d6d6d6"></i> <span class="label label-default">Plata</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
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
