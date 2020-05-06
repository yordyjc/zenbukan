@extends('front.layouts.app')

@section('titulo')
Galeria de videos
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

<section class="xs-pt-xs xs-pb-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2><span>Clases libres</span></h2>
                    <p>Que nada te detenga para entrenar. Aprovecha nuestras clases libres</p>
                </div>
            </div>
        </div><!-- .row END -->
        <div class="row">
            
                @if($galerias)
                    @foreach($galerias as $galeria)
                        <div class="col-lg-3 col-md-6">
                            <div class="xs-team">
                                <div class="xs-team-thumb">
                                    <img src="{{$galeria->foto}}" alt="Jhon Statham">
                                </div>
                                <div class="xs-team-content">
                                    <h3>
                                        <a href="trainer-details.html">{{$galeria->galeria}}</a>
                                    </h3>
                                    <p>{{$galeria->descripcion}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection

