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
                    <p class="xs-banner-subtitle">El ejercicio es sinónimo de salud</p>
                    <h1 class="xs-banner-title">Fitness <span>10</span></h1>
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
                    <h2>Conoce nuestros<span> beneficios</span></h2>
                    <p>Contamos con diversos programas y herramientas que ayudarán a conseguir los resultados que estas buscando.</p>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->

    <div class="xs-blog-shape xs-bg-cover" data-scrollax="properties: { translateY: '-250px' }" style="background-image: url(assets/images/shape/news_bg.png);">
    </div><!-- .xs-blog-shape END -->

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="xs-team-bene">
                    <a href="/servicios">
                        <img src="/resources/img/index/beneficios/bene.png" alt="beneficios">
                    </a>

                </div>
            </div>
            <div class="col-md-6">
                <div class="xs-team-bene">
                    <a href="/imc">
                        <img src="/resources/img/index/beneficios/imc.png" alt="beneficios">
                    </a>

                </div>
            </div>

            <div class="col-md-6">
                <div class="xs-team-bene">
                    <a href="/productos">
                        <img src="/resources/img/index/beneficios/suple.png" alt="beneficios">
                    </a>

                </div>
            </div>
            <div class="col-md-6">
                <div class="xs-team-bene">
                    <a href="#">
                        <img src="/resources/img/index/beneficios/clases.png" alt="beneficios">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="xs-team-bene">
                    <a href="maternidad-fitness">
                        <img src="/resources/img/index/beneficios/madres.png" alt="beneficios">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="xs-team-bene">
                    <a href="corporativo">
                        <img src="/resources/img/index/beneficios/corpo.png" alt="beneficios">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section><!-- Blog end -->


<!-- About Us -->

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
                    <div class="xs-pricing" style="background-color: {{ $plan->color }}; {{ $plan->color == '#000000' ? 'color: #ffffff' : '' }}">
                        <h3 class="xs-line" style="{{ $plan->color == '#000000' ? 'color: #ffffff' : '' }}">{{ $plan->nombre }}</h3>
                        @if ($plan->precio)
                        <p style="{{ $plan->color == '#000000' ? 'color: #ffffff' : '' }}">
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
