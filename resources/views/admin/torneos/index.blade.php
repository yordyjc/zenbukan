@extends('admin.layouts.app')

@section('title')
Torneos
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
                <div class="card-header-right">
                    <a href="{{ url('/admin/torneos/create') }}" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm"> <i class="icofont icofont-ui-add" style="color:#4680ff;"></i> Agregar Torneo</a>
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
                                <th>Inscripciones</th>
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
                                        <td>
                                            {{ Carbon::parse($torneo->fecha)->format('d \d\e M. \d\e Y') }}
                                            <p>{{ Carbon::parse($torneo->hora)->format('h:i a')}}</p>
                                        </td>
                                        <td class="text-center">
                                            @if ($torneo->inscripciones == 1)
                                                <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Inscripciones abiertas">Abiertas</span>
                                            @else
                                                <span class="label label-danger" data-toggle="tooltip" data-placement="left" data-original-title="Inscripciones cerradas">Cerradas</span>
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            <a href="{{ url('/admin/agregar-modalidades/'.$torneo->id) }}">
                                                <i class="icon feather icon-tag f-w-600 f-16 m-r-15 text-c-yellow" data-toggle="tooltip" data-placement="left" data-original-title="Ver y/o Agregar modalidades"></i>
                                            </a>
                                            @if(count($torneo->modalidades)>0)
                                            <a href="{{ url('/admin/modalidades/'.$torneo->id) }}">
                                                <i class="icon feather icon-user-plus f-w-600 f-16 m-r-15 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Gestionar jueces"></i>
                                            </a>
                                            @endif
                                            <a href="{{ url('/admin/torneos/'.$torneo->id.'/edit') }}">
                                                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar información"></i>
                                            </a>
                                            @if ($torneo->estado==1)
                                            <a href="#" onclick="eliminarModal({{ $torneo->id }})" data-toggle="modal" data-target="#eliminarModal">
                                                <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="¿Deja de asistir?"></i>
                                            </a>
                                            @endif

                                        </td>
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
