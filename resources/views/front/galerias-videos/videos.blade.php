@extends('front.layouts.app')

@section('titulo')
    {{$galeria->galeria}}
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

<section class="xs-pt-xs xs-pb-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2><span>Lista de videos</span></h2>
                    <p>{{$galeria->descripcion}}</p>
                </div>
            </div>
        </div><!-- .row END -->
        <div class="row">
            
                @if($videos->count()>0)
                    @foreach($videos as $video)
                        <div class="col-lg-3 col-md-6">
                            <div class="xs-team" style="margin-bottom: 20px;">
                                <div class="xs-team-thumb">
                                    <iframe class="youtube-player" type=text/html width="100%" height="100%" src="https://www.youtube.com/embed/{{$video->url}}" frameborder="0" allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="xs-team-content">
                                    <h5>{{$video->nombre}}</h5>
                                    <p>{{$video->descripcion}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <center><h2>Muy pronto podra encontrar nuevos videos en esta galeria</h2></center> 
                @endif
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection

