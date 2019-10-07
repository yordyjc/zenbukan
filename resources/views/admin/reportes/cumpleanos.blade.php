@extends('admin.layouts.app')

@section('title')
Reporte de cumpleaños por mes
@endsection

@section('reportes')
active pcoded-trigger
@endsection

@section('cumpleanos-mes')
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

                <div class="col-sm-10 offset-sm-1">
                    <form action="{{ url('/admin/cumpleanos-mes') }}" method="post" class="form-inline">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="mes" class="col-form-label">Mes: </label>
                                    <select name="mes" class="form-control input-sm">
                                        <option value="">Seleccione</option>
                                        <option value="1" {{ $mes == '1' ? 'selected' : '' }}>Enero</option>
                                        <option value="2" {{ $mes == '2' ? 'selected' : '' }}>Febrero</option>
                                        <option value="3" {{ $mes == '3' ? 'selected' : '' }}>Marzo</option>
                                        <option value="4" {{ $mes == '4' ? 'selected' : '' }}>Abril</option>
                                        <option value="5" {{ $mes == '5' ? 'selected' : '' }}>Mayo</option>
                                        <option value="6" {{ $mes == '6' ? 'selected' : '' }}>Junio</option>
                                        <option value="7" {{ $mes == '7' ? 'selected' : '' }}>Julio</option>
                                        <option value="8" {{ $mes == '8' ? 'selected' : '' }}>Agosto</option>
                                        <option value="9" {{ $mes == '9' ? 'selected' : '' }}>Setiembre</option>
                                        <option value="10" {{ $mes == '10' ? 'selected' : '' }}>Octubre</option>
                                        <option value="11" {{ $mes == '11' ? 'selected' : '' }}>Noviembre</option>
                                        <option value="12" {{ $mes == '12' ? 'selected' : '' }}>Diciembre</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" style="margin-top: 36px;">
                                    <button id="button-submit" class="btn btn-primary btn-sm ml-2">
                                        Generar
                                    </button>
                                    <a href="" class="descarga btn btn-success btn-sm ml-2">Excel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <br />
                <div class="alert alert-info background-info">
                    <h5>Hay {{ count($inscritos) }} registros en este reporte</h5>
                </div>
                <div class="table-responsive">
                    <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Ficha de evaluación</th>
                                <th>Nombres y Apellidos</th>
                                <th>Cumpleaños</th>
                                <th>Contacto</th>
                                <th>Sector</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($inscritos)>0)
                            @foreach ($inscritos as $inscrito)
                            <tr>
                                <td>
                                    @foreach ($inscrito->fichas as $ficha)
                                        Nro. {{ concatenar($ficha->correlativo) }}
                                        <a href="{{ url('/admin/ver-ficha/'.$ficha->correlativo) }}">
                                        <i class="icon feather icon-external-link f-w-600 f-16 m-r-15 text-c-green" data-toggle="tooltip" data-placement="left" data-original-title="Ver ficha de evaluación"></i>
                                    </a>
                                    @endforeach
                                </td>
                                <td>{{ $inscrito->nombres }} {{ $inscrito->apellidos }}</td>
                                <td class="text-center">
                                    Cumple {{ Carbon::parse($ficha->usuario->nacimiento)->age+1 }} años el <strong>{{ Carbon::parse($inscrito->nacimiento)->format('d \d\e M.') }}</strong>
                                </td>
                                <td>
                                    {{ $inscrito->telefono }}
                                    <br />
                                    {{ $inscrito->email }}
                                </td>
                                <td class="text-center">{{ $inscrito->sector->sector }}</td>

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
            "paging":    false,
            "info":      false,
            "searching": false,
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
