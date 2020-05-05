@extends('front.layouts.app');

@section('titulo')
Nuestros planes
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

<section class="xs-black-white xs-section-padding-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2><span>Planes</span></h2>
                    <p>Estos son los planes que tenemos para ti,<br />elije el que más se adapte a tus necesidades e ¡Inscríbete Ya!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="xs-pricing-white">
            <div class="row no-gutters">
                @if (count($planes)>0)
                @foreach ($planes as $plan)
                <div class="col-lg-3 col-md-6">
                    <div class="xs-pricing">
                        <h3 class="xs-line">{{ $plan->nombre }}</h3>
                        @if ($plan->precio)
                        <p>
                            <sup>{{ $plan->moneda }}</sup>
                            <span>{{ $plan->precio }}</span>
                            <sub>/mes</sub>
                        </p>
                        @else
                        <br />
                        @endif
                        {!! $plan->descripcion !!}
                        <a href="{{ url('/pre-inscripcion') }}" class="btn btn-primary">¡Inscríbete Ya!</a>
                    </div>
                </div>
                @endforeach
                @else
                <center><h2>Pronto encontrarás nuestros planes en esta sección</h2></center>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

