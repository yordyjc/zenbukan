@extends('admin.layouts.app')

@section('title')
Usuarios inscritos
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
@endphp

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('title')</h5>
                <div class="card-header-right">
                    <a href="{{ url('/admin/inscritos/create') }}" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm"> <i class="icofont icofont-ui-add" style="color:#4680ff;"></i> Agregar inscrito</a>
                </div>
            </div>
            <div class="card-block">

                <div class="table-responsive">
                    <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Teléfono</th>
                                <th>E-mail</th>
                                <th>Dirección</th>
                                <th>Tipo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Anjanette Warns
                                            </h6>
                                            <p class="text-muted m-b-0">Inscrito el {{ Carbon::parse('2013-06-27T07:18:10-10:00')->format('d/m/Y h:i a') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    921892150
                                </td>
                                <td>
                                    contacto@scala.pe
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Crnel. Gregorio Albarracín
                                            </h6>
                                            <p class="text-muted m-b-0">
                                                Tacna, Tacna
                                            </p>
                                        </div>
                                    </div>
                                <td>
                                    <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Activo">Asiste normalmente</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/inscritos/historial') }}">
                                        <i class="icon feather icon-external-link f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Historial"></i>
                                    </a>
                                    <a href="{{ url('/admin/inscritos/edit') }}">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                    </a>

                                    <a href="#" onclick="eliminarModal(1)" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="¿Deja de asistir?"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Nathaniel Frink
                                            </h6>
                                            <p class="text-muted m-b-0">Inscrito el {{ Carbon::parse('2013-06-27T07:18:10-10:00')->format('d/m/Y h:i a') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    921892150
                                </td>
                                <td>
                                    contacto@scala.pe
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Crnel. Gregorio Albarracín
                                            </h6>
                                            <p class="text-muted m-b-0">
                                                Tacna, Tacna
                                            </p>
                                        </div>
                                    </div>
                                <td>
                                    <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Activo">Asiste normalmente</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/inscritos/edit') }}">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                    </a>

                                    <a href="#" onclick="eliminarModal(1)" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="¿Deja de asistir?"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Carmine Getz
                                            </h6>
                                            <p class="text-muted m-b-0">Inscrito el {{ Carbon::parse('2013-06-27T07:18:10-10:00')->format('d/m/Y h:i a') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    921892150
                                </td>
                                <td>
                                    contacto@scala.pe
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Crnel. Gregorio Albarracín
                                            </h6>
                                            <p class="text-muted m-b-0">
                                                Tacna, Tacna
                                            </p>
                                        </div>
                                    </div>
                                <td>
                                    <span class="label label-danger" data-toggle="tooltip" data-placement="left" data-original-title="Cuenta suspendida indefinidamente">Dejó de asistir</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/inscritos/edit') }}">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                    </a>

                                    <a href="#" onclick="eliminarModal(1)" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="¿Deja de asistir?"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Dante Naccari
                                            </h6>
                                            <p class="text-muted m-b-0">Inscrito el {{ Carbon::parse('2013-06-27T07:18:10-10:00')->format('d/m/Y h:i a') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    921892150
                                </td>
                                <td>
                                    contacto@scala.pe
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Crnel. Gregorio Albarracín
                                            </h6>
                                            <p class="text-muted m-b-0">
                                                Tacna, Tacna
                                            </p>
                                        </div>
                                    </div>
                                <td>
                                    <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Activo">Asiste normalmente</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/inscritos/edit') }}">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                    </a>

                                    <a href="#" onclick="eliminarModal(1)" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="¿Deja de asistir?"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Clay Fredeen
                                            </h6>
                                            <p class="text-muted m-b-0">Inscrito el {{ Carbon::parse('2013-06-27T07:18:10-10:00')->format('d/m/Y h:i a') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    921892150
                                </td>
                                <td>
                                    contacto@scala.pe
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Crnel. Gregorio Albarracín
                                            </h6>
                                            <p class="text-muted m-b-0">
                                                Tacna, Tacna
                                            </p>
                                        </div>
                                    </div>
                                <td>
                                    <span class="label label-danger" data-toggle="tooltip" data-placement="left" data-original-title="Cuenta suspendida indefinidamente">Dejó de asistir</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/inscritos/edit') }}">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                    </a>

                                    <a href="#" onclick="eliminarModal(1)" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="¿Deja de asistir?"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Zita Grubbs
                                            </h6>
                                            <p class="text-muted m-b-0">Inscrito el {{ Carbon::parse('2013-06-27T07:18:10-10:00')->format('d/m/Y h:i a') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    921892150
                                </td>
                                <td>
                                    contacto@scala.pe
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                Crnel. Gregorio Albarracín
                                            </h6>
                                            <p class="text-muted m-b-0">
                                                Tacna, Tacna
                                            </p>
                                        </div>
                                    </div>
                                <td>
                                    <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Activo">Asiste normalmente</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/inscritos/edit') }}">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                    </a>

                                    <a href="#" onclick="eliminarModal(1)" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="¿Deja de asistir?"></i>
                                    </a>
                                </td>
                            </tr>

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
                                                    <i class="icofont icofont-ui-delete"></i> Sí, banear usuario
                                                </button>
                                                <button class="btn btn-outline-primary btn-round" data-dismiss="modal">
                                                    <i class="icofont icofont-circled-left"></i> Cancelar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- @if (count($users)>0)
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                {{ $user->nombres }}, {{ $user->apellidos }}
                                            </h6>
                                            <p class="text-muted m-b-0">{{ Carbon::parse($user->created_at)->format('d/m/Y h:i a') }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    {{ $user->email }}
                                    @if ($user->confirmado==1)
                                        <i class="icon feather icon-check-circle f-w-600 f-16 m-r-15 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Correo confirmado"></i>
                                    @else
                                        <i class="icon feather icon-x-circle f-w-600 f-16 m-r-15 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="Correo sin confirmar"></i>
                                    @endif
                                    <p class="m-b-0">Cel: {{ $user->telefono }}</p>
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                {{ $user->distrito->nombre }}
                                            </h6>
                                            <p class="text-muted m-b-0">
                                                {{ $user->distrito->provincia->nombre }}, {{ $user->distrito->provincia->region->nombre }}
                                            </p>
                                        </div>
                                    </div>
                                <td>
                                    @if ($user->banneado==1)
                                    <span class="label label-danger" data-toggle="tooltip" data-placement="left" data-original-title="Cuenta suspendida indefinidamente">Baneado</span>
                                    @else
                                    <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Activo">Activo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/lista-usuario/'.$user->id.'/edit') }}">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                    </a>
                                    @if ($user->banneado==0)
                                    <a href="#" onclick="eliminarModal({{ $user->id }})" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="Banear usuario"></i>
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
                                                    <i class="icofont icofont-ui-delete"></i> Sí, banear usuario
                                                </button>
                                                <button class="btn btn-outline-primary btn-round" data-dismiss="modal">
                                                    <i class="icofont icofont-circled-left"></i> Cancelar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif --}}
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
