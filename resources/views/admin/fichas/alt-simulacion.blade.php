<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Estado actual - Fitness 10</title>

    <link rel="stylesheet" href="{{ asset('/resources/admin/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/admin/bower_components/owl.carousel/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('/resources/admin/bower_components/owl.carousel/css/owl.theme.default.css') }}" />
    <link rel="stylesheet" href="{{ asset('/resources/admin/bower_components/font-awesome/css/font-awesome.min.css') }}" />

    {!! Html::style('resources/lib/chartist/chartist.min.css') !!}

    <style>
        .principal{
            background-image: url('{{ asset('/resources/img/bg-body.jpg') }}');
            background-size: cover;
            background-position: top center;
            background-repeat: no-repeat;
        }
        header { padding: 30px 0px; }
        .header .navbar { background-color: transparent !important; }
        .sub-title { font-size: 32px; color: white; }
        .dl-horizontal dt { color: #f2cb05; }
        .owl-prev {
            background-color: inherit !important;
            color: #FFF !important;
            position: absolute;
            top: calc(40%);
            left: -25px;
        }
        .owl-next {
            background-color: inherit !important;
            color: #FFF !important;
            position: absolute;
            top: calc(40%);
            right: -25px;
        }
        .ct-series-a .ct-line {
            stroke: #f2cb05;
            stroke-width: 5px;
        }
        .ct-series-a .ct-point {
            stroke: #f2cb05;
            stroke-width: 15px;
        }
        .ct-series-a .ct-label {
            stroke: #f2cb05;
            font-size: 14px;
        }
        .ct-labels span { color: #4c5ec8; }
        .ct-grid{ stroke: #4c5ec8;}
        .ct-axis-title { stroke: #f2cb05;  }
        .ct-line.ct-threshold-1, .ct-point.ct-threshold-1, .ct-bar.ct-threshold-1 { stroke: #7FBF13; }
        .ct-line.ct-threshold-0, .ct-point.ct-threshold-0, .ct-bar.ct-threshold-0 { stroke: #F8BD1B; }
        .ct-line.ct-threshold-2, .ct-point.ct-threshold-2, .ct-bar.ct-threshold-2 { stroke: #FD8A17; }
        .ct-line.ct-threshold-3, .ct-point.ct-threshold-3, .ct-bar.ct-threshold-3 { stroke: #DD2912; }
    </style>
</head>
<body class="principal">
@php
use Carbon\Carbon;
setlocale(LC_TIME, 'es_ES.UTF-8');
Carbon::setLocale('es');
@endphp
    <header>
        <div class="container">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('resources/img/user/logo.png') }}" width="30" height="30" class="d-inline-block align-top bg-transparent" alt="">
                    Fitness10
                </a>
            </nav>
        </div>
    </header>

    <div class="container">

        <div class="row">
            <div class="col-md-6">hola</div>
            <div class="col-md-6">
                <div class="owl-carousel">
                    <div>
                        <div class="row">
                            <div class="col-sm-2 offset-sm-5">
                                <center><img class="img-fluid" src="{{ $ficha->usuario->foto ? $ficha->usuario->foto : '/resources/img/user/default.png' }}"></center>
                                <br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="color: white;">
                                @if ($ficha->usuario)
                                <dl class="dl-horizontal row mt-2">
                                    <dt class="col-sm-3">Inscrito</dt>
                                    <dd class="col-sm-9">
                                        {{ $ficha->usuario->nombres }} {{ $ficha->usuario->apellidos }}
                                        @if ($ficha->usuario->activo == 1)
                                        <span class="badge badge-success">Asiste</span>
                                        @else
                                        <span class="badge badge-danger">Dejó de asistir</span>
                                        @endif
                                    </dd>
                                    <dd class="col-sm-9 offset-sm-3">
                                        <span class="badge badge-warning">
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
                                    <dd class="col-sm-9">{{ Carbon::parse($ficha->usuario->created_at)->format('d \d\e M. \d\e Y') }} <span class="text-muted">({{ Carbon::parse($ficha->usuario->created_at)->diffForHumans(null, false, false, 2) }})</span></dd>

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
                                    <dd class="col-sm-9">{{ Carbon::parse($ficha->usuario->nacimiento)->format('d \d\e M. \d\e Y') }} <span class="text-muted">(Tiene {{ Carbon::parse($ficha->usuario->nacimiento)->age }} años)</span></dd>
                                    @elseif($ficha->usuario->edad)
                                    <dt class="col-sm-3">Edad</dt>
                                    <dd class="col-sm-9">{{ $ficha->usuario->edad }} años</dd>
                                    @endif

                                    @if ($ficha->usuario->enfermedad)
                                    <dt class="col-sm-3">Enfermedad</dt>
                                    <dd class="col-sm-9">{{ $ficha->usuario->enfermedad }}</dd>
                                    @endif

                                </dl>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">IMC</h5>
                        <div class="ct-chart ct-golden-section" id="imc"></div>
                        <table class="table table-bordered" style="font-size: 12px;">
                            <tr class="text-center">
                                <td style="background-color: #F8BD1B;">
                                    Delgadez
                                </td>
                                <td style="background-color: #7FBF13;">
                                    Normal
                                </td>
                                <td style="background-color: #FD8A17;">
                                    Sobrepeso
                                </td>
                                <td style="background-color: #DD2912;">
                                    Obesidad Grado I
                                </td>
                                <td style="background-color: #DD2912;">
                                    Obesidad Grado II
                                </td>
                                <td style="background-color: #DD2912;">
                                    Obesidad Grado III
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td style="background-color: #F8BD1B;">
                                    Menos de 18.5
                                </td>
                                <td style="background-color: #7FBF13;">
                                    18.5 - 24.9
                                </td>
                                <td style="background-color: #FD8A17;">
                                    25 - 29.9
                                </td>
                                <td style="background-color: #DD2912;">
                                    30 - 34.9
                                </td>
                                <td style="background-color: #DD2912;">
                                    35 - 39.9
                                </td>
                                <td style="background-color: #DD2912;">
                                    Más de 40
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Nivel de proteína</h5>
                        <table class="table bordered table-light">
                            <thead>
                                <th>Periodo</th>
                                <th>Peso</th>
                                <th>Nivel mínimo</th>
                                <th>Nivel máximo</th>
                            </thead>
                            <tbody>
                                @if (count($periodos)>0)
                                    @foreach ($periodos->reverse() as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->peso }} Kg.</td>
                                            <td class="text-center">{{ round($periodo->peso*0.013,2) }}</td>
                                            <td class="text-center">{{ round($periodo->peso*0.015,2) }}</td>
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
                    <div>
                        <h5 class="sub-title text-center">Nivel de agua</h5>
                        <table class="table bordered table-light">
                            <thead>
                                <th>Periodo</th>
                                <th>Peso</th>
                                <th>Cantidad</th>
                            </thead>
                            <tbody>
                                @if (count($periodos)>0)
                                    @foreach ($periodos->reverse() as $periodo)
                                        <tr>
                                            <td>{{ Carbon::parse($periodo->fecha)->format('d \d\e M. \d\e Y') }}</td>
                                            <td>{{ $periodo->peso }} Kg.</td>
                                            <td class="text-center">{{ round($periodo->peso*0.035,2) }} litros</td>
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
                    <div>
                        <h5 class="sub-title text-center">Peso</h5>
                        <div class="ct-chart ct-golden-section" id="peso"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Grasa</h5>
                        <div class="ct-chart ct-golden-section" id="grasa"></div>
                    </div>
                    {{-- Monitoreo --}}
                    <div>
                        <h5 class="sub-title text-center">Pecho</h5>
                        <div class="ct-chart ct-golden-section" id="pecho"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Espalda</h5>
                        <div class="ct-chart ct-golden-section" id="espalda"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Hombros</h5>
                        <div class="ct-chart ct-golden-section" id="hombros"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Bíceps</h5>
                        <div class="ct-chart ct-golden-section" id="biceps"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Cintura</h5>
                        <div class="ct-chart ct-golden-section" id="cintura"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Glúteos</h5>
                        <div class="ct-chart ct-golden-section" id="gluteos"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Pierna</h5>
                        <div class="ct-chart ct-golden-section" id="pierna"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Pantorrilla</h5>
                        <div class="ct-chart ct-golden-section" id="pantorrilla"></div>
                    </div>
                    {{-- Examen medico --}}
                    <div>
                        <h5 class="sub-title text-center">Planchas</h5>
                        <div class="ct-chart ct-golden-section" id="planchas"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Sentadillas</h5>
                        <div class="ct-chart ct-golden-section" id="sentadillas"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Abdominales</h5>
                        <div class="ct-chart ct-golden-section" id="abdominales"></div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

{!! Html::script('resources/admin/bower_components/jquery/js/jquery.min.js') !!}
{!! Html::script('resources/admin/bower_components/owl.carousel/js/owl.carousel.min.js') !!}

{!! Html::script('resources/lib/chartist/chartist.min.js') !!}
{!! Html::script('resources/lib/chartist/chartist-plugin-pointlabels.min.js') !!}
{!! Html::script('resources/lib/chartist/chartist-plugin-axistitle.min.js') !!}
{!! Html::script('resources/lib/chartist/chartist-plugin-multithreshold.min.js') !!}

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:30,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:false,
            dots: false,
            nav:true,
            navText : ["<i class='fa fa-2x fa-chevron-left'></i>","<i class='fa fa-2x fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded',function(){
    /******************************************************
    * IMC
    ******************************************************/
    new Chartist.Line('#imc', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ round($periodo->peso/($periodo->talla*$periodo->talla),2) }},
        @endforeach
        ]]
    }, {
        showArea: false,
        low: 10,
        high: 50,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: true,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'IMC',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            }),
            Chartist.plugins.ctMultiThreshold({
                threshold: [18.50, 25, 30]
            })
        ]
    });
    /******************************************************
    * PESO
    ******************************************************/
    new Chartist.Line('#peso', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->peso }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Peso (Kg)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * GRASA
    ******************************************************/
    new Chartist.Line('#grasa', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->grasa }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Grasa (%)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * PECHO
    ******************************************************/
    new Chartist.Line('#pecho', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->pecho }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Medida (cm)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * ESPALDA
    ******************************************************/
    new Chartist.Line('#espalda', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->espalda }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Medida (cm)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * HOMBROS
    ******************************************************/
    new Chartist.Line('#hombros', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->hombros }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Medida (cm)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * BICEPS
    ******************************************************/
    new Chartist.Line('#biceps', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->biceps }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Medida (cm)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * CINTURA
    ******************************************************/
    new Chartist.Line('#cintura', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->cintura }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Medida (cm)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * GLUTEOS
    ******************************************************/
    new Chartist.Line('#gluteos', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->gluteos }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Medida (cm)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * PIERNA
    ******************************************************/
    new Chartist.Line('#pierna', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->pierna }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Medida (cm)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * PANTORRILLA
    ******************************************************/
    new Chartist.Line('#pantorrilla', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->pantorrilla }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Medida (cm)',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * PLANCHAS
    ******************************************************/
    new Chartist.Line('#planchas', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->planchas }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Cantidad',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * SENTADILLAS
    ******************************************************/
    new Chartist.Line('#sentadillas', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->sentadillas }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Cantidad',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

    /******************************************************
    * ABDOMINALES
    ******************************************************/
    new Chartist.Line('#abdominales', {
        labels: [
        @foreach ($periodos->reverse() as $periodo)
            "{{ Carbon::parse($periodo->fecha)->format('M/y') }}",
        @endforeach
        ],

        series: [[
        @foreach ($periodos->reverse() as $periodo)
            {{ $periodo->abdominales }},
        @endforeach
        ]]
    }, {
        low: 0,
        showArea: false,
        fullWidth: true,
        chartPadding: {
            top: 40,
            bottom: 40,
            left: 20,
            right: 20,
        },
        lineSmooth: false,
        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctPointLabels({
                textAnchor: 'middle'
            }),
            Chartist.plugins.ctAxisTitle({
                axisX: {
                    axisTitle: 'Periodo',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: 40
                    },
                    textAnchor: 'middle',
                },
                axisY: {
                    axisTitle: 'Cantidad',
                    axisClass: 'ct-axis-title',
                    offset: {
                        x: 0,
                        y: -10
                    },
                    textAnchor: 'middle',
                    flipTitle: false
                }
            })
        ]
    });

});
</script>
</body>
</html>
