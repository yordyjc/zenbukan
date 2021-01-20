@extends('admin.layouts.app')

@section('title')
Torneos vigentes
@endsection

@section('inscritos')
active pcoded-trigger
@endsection

@section('lista-torneos-vigentes')
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
                    <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Nombre</th>
                                <th>Lugar</th>
                                <th>Fecha del torneo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($torneos)>0)
                                @foreach ($torneos as $torneo)
                                <tr>
                                    <td>
                                            Nro. {{ concatenar($torneo->id) }}
                                    </td>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <div class="d-inline-block">
                                                <h6>
                                                    {{ $torneo->nombre }}
                                                </h6>
                                                <p class="text-muted m-b-0">creado el {{ Carbon::parse($torneo->created_at)->format('d/m/Y h:i a') }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $torneo->lugar }}
                                    </td>
                                    <td>{{ Carbon::parse($torneo->fecha)->format('d/m/Y h:i a') }}</td>
                                    <td class="text-center">

                                        <a href="{{ url('/admin/inscripciones/nuevo/'.$torneo->id)}}">
                                            <i class="icon feather icon-user-plus f-w-600 f-16 m-r-15 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Agregar competidores"></i>
                                        </a>
                                        <a href="{{url('/admin/inscripciones/inscritos/'.$torneo->id)}}">
                                            <i class="icon feather icon-external-link f-w-600 f-16 m-r-15 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Lista de competidores"></i>
                                        </a>
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
</script>
@endsection
