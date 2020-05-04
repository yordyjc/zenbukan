@extends('front.layouts.app')

@section('titulo')
Pre-Inscripción
@endsection

@section('css')
<style>
#sendmessage {
    color: #007bff;
    border: 1px solid #007bff;
    display: none;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    margin-bottom: 15px;
}

#errormessage {
    color: red;
    display: none;
    border: 1px solid red;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    margin-bottom: 15px;
}

#sendmessage.show,
#errormessage.show,
.show {
    display: block;
}
</style>
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

<section class="xs-pb-sm">
    <div class="container">
        <div class="xs-contact-form">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="xs-section-heading text-center">
                        <h2><span>Por favor, complete el formulario</span></h2>
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
                            <label>Elegir plan</label>
                            <br />
                            @foreach ($planes as $plan)
                            <input type="radio" id="{{ $plan->id }}" name="plan" value="{{ $plan->nombre }}" required>
                            <label for="{{ $plan->id }}">{{ $plan->nombre }}</label><br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group xs-mt-60">
                            <div id="sendmessage"></div>
                            <div id="errormessage"></div>
                        </div>
                        <div class="form-group xs-mt-60">
                            <center><button type="submit" id="submit" class="btn btn-primary">Pre-Inscribirse</button></center>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- .xs-contact-form END -->
    </div><!-- .container END -->
</section>
@endsection

@section('js')
<script type="text/javascript">
    function sendRequest(url,data,method,cb) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        opts={};
        opts.url=url;
        if (data) opts.data=data;
        opts.method=method;
        opts.complete=cb;
        $.ajax(opts);
    }
</script>

<script>
    $(document).ready(function() {
            $("#form-contacto").submit(function(e) {
                $("#submit").html("Enviando...");
                $("#submit").addClass("disabled");
                var formData=$(this).serialize();
                var route='/pre-inscripcion';
                sendRequest(route,formData,'POST',function (data,textStatus) {
                    $("#form-contacto")[0].reset();
                    $("#submit").html('Pre-Inscribirse');
                    if (data.status==200) {
                        $("#sendmessage").addClass("show");
                        $("#sendmessage").html("Su mensaje se envió correctamente, pronto nos pondremos en contacto con Usted");
                    }
                    else{
                        $("#errormessage").addClass("show");
                        $("#errormessage").html("¡Error! Por favor, intente nuevamente");
                    }
                })
                e.preventDefault();
                return false;
            });
        });
</script>
@endsection

