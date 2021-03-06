@extends('admin.layouts.app')

@section('title')
Usuarios
@endsection

@section('administradores')
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
                @if (Auth::user()->id==1||Auth::user()->id==2)
                <div class="card-header-right">
                    <a href="{{ url('/admin/lista-administrador/create') }}" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm"> <i class="icofont icofont-ui-add" style="color:#4680ff;"></i> Agregar Usuario</a>
                </div>
                @endif
            </div>
            <div class="card-block">

                <div class="table-responsive">
                    <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Correo electrónico</th>
                                <th>Teléfono</th>
                                <th>Club</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                @if (Auth::user()->id==1||Auth::user()->id==2)
                                <th>Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users)>0)
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->nombres }}, {{ $user->apellidos }}</td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->telefono }}
                                </td>
                                <td>
                                    {{$user->club->nombre}}
                                </td>
                                <td class="text-center">
                                    @if ($user->activo==0)
                                    <span class="label label-danger" data-toggle="tooltip" data-placement="left" data-original-title="Cuenta suspendida indefinidamente">Bloqueado</span>
                                    @else
                                    <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Administrador con permisos regulares">Activo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($user->tipo==1)
                                    <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Cuenta suspendida indefinidamente">Administrador</span>
                                    @elseif($user->tipo==2)
                                    <span class="label label-info" data-toggle="tooltip" data-placement="left" data-original-title="Administrador con permisos regulares">Incripciones</span>
                                    @else
                                    <span class="label label-warning" data-toggle="tooltip" data-placement="left" data-original-title="Administrador con permisos regulares">Juez</span>
                                    @endif
                                </td>
                                @if (Auth::user()->id==1||Auth::user()->id==2)
                                <td class="text-center">
                                    <a href="{{ url('/admin/lista-administrador/'.$user->id.'/edit') }}">
                                        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                    </a>
                                    @if ($user->activo==1 && $user->id!=2)
                                    <a href="#" onclick="eliminarModal({{ $user->id }})" data-toggle="modal" data-target="#eliminarModal">
                                        <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="Banear usuario"></i>
                                    </a>
                                    @endif
                                </td>
                                @endif
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
            "paging":    false,
            "info":      false,
            // "searching": false,
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
