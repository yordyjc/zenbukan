@extends('front.layouts.app')

@section('titulo')
Entrenamiento kids
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
                            <img src="assets/images/ninos/foto-ninos.png" alt="" />
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        </br>
                        </br>
                        </br>
                        <div class="xs-pl-15 xs-pr-15">
                            <div class="xs-section-heading text-left">
                                <h2>
                                    Entrenamiento kids
                                </h2>
                            </div>
                                <p>Por unos niños mas sanos y más felices</p>
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
    style=" background-image: url('assets/images/ninos/foto-frase.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 77.32px;"
>
    <div class="container">
        <div class="xs-help xs-help-light">
            <div class="row">
                <div class="col-lg-6"style="color:#fff;">
                    <div class="xs-section-heading">
                        <h2 style="color:#fff;">
                            Este espacio fue creado<br />
                            para el engreido de casa
                        </h2>
                    </div>
                    <p>El ejercicio les ayuda a los niños a desarrollarse física y mentalmente, a estar sanos, y a relacionarse de una forma saludable con otros niños</p>
                    
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
                    <h2>Beneficios</h2>
                    <p>El entrenamieto fisico no sólo es bueno para la salud física del niño, también lo es para su salud mental; les ayudara tener más confianza en sí mismo, a relacionarse mejor con los demás e incluso a superar alguna enfermedad.</p>
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
                    <img src="assets/images/ninos/ni1.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/ninos/ni2.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/ninos/ni3.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/ninos/ni4.png" alt="" />
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
