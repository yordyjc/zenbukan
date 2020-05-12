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
</br>
</br>

<section class="xs-pt-xs xs-pb-s">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2 style="color:#0083AD;">Importancia</h2>
                    <p>El ejercicio les ayuda a los niños a desarrollarse física y mentalmente, a estar sanos, y a relacionarse de una forma saludable con otros niños.</p>
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
                        <img src="resources/img/index/maternidad/madre2.png" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="xs-team">
                    <div>
                        <img src="resources/img/index/maternidad/mama2.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- .container END -->
</br>
<section style="background-color:#0083AD;">
    <div class="container">
        <div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    </br>
                    </br>
                    </br>
                    <div class="xs-section-heading text-center"style="color:#ffffff">
                        <h2 style="color:#ffffff">Beneficios</h2>
                        <p>La gimnasia laboral o también conocida como pausas activas, consiste en la ejecución de ejercicios físicos correctamente estructurados que actúan de manera terapéutica y preventiva, propiciando el bienestar general de sus trabajadores.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</br>
</br>
</br>
</br>
<div class="owl-carousel owl-theme xs-service-info owl-loaded owl-drag">
    <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-1801px, 0px, 0px); transition: all 0.25s ease 0s; width: 3089px;">
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/ninos/ni1.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/ninos/ni2.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/ninos/ni3.png" alt="" />
                </div>
            </div>
            <div class="owl-item" style="width: 257.4px;">
                <div class="item"style="height=200px;">
                    <img src="resources/img/index/ninos/ni4.png" alt="" />
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
