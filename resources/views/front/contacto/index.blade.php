@extends('front.layouts.app')

@section('titulo')
Contacta con nosotros
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

<section class="xs-section-padding xs-pb-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-2">
                <div class="xs-contact-list">
                    <h3><i class="icon icon-location"></i> Fitness 10</h3>
                    <p>{{ $configuracion->direccion }}</p>
                    <ul>
                        <li><span>Teléfono:</span> {{ $configuracion->telefono }}</li>
                        <li><span>E-mail:</span> <p><a href="mailto:{{ $configuracion->email }}">{{ $configuracion->email }}</a></p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="xs-contact-list">
                    <h3>Horario de atención</h3>
                    <ul>
                        <li><span>Lun-Vie:</span> <p>06:00 am a 10:00 pm (corrido)</p></li>
                        <li><span>Sáb:</span> <p>07:00 am a 09:00 pm</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="xs-map" class="xs-map-contact"></div>

<section class="xs-pb-sm">
    <div class="container">
        <div class="xs-contact-form">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="xs-section-heading text-center">
                        <p>Completa el formulario y uno de nuestros asesores se comunicará contigo para brindarte información detallada y resolver todas tus dudas.</p>
                    </div>
                </div>
            </div>
            <form action="#" class="xs-form" id="form-contacto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group xs-form-anim">
                            <label class="input-label" for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group xs-form-anim">
                            <label class="input-label" for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group xs-form-anim">
                            <label class="input-label" for="telefono">Celular / WhatsApp</label>
                            <input type="number" name="telefono" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group xs-form-anim xs-message-box">
                            <label class="input-label" for="mensaje">Su mensaje</label>
                            <textarea id="mensaje" name="mensaje" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group xs-mt-60">
                            <div class="sendmessage-contacto"></div>
                            <div class="errormessage-contacto"></div>
                        </div>
                        <div class="form-group xs-mt-60">
                            <center><button type="submit" id="submit-contacto" class="btn btn-primary">Enviar</button></center>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="xs-pb-sm">
    <div class="container">
        <h2 class="text-center">Beneficios del Gym</h2>

        @if (count($servicios)>0)
        @php
            $contador=1;
        @endphp
        <div class="row">
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
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $("#form-contacto").submit(function(e) {
            $("#submit-contacto").html("Enviando...");
            $("#submit-contacto").addClass("disabled");
            var formData=$(this).serialize();
            var route='/contacto';
            sendRequest(route,formData,'POST',function (data,textStatus) {
                $("#form-contacto")[0].reset();
                $("#submit-contacto").html('Enviar');
                if (data.status==200) {
                    $(".sendmessage-contacto").addClass("show");
                    $(".sendmessage-contacto").html("Su mensaje se envió correctamente, pronto nos pondremos en contacto con Usted");
                }
                else{
                    $(".errormessage-contacto").addClass("show");
                    $(".errormessage-contacto").html("¡Error! Por favor, intente nuevamente");
                }
            })
            e.preventDefault();
            return false;
        });
    });
</script>
@endsection
