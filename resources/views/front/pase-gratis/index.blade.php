@extends('front.layouts.app')

@section('titulo')
Solicita tu pase gratis
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
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                  <h5 class="text-center">Completa el formulario para obtener tu pase gratis por 3 días</h5>
                  <strong>Recuerda que sólo puedes solicitar este pase una única vez.</strong>
                  <br /><strong>Para el ingreso debes presentar tu DNI.</strong>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div style="margin-top: 45px;">
                    <img src="{{ url('resources/img/ejercicios-en-el-gimnasio.jpg') }}" class="img-fluid" />
                </div>
            </div>
            <div class="col-md-6">
                <form action="#" class="xs-form" id="form-pase">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group xs-form-anim">
                                <label class="input-label" for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group xs-form-anim">
                                <label class="input-label" for="dni">DNI</label>
                                <input type="number" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="dni" class="form-control" required/>
                            </div>
                            <div class="form-group xs-form-anim">
                                <label class="input-label" for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group xs-form-anim">
                                <label class="input-label" for="telefono">Celular / WhatsApp</label>
                                <input type="number" name="telefono" class="form-control" required>
                            </div>

                            <div class="form-group xs-mt-60">
                                <div class="sendmessage-pase"></div>
                                <div class="errormessage-pase"></div>
                            </div>
                            <div class="form-group xs-mt-60">
                                <center><button type="submit" id="submit-pase" class="btn btn-primary">Solicitar Pase</button></center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div id="xs-map" class="xs-map-contact"></div>

<section class="xs-pb-sm">
    <div class="container">
        <div class="xs-contact-form">
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
    </div>
</section>

<section class="xs-pb-sm">
    <div class="container">
        <h2 class="text-center">Beneficios del Gym</h2>

        @if (count($servicios)>0)
        @php
            $contador=1;
        @endphp
        @foreach ($servicios as $servicio)

        @if ($contador % 2 == 0)
        <div class="xs-help xs-strength xs-section-padding-xs">
            <div class="row">
                <div class="col-lg-6">
                    <div class="xs-video-wraper">
                        <img class="img-fluid" src="{{ $servicio->foto }}" alt="{{ $servicio->nombre }}">
                        <div class="xs-video-shape" style="background-image: url(&quot;assets/images/shape/help-shape.png&quot;);"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="xs-pl-15 xs-pr-15">
                        <div class="xs-section-heading">
                            <h2><span>{{ $servicio->nombre }}</span></h2>
                        </div>
                        {!! $servicio->descripcion !!}
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="xs-help xs-section-padding-xs">
            <div class="row">
                <div class="col-lg-6">
                    <div class="xs-section-heading">
                        <h2><span>{{ $servicio->nombre }}</span></h2>
                    </div>
                    {!! $servicio->descripcion !!}
                </div>
                <div class="col-lg-6">
                    <div class="xs-video-wraper">
                        <img class="img-fluid" src="{{ $servicio->foto }}" alt="{{ $servicio->nombre }}">
                        <div class="xs-video-shape" style="background-image: url(&quot;assets/images/shape/help-shape.png&quot;);"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @php
            $contador=$contador+1;
        @endphp
        @endforeach
        @else
        <center><h2>Pronto encontrarás nuestros servicios en esta sección</h2></center>
        @endif

    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $("#form-pase").submit(function(e) {
            $("#submit-pase").html("Enviando...");
            $("#submit-pase").addClass("disabled");
            var formData=$(this).serialize();
            var route='/pase-gratis';
            sendRequest(route,formData,'POST',function (data,textStatus) {
                $("#form-pase")[0].reset();
                $("#submit-pase").html('Solicitar Pase');
                if (data.status==200) {
                    $(".sendmessage-pase").addClass("show");
                    $(".sendmessage-pase").html("Tu solicitud se está procesando, llámanos o acércate al gimnasio para separar tus días. <span style='color:red;font-weight:bold;'>Recuerda que si ya solicitó su pase anteriormente, su solicitud será rechazada</span>");
                }
                else{
                    $(".errormessage-pase").addClass("show");
                    $(".errormessage-pase").html("¡Error! No podemos procesar su petición en este momento. Lo sentimos.");
                }
            })
            e.preventDefault();
            return false;
        });
    });
</script>
@endsection

