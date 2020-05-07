@extends('front.layouts.app')

@section('titulo')
fitness 10
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

        @if ($configuracion->mision||$configuracion->vision)
        <section class="xs-section-padding xs-bg-cover parallaxie" style="background-image: url('assets/images/testimonial/testimonial_img.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 90.4px;" data-scrollax-parent="true">
            <div class="xs-testimonial-wraper">
                <div class="xs-shape xs-testimonial-shape" style="background-image: url('assets/images/shape/dot-2.png'); transform: translateZ(0px) translateY(-37.4668px);" data-scrollax="properties: { translateY: '250px' }"></div>
            </div>

            <div class="container">
                <!-- .row END -->

                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <!-- Start Carousel -->
                        <div class="owl-carousel owl-theme xs-testimonial-owl owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-2800px, 0px, 0px); transition: all 0.25s ease 0s; width: 5600px;">
                                    <div class="owl-item active" style="width: 690px; margin-right: 10px;">
                                        <div class="item">
                                            <h3>Misión</h3>
                                            <i class="icon icon-quote"></i>
                                            <p>
                                                {{$configuracion->mision}}
                                            </p>

                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 690px; margin-right: 10px;">
                                        
                                        <div class="item">
                                            <h3>visión</h3>
                                            <i class="icon icon-quote"></i>
                                            <p>
                                                {{$configuracion->vision}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                            </div>

                        </div>
                        <!-- .xs-testimonial-owl End -->
                    </div>
                    <!-- .col-lg-8 End -->
                </div>
                <!-- .row End -->
            </div>
            <!-- .container END -->
        </section>
        @else
        <center><h2>Aun no registro información</h2></center>
        @endif
@endsection

