@extends('front.layouts.app')

@section('titulo')
Corporativo
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

    <section class="xs-section-padding" data-scrollax-parent="true">
        <div class="container">
            <div class="xs-help xs-strength">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="xs-video-wraper">
                            <img src="resources/img/index/corporativo/corporativo.png" alt="" />
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        </br>
                        </br>
                        </br>
                        <div class="xs-pl-15 xs-pr-15">
                            <div class="xs-section-heading text-left">
                                <h2>
                                    Entrenamiento corporativo
                                </h2>
                            </div>
                                <p>Trabajadores sanos y felices producirán mejores resultados</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .xs-help END -->
        </div>
        <!-- .container END -->
    </section>
</section>
<section
    class="xs-section-padding-lg xs-bg-cover parallaxie"
    style=" background-image: url('resources/img/index/corporativo/corporativo-frase.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 77.32px;"
>
    <div class="container">
        <div class="xs-help xs-help-light">
            <div class="row">
                <div class="col-lg-6"style="color:#fff;">
                    <div class="xs-section-heading">
                        <h2 style="color:#fff;">
                            BENEFICIOS
                        </h2>
                    </div>
                    <ul class="icons">
                        <li><i class="fa fa-check-circle"></i> Disminuye el estrés laboral.</li>
                        <li><i class="fa fa-check-circle"></i> Favorece el cambio de posturas y rutina.</li>
                        <li><i class="fa fa-check-circle"></i> Libera estrés articular y muscular.</li>
                        <li><i class="fa fa-check-circle"></i> Estimula y favorece la circulación.</li>
                        <li><i class="fa fa-check-circle"></i> Mejora la postura.</li>
                        <li><i class="fa fa-check-circle"></i> Favorece la autoestima y capacidad de concentración.</li>
                        <li><i class="fa fa-check-circle"></i> Motiva y mejora las relaciones interpersonales y promueve la integración social.</li>
                        <li><i class="fa fa-check-circle"></i> Mejora el desempeño laboral.</li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <!-- .xs-help END -->
    </div>
    <!-- .container END -->
</section>
<section class="xs-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2>IMPORTANCIA DE LA GIMNASIA LABORAL</h2>
                    <p>La gimnasia laboral o también conocida como pausas activas, consiste en la ejecución de ejercicios físicos correctamente estructurados que actúan de manera terapéutica y preventiva, propiciando el bienestar general de sus trabajadores.</p>
                </div>
            </div>
        </div>
        <!-- .row END -->
    </div>
    <!-- .container END -->
</section>

<div class="owl-carousel owl-theme xs-service-info owl-loaded owl-drag">
    <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-1801px, 0px, 0px); transition: all 0.25s ease 0s; width: 3089px;">
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/corporativo/co1.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/corporativo/co2.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/corporativo/co3.png" alt="" />
                </div>
            </div>
            
        </div>
    </div>
    <div class="owl-nav disabled">
        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
    </div>
    <div class="owl-dots disabled"></div>
</div>
@endsection
