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
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2><span>Entrenamiento kids</span></h2>
                    <p>Por unos niños sanos y con mas vitalidad</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="xs-pricing-white">
            <div class="row no-gutters">
                <h3>Aqui van el programa de niños</h3>
            </div>
        </div>
    </div>
</section>
@endsection
