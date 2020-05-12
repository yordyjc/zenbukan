@extends('front.layouts.app')

@section('titulo')
Iniciar sesión
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

<section class="xs-section-padding-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <form class="xs-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row m-b-20">
                        <div class="col-md-12">
                            <div id="message-user"></div>
                        </div>
                    </div>
                    {{-- <div class="row m-b-20">
                        <div class="col-md-6">
                            <button class="btn btn-facebook m-b-20 btn-block"><i class="icofont icofont-social-facebook"></i>facebook</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-twitter m-b-20 btn-block"><i class="icofont icofont-social-twitter"></i>twitter</button>
                        </div>
                    </div>
                    <p class="text-muted text-center p-b-5">Sign in with your regular account</p> --}}

                    <div class="form-group xs-form-anim">
                        <label class="input-label">E-mail</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" id="email" name="email">
                        @if ($errors->has('email'))
                            <div class="has-danger">
                                <div class="col-form-label">
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="form-group xs-form-anim">
                        <label class="input-label">Contraseña</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? ' form-control-danger' : '' }}" id="password" name="password">
                        @if ($errors->has('password'))
                            <div class="has-danger">
                                <div class="col-form-label">
                                    {{ $errors->first('password') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label>
                                <input type="checkbox" value="">
                                <span class="text-inverse">Recordar</span>
                            </label>
                        </div>
                        <div class="col-6">
                            <a href="{{ url('/password/reset') }}" class="text-right f-w-600"> ¿Olvidó su contraseña?</a>
                        </div>
                    </div>

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Iniciar sesión</button>
                        </div>
                    </div>

                    {{-- <p class="text-inverse text-left">¿Aún no estás registrado? <a href="{{ url('/registro-usuario') }}"> <b>Hazlo aquí </b></a></p> --}}
                </form>
            </div>
            <div class="col-md-6">
                <center><img src="{{ 'resources/img/login.png' }}" class="img-fluid" /></center>
            </div>
        </div>
    </div>
</section>

<div id="xs-map" class="xs-map-contact"></div>

<section class="xs-pb-sm">
    <div class="container">
        <div class="xs-contact-form">
            @if (count($servicios)>0)
            @php
                $contador=1;
            @endphp
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">Beneficios del Gym</h2>
                </div>

                @foreach ($servicios as $servicio)
                @if ($contador % 2 != 0)
                    <div class="col-lg-6">
                        <div class="xs-help xs-strength">
                            <h5 class="text-center text-info"><span>{{ $servicio->nombre }}</span></h5>
                            <div class="xs-video-wraper">
                                <img class="img-fluid" src="{{ $servicio->foto }}" alt="{{ $servicio->nombre }}">
                                <div class="xs-video-shape" style="background-image: url(&quot;assets/images/shape/help-shape.png&quot;);"></div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-6">
                        <div class="xs-help" style="margin-bottom: 40px;">
                            <h5 class="text-center text-info"><span>{{ $servicio->nombre }}</span></h5>
                            <div class="xs-video-wraper">
                                <img class="img-fluid" src="{{ $servicio->foto }}" alt="{{ $servicio->nombre }}">
                                <div class="xs-video-shape" style="background-image: url(&quot;assets/images/shape/help-shape.png&quot;);"></div>
                            </div>
                        </div>
                    </div>
                @endif

                @php
                    $contador=$contador+1;
                @endphp
                @endforeach
            </div>
            @else
            <center><h2>Pronto encontrarás nuestros servicios en esta sección</h2></center>
            @endif
        </div>
    </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
        $(document).ready(function() {
            if(location.search){
                var q=location.search.split('=');
                if(q[1]=='verificado'){
                    $("#message-user").html('<div class="alert alert-success background-success">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        '<strong>¡Cuenta verificada!</strong><br> Ahora puedes iniciar sesión y disfrutar de la plataforma ;)'+
                    '</div>');
                }
                else if(q[1]=='new-user'){
                    $("#message-user").html('<div class="alert alert-success background-success">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        '<strong>¡Tu registro está completo!</strong><br> Ahora puedes iniciar sesión'+
                    '</div>');
                }
                else if(q[1]=='link-invalido'){
                    $("#message-user").html('<div class="alert alert-info background-info">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        '<strong>Upss!</strong><br> El enlace no es válido.'+
                    '</div>');
                }
                else if(q[1]=='sin-confirmar'){
                    $("#message-user").html('<div class="alert alert-warning background-warning">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        '<strong>¡Su cuenta no está verificada!</strong><br> Confirme su correo electrónico.'+
                    '</div>');
                }
                else if(q[1]=='incorrectos'){
                    $("#message-user").html('<div class="alert alert-danger background-danger">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        '<strong>¡Upss!</strong><br> E-mail o contraseña incorrectos'+
                    '</div>');
                }
                else if (q[1]==1) {
                    $("#message-user").html('<div class="alert alert-danger background-danger">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        '<strong>¡Usuario cancelado!</strong><br> Por favor pongase en contacto con el administrador del sistema.'+
                    '</div>');
                }
                else if(q[1]==0){
                    $("#message-user").html('<div class="alert alert-danger background-danger">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        '<strong>¡Su cuenta está siendo usada en este momento!</strong><br> Sí esto es un error contacte con el administrador inmediamente.'+
                    '</div>');
                }
                window.history.pushState('',document.title,'/login')
                setTimeout(function(){
                    $("#message-user").html('');
                }, 20000);
            }
        });
    </script>
@endsection

