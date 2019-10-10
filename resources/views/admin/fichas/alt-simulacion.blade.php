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
                        <h5 class="sub-title text-center">Peso</h5>
                        <div class="ct-chart ct-golden-section" id="peso"></div>
                    </div>
                    <div>
                        <h5 class="sub-title text-center">Grasa</h5>
                        <div class="ct-chart ct-golden-section" id="grasa"></div>
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

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:25,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
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

});

</script>
</body>
</html>
