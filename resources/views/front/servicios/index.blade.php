@extends('front.layouts.app')

@section('titulo')
Nuestros servicios
@endsection

@section('contenido')
<section class="xs-bg-cover" style="background: url({{ $fondo ? $fondo : '/resources/img/fondos/default.jpg' }}) center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="xs-banner-area">
                    <h1 class="xs-banner-title">@yield('titulo')</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="xs-section-padding">
    <div class="container">

        @if (count($servicios)>0)
        @php
            $contador=1;
        @endphp
        @foreach ($servicios as $servicio)

        @if ($contador % 2 == 0)
        <div class="xs-help xs-strength xs-section-padding-xs">
            <div class="row">
                <div class="col-lg-6">
                    <div class="xs-video-wraper">
                        <img class="img-fluid" src="{{ $servicio->foto }}" alt="{{ $servicio->nombre }}">
                        <div class="xs-video-shape" style="background-image: url(&quot;assets/images/shape/help-shape.png&quot;);"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="xs-pl-15 xs-pr-15">
                        <div class="xs-section-heading">
                            <h2><span>{{ $servicio->nombre }}</span></h2>
                        </div>
                        {!! $servicio->descripcion !!}
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="xs-help xs-section-padding-xs">
            <div class="row">
                <div class="col-lg-6">
                    <div class="xs-section-heading">
                        <h2><span>{{ $servicio->nombre }}</span></h2>
                    </div>
                    {!! $servicio->descripcion !!}
                </div>
                <div class="col-lg-6">
                    <div class="xs-video-wraper">
                        <img class="img-fluid" src="{{ $servicio->foto }}" alt="{{ $servicio->nombre }}">
                        <div class="xs-video-shape" style="background-image: url(&quot;assets/images/shape/help-shape.png&quot;);"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @php
            $contador=$contador+1;
        @endphp
        @endforeach
        @else
        <center><h2>Pronto encontrarás nuestros servicios en esta sección</h2></center>
        @endif

    </div>
</section>

@include('front.include.call-login')

@endsection

