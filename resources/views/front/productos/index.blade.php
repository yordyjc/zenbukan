@extends('front.layouts.app')

@section('titulo')
Productos: Suplementos deportivos
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
        <div class="row">

            @if (count($productos)>0)
            @foreach ($productos as $producto)

            <div class="col-lg-4">
                <div class="xs-shop">
                    <div class="xs-shop-thumb">
                        @if ($producto->oferta ==1)
                            <span style="float:left; position: absolute;margin: 20px;padding: 0px 5px;border-radius: 10%; background-color: red; color: white;">¡Oferta!</span>
                        @endif
                        <img src="{{ $producto->foto }}" alt="{{ $producto->nombre }}">
                    </div>
                    <div class="xs-shop-inner">
                        <a href="{{ url('/productos/'.$producto->slug) }}" class="btn btn-primary">Ver detalles</a>
                        <div class="xs-badge-wraper">
                            <span class="xs-price-badge">{{ $producto->moneda }} {{ $producto->precio }}</span>
                        </div>
                        <h3><a href="{{ url('/productos/'.$producto->slug) }}">{{ $producto->nombre }}</a></h3>
                    </div>
                </div>
            </div>

            @endforeach
            @else
            <center><h2>Pronto encontrarás los mejores productos en esta sección</h2></center>
            @endif

        </div>
    </div>
</section>

@endsection

