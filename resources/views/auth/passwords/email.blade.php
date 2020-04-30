<!DOCTYPE html>
<html lang="es">
<head>
    <title>Recuperar contraseña - Fitness 10</title>

    <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Inicia sesión en Tacnatel." />
    <meta name="author" content="Tacnatel" />

    {{-- <link rel="icon" href="{{ url('/resources/admin/assets/images/favicon.ico') }}" type="image/x-icon"> --}}
    {{-- <link rel="icon" href="{{ $configuracion->favicon }}" type="image/x-icon"> --}}

    @include('admin.include.css')
</head>
<body themebg-pattern="theme6">

    <section class="login-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="text-center">
                            <a href="{{ url('/') }}">
                                <img src="{{ $configuracion->logo }}" alt="{{ $configuracion->titulo }}" width="180">
                            </a>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <div id="message-user"></div>
                                        <h3 class="text-center txt-primary">Reestablecer contraseña</h3>
                                        <p class="text-muted text-center p-b-5">Le enviaremos por e-mail un enlace privado para que pueda asignar a su cuenta una nueva contraseña.</p>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" name="email">
                                    @if ($errors->has('email'))
                                        <div class="has-danger">
                                            <div class="col-form-label">
                                                {{ $errors->first('email') }}
                                            </div>
                                        </div>
                                    @endif
                                    <span class="form-bar"></span>
                                    <label class="float-label">E-mail</label>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>

                                <p class="text-inverse text-left">¿Ya recordaste tu contraseña? <a href="{{ url('/login') }}"> <b>¡Inicia sesión ahora!</b></a></p>
                            </div><!-- /.card-block -->
                        </div><!-- /.auth-box card -->
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('admin.include.outdated-browser')


    {!! Html::script('resources/admin/bower_components/jquery/js/jquery.min.js') !!}
    {!! Html::script('resources/admin/bower_components/jquery-ui/js/jquery-ui.min.js') !!}
    {!! Html::script('resources/admin/bower_components/popper.js/js/popper.min.js') !!}
    {!! Html::script('resources/admin/bower_components/bootstrap/js/bootstrap.min.js') !!}

    {!! Html::script('resources/admin/assets/pages/waves/js/waves.min.js') !!}

    {!! Html::script('resources/admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') !!}

    {!! Html::script('resources/admin/bower_components/modernizr/js/modernizr.js') !!}

    {!! Html::script('resources/admin/bower_components/modernizr/js/css-scrollbars.js') !!}
    {!! Html::script('resources/admin/assets/js/common-pages.js') !!}

    <script type="text/javascript">
        $(document).ready(function() {
            if(location.search){
                var q=location.search.split('=');
                var enlace = location.origin;
                if(q[1]=='reestablecer-correo'){
                    $("#message-user").html('<div class="alert alert-success background-success">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        'Hemos enviado un correo electrónico con la información necesaria. Por favor, revise su bandeja de entrada (o la carpeta SPAM).'+
                    '</div>');
                }else if((q[1]=='error')){
                    $("#message-user").html('<div class="alert alert-warning background-warning">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="icofont icofont-close-line-circled text-white"></i>'+
                        '</button>'+
                        'Su correo electrónico no se encuentra en nuestros registros.<br>Si desea, puede <a href="'+enlace+'/registro-usuario">registrar una cuenta</a>.</span>'+
                    '</div>');
                }
                window.history.pushState('',document.title,'/password/reset')
                setTimeout(function(){
                    $("#message-user").html('');
                }, 20000);
            }
        });
    </script>

    </body>
</html>
