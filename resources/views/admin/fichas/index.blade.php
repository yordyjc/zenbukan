@extends('admin.layouts.app')

@section('title')
Fichas de evaluación
@endsection

@section('fichas')
active pcoded-trigger
@endsection

@section('lista-fichas')
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
                    <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Ficha de evaluación</th>
                                <th>Nombres y Apellidos</th>
                                <th>Periodos de evaluación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($inscritos)>0)
                            @foreach ($inscritos as $inscrito)
                            <tr>
                                <td>
                                    @foreach ($inscrito->fichas as $ficha)
                                        Nro. {{ concatenar($ficha->correlativo) }}
                                    @endforeach
                                </td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6>
                                                {{ $inscrito->nombres }} {{ $inscrito->apellidos }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($inscrito->fichas as $ficha)
                                        @if (count($ficha->periodos)>0)
                                        <ol>
                                            @foreach ($ficha->periodos as $periodo)
                                            <li>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</li>
                                            @endforeach
                                        </ol>
                                        @else
                                        Aún no hay periodos
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center">

                                    <a href="{{ url('/admin/simulacion/'.$ficha->correlativo) }}">
                                        <i class="icon feather icon-activity f-w-600 f-16 m-r-15 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="Ver historial de periodos"></i>
                                    </a>

                                    <a href="{{ url('/admin/ver-ficha/'.$ficha->correlativo) }}">
                                        <i class="icon feather icon-external-link f-w-600 f-16 m-r-15 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Ver ficha de evaluación"></i>
                                    </a>

                                    <a href="{{ url('/admin/crear-periodo/'.$ficha->correlativo) }}">
                                        <i class="icon feather icon-plus-circle f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Agregar periodo"></i>
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
                                                <p>Cuando un usuario deja de asistir ya no se pueden crear evaluaciones nuevas y su ficha no puede ser modificada hasta que vuelva a asistir.</p>
                                                <p>Esta acción no podrá deshacerse. ¿Quieres continuar?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger btn-round">
                                                    <i class="icofont icofont-ui-delete"></i> Sí, el usuario ya no asiste
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
