@extends('admin.layouts.app')

@section('title')
Pre-inscritos
@endsection

@section('preinscripciones')
active
@endsection

@section('content')
@php
    use Carbon\Carbon;
    setlocale(LC_TIME, 'es_ES.UTF-8');
    Carbon::setLocale('es');
@endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('title')</h5>
                <div class="card-header-right">
                    <a href="{{ url('/admin/pre-inscritos-contactados') }}" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm"> <i class="icofont icofont-ui-add" style="color:#4680ff;"></i> Ver personas contactadas</a>
                </div>
            </div>
            <div class="card-block">

                @if (count($preinscritos)>0)

                <div class="table-responsive">
                    <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th class="text-center">Celular</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Plan</th>
                                <th class="text-center">Fecha de solicitud</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preinscritos as $preinscrito)

                            <tr>
                                <td>{{ $preinscrito->nombre }}</td>
                                <td class="text-center">{{ $preinscrito->celular }}</td>
                                <td class="text-center">{{ $preinscrito->email }}</td>
                                <td class="text-center">{{ $preinscrito->plan }}</td>
                                <td class="text-center">
                                    {{ Carbon::parse($preinscrito->created_at)->format('d \d\e M, Y') }}
                                </td>
                                <td class="text-center">
                                    <a href="#" onclick="eliminarModal({{ $preinscrito->id }})" data-toggle="modal" data-target="#eliminarModal">
                                            <i class="feather icon-check-circle f-w-600 f-16 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Marcar como contactado"></i>
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
                                                <p>Esta acción no podrá deshacerse. ¿Quieres continuar?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success btn-round">
                                                    <i class="icofont icofont-ui-check"></i> Sí, marcar como contactado
                                                </button>
                                                <button class="btn btn-outline-primary btn-round" data-dismiss="modal">
                                                    <i class="icofont icofont-circled-left"></i> Cancelar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>
                </div>
                @else
                <h3>No hay más personas que soliciten información</h3>
                @endif

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
            "info":      false,
            // "searching": false,
            "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
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
