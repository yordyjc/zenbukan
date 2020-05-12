@extends('front.layouts.app')

@section('titulo')
Maternidad fitness
@endsection

@section('contenido')
<audio src="/resources/audio/bebes.mp3" autoplay loop></audio>
<section>
    <div style="height=100%; width=900px;">
        <img src="/resources/img/index/maternidad/fondo.png"alt ="" width=100%;>
    </div>
</section>

<section class="xs-pt-xs xs-pb-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="xs-team">
                    <div>
                        <img src="resources/img/index/maternidad/madre2.png" alt="" />
                    </div>
                    <div class="xs-team-content">
                        <h5 style="color:#FF66FF;">
                            Profesora catherine Hermosa
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="xs-team">
                    <div>
                        <img src="resources/img/index/maternidad/mama2.png" alt="" />
                    </div>
                    <div class="xs-team-content">
                        <h5 style="color:#FF66FF;">
                            Clases de gestantes
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="container">
    <div class="xs-help xs-strength">
        <div class="row">
            <div class="col-lg-6 text-center">
                <img src="resources/img/index/maternidad/gestavida.png" alt=""/>
            </div>
            <div class="col-lg-6 text-center">
                </br>
                </br>
                </br>
                <div class="xs-pl-15 xs-pr-15">
                    <h2 style="color:#FF66FF;">
                        Gesta vida
                    </h2>
                    <p>Este espacio ha sido creado para ti, que estás en la dulce espera de un bebe, te brindamos sesiones educativas teóricas prácticas, preparándote hacia un parto seguro para ti y tu bebe.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- .xs-help END -->
</section>
</br>
</br>
</br>
<!-- .container END -->
<div class="owl-carousel owl-theme xs-service-info owl-loaded owl-drag">
    <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-1801px, 0px, 0px); transition: all 0.25s ease 0s; width: 3089px;">
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/maternidad/ma1.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/maternidad/ma2.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/maternidad/ma3.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/maternidad/ma5.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/maternidad/ma6.png" alt="" />
                </div>
            </div>

        </div>
    </div>
    <div class="owl-nav disabled">
        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
    </div>
    <div class="owl-dots disabled"></div>
</div>
</br>
</br>
</br>
<section class="xs-pt-xs xs-pb-sm">
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
<section class="xs-pt-xs xs-pb-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="xs-team">
                    <div>
                        <img src="resources/img/index/maternidad/madre6.png" alt="" />
                    </div>
                    <div class="xs-team-content">
                        <h5 style="color:#FF66FF;">
                            Programa virtual
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="xs-team">
                    <div>
                        <img src="resources/img/index/maternidad/madre7.png" alt="" />
                    </div>
                    <div class="xs-team-content">
                        <h5 style="color:#FF66FF;">
                            Clases 100% practicas
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('front.include.call-login')

@endsection
