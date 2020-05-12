@extends('front.layouts.app')

@section('titulo')
{{ $producto->nombre }}
@endsection

@section('css')
{!! Html::style("assets/css/modal-video.min.css") !!}
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
        <div class="xs-trainer-details">
            <div class="row">
                <div class="col-md-5">
                    <div class="xs-trainer-thumb">
                        <img src="{{ $producto->foto }}" alt="{{ $producto->nombre }}">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row no-gutters">
                        <div class="col-12">
                            @if ($producto->oferta == 1)
                            <h5><span class="badge badge-danger">¡Oferta!</span></h5>
                            @endif
                            @if ($producto->descripcion)
                            <div class="xs-column-heading">
                                {!! $producto->descripcion !!}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <li><span>Producto:</span> <p>{{ $producto->nombre }}</p></li>
                                <li><span>Precio:</span> <p>{{ $producto->moneda }} {{ $producto->precio }}</p></li>
                                @if ($producto->youtube)
                                <li><span>Video:</span> <button class="btn btn-warning js-video-button" data-video-id='{{ $producto->youtube }}'> Ver video</button></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ url('/productos') }}" class="btn btn-secondary btn-sm mt-5">Volver al listado de productos</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('front.include.call-login')

@endsection

@section('js')
{!! Html::script("assets/js/jquery-modal-video.min.js") !!}
{!! Html::script("assets/js/modal-video.min.js") !!}
<script>
    $(".js-video-button").modalVideo({
        youtube:{
            controls:0,
            nocookie: true,
            showinfo: 1,
        }
    });
</script>
@endsection

