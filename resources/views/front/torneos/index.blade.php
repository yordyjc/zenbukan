@extends('front.layouts.app')

@section('titulo')
Torneos: Inscripciones abiertas
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

<section class="xs-section-padding">
    <div class="container">
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

@include('front.include.call-login')

@endsection

