@extends('front.layouts.app')

@section('titulo')
Torneo
@endsection

@section('contenido')
<!-- Banner -->
<section class="xs-bg-cover" id="home" style="background: url({{ $torneo->portada ? $torneo->portada : '/resources/img/fondos/default.jpg' }}) center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="xs-banner text-center">
                    <p class="xs-banner-subtitle">Inscripciones abiertas</p>
                    <h1 class="xs-banner-title">{{$torneo->nombre}}</span></h1>
                </a>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- Banner End -->

<!-- Blog -->
<section class="position-relative xs-section-padding" data-scrollax-parent="true">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2>Descripción</span></h2>
                    <p>{!!$torneo->descripcion!!}</p>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->

    <div class="xs-blog-shape xs-bg-cover" data-scrollax="properties: { translateY: '-250px' }" style="background-image: url(assets/images/shape/news_bg.png);">
    </div><!-- .xs-blog-shape END -->
</section><!-- Blog end -->
<section class="xs-section-padding-xs xs-bg-cover parallaxie" style="background-image: url(&quot;assets/images/bmi-bg.png&quot;); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">
        <div class="xs-services-intro">
            <div class="row">
                <div class="col-lg-8">
                    <div class="xs-section-heading">
                        <h2 style="color:#DED244">Descargar las bases aquí</h2>
                    </div>
                </div>
                <div class="col-lg-4 align-self-center">
                    <div class="xs-btn-wraper">
                        <a href="{{ $torneo->bases }}" class="btn btn-primary"style="background-color:#DED244">Bases</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
