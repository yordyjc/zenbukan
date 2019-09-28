@extends('admin.layouts.app')

@section('title')
Ficha de evaluación Nro. {{ concatenar($ficha->correlativo) }}
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
            <div class="card-header text-center">
                <h3>@yield('title')</h3>
            </div>
            <div class="card-block">

                <div class="row">
                    <div class="col-sm-12">
                        <center><img class="img-perfil img-radius align-top" src="{{ $ficha->usuario->foto ? $ficha->usuario->foto : '/resources/img/user/default.png' }}" width="150px" height="150px"></center>
                        <br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        @if ($ficha->usuario)
                            <dl class="dl-horizontal row mt-2">
                            <dt class="col-sm-3">Inscrito</dt>
                            <dd class="col-sm-9">
                                {{ $ficha->usuario->nombres }} {{ $ficha->usuario->apellidos }}
                                @if ($ficha->usuario->activo == 1)
                                <span class="label label-success">Asiste</span>
                                @else
                                <span class="label label-danger">Dejó de asistir</span>
                                @endif
                            </dd>
                            <dd class="col-sm-9 offset-sm-3">
                                <span class="label label-warning">
                                Interesado en
                                @switch($ficha->usuario->interes)
                                    @case(1)
                                        Perder peso
                                        @break
                                    @case(2)
                                        Tonificar
                                        @break
                                    @case(3)
                                        Musculación
                                        @break
                                    @case(4)
                                        Competencia
                                        @break
                                    @default
                                        Otro
                                @endswitch
                                </span>
                            </dd>

                            <dt class="col-sm-3">Registro</dt>
                            <dd class="col-sm-9">{{ Carbon::parse($ficha->usuario->created_at)->format('d \d\e M. \d\e Y') }}</dd>
                            <dd class="col-sm-9 offset-sm-3 text-muted">({{ Carbon::parse($ficha->usuario->created_at)->diffForHumans(null, false, false, 2) }})</dd>

                            <dt class="col-sm-3">Sexo</dt>
                            <dd class="col-sm-9">{{ $ficha->usuario->sexo == 1 ? 'Masculino' : 'Femenino' }}</dd>

                            <dt class="col-sm-3">E-mail</dt>
                            <dd class="col-sm-9">{{ $ficha->usuario->email }}</dd>

                            <dt class="col-sm-3">Celular</dt>
                            <dd class="col-sm-9">{{ $ficha->usuario->telefono }}</dd>

                            <dt class="col-sm-3">Sector</dt>
                            <dd class="col-sm-9">{{ $ficha->usuario->sector->sector }}</dd>

                            @if ($ficha->usuario->direccion)
                            <dt class="col-sm-3">Dirección</dt>
                            <dd class="col-sm-9">{{ $ficha->usuario->direcion }}</dd>
                            @endif

                            @if ($ficha->usuario->nacimiento)
                            <dt class="col-sm-3">Cumpleaños</dt>
                            <dd class="col-sm-9">{{ Carbon::parse($ficha->usuario->nacimiento)->format('d \d\e M. \d\e Y') }}</dd>
                            <dd class="col-sm-9 offset-sm-3 text-muted">(Nació {{ Carbon::parse($ficha->usuario->nacimiento)->diffForHumans(null, false, false, 1) }})</dd>
                            @elseif($ficha->usuario->edad)
                            <dt class="col-sm-3">Edad</dt>
                            <dd class="col-sm-9">{{ Carbon::parse($ficha->usuario->edad)->format('d \d\e M. \d\e Y') }}</dd>
                            @endif

                            @if ($ficha->usuario->enfermedad)
                            <dt class="col-sm-3">Enfermedad</dt>
                            <dd class="col-sm-9">{{ $ficha->usuario->enfermedad }}</dd>
                            @endif

                            @if ($ficha->usuario->observaciones && $ficha->usuario->observaciones != '<p><br /></p>' )
                            <dt class="col-sm-3">Obs.</dt>
                            <dd class="col-sm-9">{!! $ficha->usuario->observaciones !!}</dd>
                            @endif

                        </dl>
                        @endif
                    </div>

                    <div class="col-sm-6 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Periodos de evaluación</th>
                                </tr>
                                <th>N°</th>
                                <th>Fecha</th>
                                <th>Monitoreo</th>
                                <th>Examen físico</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ $periodo->numero }}</td>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>
                                            @switch($periodo->check_monitoreo)
                                                @case(0)
                                                    <i class="icon feather icon-x-circle f-w-600 f-20 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="No realizado"></i>
                                                    @break

                                                @case(1)
                                                    <i class="icon feather icon-check-circle f-w-600 f-20 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Realizado"></i>
                                                    @break

                                                @default
                                                    <i class="icon feather icon-help-circle f-w-600 f-20 text-c-yellow" data-toggle="tooltip" data-placement="left" data-original-title="Incompleto"></i>
                                            @endswitch
                                            </td>
                                            <td>
                                            @switch($periodo->check_fisico)
                                                @case(0)
                                                    <i class="icon feather icon-x-circle f-w-600 f-20 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="No realizado"></i>
                                                    @break

                                                @case(1)
                                                    <i class="icon feather icon-check-circle f-w-600 f-20 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Realizado"></i>
                                                    @break

                                                @default
                                                    <i class="icon feather icon-help-circle f-w-600 f-20 text-c-yellow" data-toggle="tooltip" data-placement="left" data-original-title="Incompleto"></i>
                                            @endswitch
                                            </td>
                                            <td>
                                                <a href="{{ url('/admin/periodos/'.$periodo->id.'/edit') }}">
                                                    <i class="icon feather icon-edit-2 f-w-500 f-20 m-l-5 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5">Aún no hay periodos registrados</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <a href="{{ url('/admin/crear-periodo/'.$ficha->correlativo) }}" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-block mt-2">
                                    <i class="icofont icofont-plus"></i> Agregar periodo
                                </a>
                            </div>
                        </div>
                    </div>

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
