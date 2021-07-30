@extends('juez.layouts.app')

@section('title')
    Grupos de la categoria
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
                <div class="alert alert-info background-info text-center">
                    <h5 id="titulo">Categoria {{$ultGrupo->modalidad->kata}}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Grupo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=1;$i<=$ultGrupo->grupo;$i++)
                                <tr>
                                    <td>Grupo nº {{$i}}</td>
                                    <td>
                                        <a href="{{url('/juez/categorias/calificacion/kata/'.$ultGrupo->modalidad_id.'/'.$i)}}">
                                            <i class="icon feather icon-external-link f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="ver grupos de Kata"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endfor
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
