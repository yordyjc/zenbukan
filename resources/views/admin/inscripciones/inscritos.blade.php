@extends('admin.layouts.app')

@section('title')
Inscritos
@endsection

@section('inscritos')
active pcoded-trigger
@endsection

@section('lista-inscritos')
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
                                <th>Ficha de evaluación</th>
                                <th>Registrado por</th>
                                <th>Nombres y Apellidos</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($inscritos->count()>0)
                            @foreach ($inscritos as $inscrito)
                            <tr>
                                <td>
                                    Nro. {{ concatenar($inscrito->id) }}
                                </td>
                                <td>
                                    {{$inscrito->anfitrion->nombres}} {{$inscrito->anfitrion->apellidos}}
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                {{ $inscrito->competidor->nombres }} {{ $inscrito->competidor->apellidos }}
                                            </h6>
                                            <p class="text-muted m-b-0">Inscrito el {{ Carbon::parse($inscrito->created_at)->format('d/m/Y h:i a') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{$inscrito->modalidad->kata}} {{$inscrito->modalidad->kumite}}
                                </td>
                                <td>
                                    @if ($inscrito->estado == 1)
                                        <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Participante confirmado">Inscrito</span>
                                    @else
                                        <span class="label label-danger" data-toggle="tooltip" data-placement="left" data-original-title="Dejo de asistir">Pendiente</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(Auth::user()->tipo == 1)
                                    <a href="#" onclick="aprobarModal({{ $inscrito->id }})" data-toggle="modal" data-target="#aprobarModal">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Confirmar inscripción"></i>
                                    </a>
                                    @endif
                                    <a href="#" onclick="eliminarModal({{ $inscrito->id }})" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="Eliminar inscripción"></i>
                                    </a>

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
                                                <p>Cuando se elimina la inscripción se borra el registro definitivamente</p>
                                                <p>Esta acción no podrá deshacerse. ¿Quieres continuar?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger btn-round">
                                                    <i class="icofont icofont-ui-delete"></i> Sí, eliminar inscripción
                                                </button>
                                                <button class="btn btn-outline-primary btn-round" data-dismiss="modal">
                                                    <i class="icofont icofont-circled-left"></i> Cancelar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="aprobarModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Confirmar?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST" id="form-modal1">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <p>Es necesario confirmar la inscripción para que pueda participar del torneo</p>
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label" for="estado">
                                                        ¿Aprobar inscripción?
                                                    </label>
                                                    <div class="col-md-8 form-radio">
                                                        <div class="radio radio-inline">
                                                            <label>
                                                            <input type="radio" name="estado" id="estado1" value="1" checked='checked'>
                                                            <i class="helper"></i>Si
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                            <input type="radio" name="estado" id="estado2" value="0">
                                                            <i class="helper"></i>No
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger btn-round">
                                                    <i class="icofont icofont-ui-delete"></i> Aceptar
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

    function aprobarModal(id){
        var formModal=$("#form-modal1");
        var url=location.origin;
        var path=location.pathname
        formModal.attr('action',url+path+'/'+id);
        var radiobutton1 = $('estado1');
        var radiobutton2 = $('estado2');
    }
</script>
@endsection
