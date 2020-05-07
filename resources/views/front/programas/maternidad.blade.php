@extends('front.layouts.app')

@section('titulo')
Maternidad fitness
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
                            <img src="assets/images/video/video-2.jpg" alt="" />
                            <div class="xs-overlay"></div>
                            <a href="https://www.youtube.com/watch?v=X_9VoqR5ojM" class="xs-video-btn">
                                <i class="icon icon-play"></i>
                            </a>
                            <div class="xs-video-shape" data-scrollax="properties: { translateY: '250px' }" style="background-image: url('assets/images/shape/help-shape.png'); transform: translateZ(0px) translateY(-81.2334px);"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="xs-pl-15 xs-pr-15">
                            <div class="xs-section-heading text-left">
                                <h2>
                                    Gesta
                                    <span>vida</span>
                                </h2>
                            </div>
                            <p>Maternidad fitness.</p>
                            <p>Programa especializado</p>
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
    style=" background-image: url('assets/images/maternidad-frase.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 77.32px;"
>
    <div class="container">
        <div class="xs-help xs-help-light">
            <div class="row">
                <div class="col-lg-6"style="color:#fff;">
                    <div class="xs-section-heading">
                        <h2 style="color:#fff;">
                            Este espacio fue creado<br />
                            para ti
                        </h2>
                    </div>
                    <p>Este espacio ha sido creado para ti, que estás en la dulce espera de un bebe, te brindamos sesiones educativas teóricas prácticas, preparándote hacia un parto seguro para ti y tu bebe. </p>
                    
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
                    <h2 style="color:#FF66FF">Detalles</h2>
                    <p>Te ayudamos en tu estimulación prenatal , psicoprofilaxis, orientación en lactancia, gym y baile para embarazadas y crianza del recien nacido, asi como clases virtuales.</p>
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
                    <img src="assets/images/madres/madre1.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/madres/madre2.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/madres/madre3.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/madres/madre4.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/madres/madre5.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="assets/images/madres/madre6.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item" style="height=200px;">
                    <img src="assets/images/madres/madre7.png" alt="" />
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
