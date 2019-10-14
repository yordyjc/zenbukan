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
                            <dd class="col-sm-9">{{ $ficha->usuario->direccion }}</dd>
                            @endif

                            @if ($ficha->usuario->nacimiento)
                            <dt class="col-sm-3">Cumpleaños</dt>
                            <dd class="col-sm-9">{{ Carbon::parse($ficha->usuario->nacimiento)->format('d \d\e M. \d\e Y') }}</dd>
                            <dd class="col-sm-9 offset-sm-3 text-muted">(Tiene {{ Carbon::parse($ficha->usuario->nacimiento)->age }} años)</dd>
                            @elseif($ficha->usuario->edad)
                            <dt class="col-sm-3">Edad</dt>
                            <dd class="col-sm-9">{{ $ficha->usuario->edad }} años</dd>
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
                            <div class="col-md-6">
                                <a href="{{ url('/admin/crear-periodo/'.$ficha->correlativo) }}" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-block mt-2">
                                    <i class="icofont icofont-plus"></i> Agregar periodo
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/admin/simulacion/'.$ficha->correlativo) }}" class="btn waves-effect waves-light btn-danger btn-outline-danger btn-block mt-2">
                                    <i class="icon feather icon-activity"></i> Ver situación actual
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header text-center">
                <h3>Datos históricos</h3>
            </div>
            <div class="card-block">

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Peso</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->peso }} Kg.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_peso" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Grasa corporal</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->grasa }} %</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_grasa" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header text-center">
                <h3>Monitoreo</h3>
            </div>
            <div class="card-block">

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Pecho</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->pecho }} cm.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_pecho" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Espalda</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->espalda }} cm.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_espalda" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Hombros</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->hombros }} cm.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_hombros" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Bíceps</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->biceps }} cm.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_biceps" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Cintura</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->cintura }} cm.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_cintura" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Glúteos</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->gluteos }} cm.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_gluteos" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Pierna</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->pierna }} cm.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_pierna" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Pantorrilla</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->pantorrilla }} cm.</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_pantorrilla" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header text-center">
                <h3>Examen médico</h3>
            </div>
            <div class="card-block">

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Planchas</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->planchas }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_planchas" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Sentadillas</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->sentadillas }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_sentadillas" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

                <div class="row m-b-50">
                    <div class="col-sm-4 table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">Abdominales</th>
                                </tr>
                                <th>Periodo</th>
                                <th>Medida</th>
                            </thead>
                            <tbody>
                                @if (count($ficha->periodos)>0)
                                    @foreach ($ficha->periodos as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->abdominales }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="2">Sin datos</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <div id="chart_abdominales" style="width: 100%; height: 250px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>

    //////////////////////////////////////////////////////////
    //PESO
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawPeso);

    function drawPeso() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Peso'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->peso }}],
            @endforeach
        ]);

        var options = {
            // title: 'Peso',
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Peso en Kg.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#01579b']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_peso'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //GRASA
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawGrasa);

    function drawGrasa() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Grasa'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->grasa }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Grasa en %.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#0277bd']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_grasa'));
        chart.draw(data, options);
    }


    //////////////////////////////////////////////////////////
    //PECHO
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawPecho);

    function drawPecho() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Pecho'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->pecho }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Pecho en cm.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#01579b']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_pecho'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //ESPALDA
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawEspalda);

    function drawEspalda() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Espalda'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->espalda }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Espalda en cm.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#0277bd']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_espalda'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //HOMBROS
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawHombros);

    function drawHombros() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Hombros'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->hombros }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Hombros en cm.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#0288d1']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_hombros'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //BICEPS
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawBiceps);

    function drawBiceps() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Bíceps'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->biceps }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Bíceps en cm.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#039be5']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_biceps'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //CINTURA
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawCintura);

    function drawCintura() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Cintura'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->cintura }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Cintura en cm.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#03a9f4']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_cintura'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //GLUTEOS
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawGluteos);

    function drawGluteos() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Glúteos'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->gluteos }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Glúteos en cm.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#29b6f6']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_gluteos'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //PIERNA
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawPierna);

    function drawPierna() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Pierna'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->pierna }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Pierna en cm.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#4fc3f7']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_pierna'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //PANTORRILLA
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawPantorrilla);

    function drawPantorrilla() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Pantorrilla'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->pantorrilla }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Pantorrilla en cm.',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#81d4fa']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_pantorrilla'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //PLANCHAS
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawPlanchas);

    function drawPlanchas() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Planchas'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->planchas }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Cantidad de Planchas',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#01579b']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_planchas'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //Sentadillas
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawSentadillas);

    function drawSentadillas() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Sentadillas'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->sentadillas }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Cantidad de sentadillas',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#0277bd']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_sentadillas'));
        chart.draw(data, options);
    }

    //////////////////////////////////////////////////////////
    //HOMBROS
    //////////////////////////////////////////////////////////
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawAbdominales);

    function drawAbdominales() {
        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Abdominales'],
            @foreach ($ficha->periodos as $periodo)
                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->abdominales }}],
            @endforeach
        ]);

        var options = {
            chartArea: { width: '65%' },
            hAxis: {
                title: 'Cantidad de abdominales',
                legend: { position: 'top', maxLines: 1 },
                minValue: 0,
            },
            vAxis: {
                title: 'Periodos'
            },
            colors: ['#0288d1']
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_abdominales'));
        chart.draw(data, options);
    }





</script>
@endsection
