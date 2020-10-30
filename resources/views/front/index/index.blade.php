@extends('front.layouts.app')

@section('titulo')
Inicio
@endsection

@section('contenido')
<audio src="/resources/audio/hearts-on-fire.mp3" autoplay loop></audio>
<!-- Banner -->
<section class="xs-bg-cover" id="home" style="background: url({{ $fondo ? $fondo : '/resources/img/fondos/default.jpg' }}) center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="xs-banner text-center">
                    <p class="xs-banner-subtitle">Bienvenido a la escuela de artes marciales</p>
                    <h1 class="xs-banner-title">Zenbukan</span></h1>
                </a>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- Banner End -->

<section class="xs-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2>Proximos <span>Torneos</span></h2>
                    <p>Zenbukan organiza tornos de alta competencia, incribete!!</p>
                </div>

            </div>
        </div>
        <div class="row">

            @if (count($torneos)>0)
            @foreach ($torneos as $torneo)

            <div class="col-lg-4">
                <div class="card xs-shop" style="border-color:#fff;">
                    <div class="xs-shop-thumb">
                        <img src="{{ $torneo->foto }}" alt="{{ $torneo->nombre }}" class="card-img-top">

                    </div>
                    <div class="xs-shop-inner">
                        <a href="{{ url('/torneos/'.$torneo->id) }}" class="btn btn-primary">Ver detalles</a>
                    </div>


                    <div class="card-body">
                        <h5 class="card-title">{{ $torneo->nombre }}</h5>


                    </div>
                </div>

            </div>

            @endforeach
            @else
            <center><h2>Pronto se lanzaran nuevos torneos, estate antento</h2></center>
            @endif

        </div>
    </div>
</section>
<!-- Blog -->

@endsection
