@extends('juez.layouts.app')

@section('title')
    Torneos asignados
@endsection

@section('torneos')
active pcoded-trigger
@endsection

@section('ver-torneos')
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
                <div class="card-header-right">

                </div>
            </div>
            <div class="card-block">

                <div class="table-responsive">
                    <table id="zenbukanTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Categoria</th>
                                <th>Torneo</th>
                                <th>Fecha</th>
                                <th>Lugar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($modalidades)>0)
                                @foreach ($modalidades as $modalidad)
                                <tr>
                                    <td>
                                            Nro. {{ concatenar($modalidad->id) }}
                                    </td>
                                    <td>
                                        {{$modalidad->kata}} {{$modalidad->kumite}}
                                    </td>

                                    <td>{{$modalidad->torneo->nombre}}</td>

                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <div class="d-inline-block">
                                                <h6>
                                                    {{ Carbon::parse($modalidad->torneo->fecha)->format('d \d\e M. \d\e Y') }}
                                                </h6>
                                                <p class="text-muted m-b-0">{{ Carbon::parse($modalidad->torneo->hora)->format('h:i a')}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $modalidad->torneo->lugar }}
                                    </td>

                                    <td class="text-center">
                                        @if($modalidad->torneo->activo == 1)
                                        <a href="{{url('/juez/categorias/'.$modalidad->id)}}">
                                            <i class="icon feather icon-external-link f-w-600 f-16 m-r-15 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="ver "></i>
                                        </a>
                                        @else
                                        <span class="label label-danger" data-toggle="tooltip" data-placement="left" data-original-title="Las acciones estaran disponibles cuando el torneo inicie">Torneo no iniciado</span>
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
        $('#zenbukanTable').DataTable({
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
</script>
@endsection
