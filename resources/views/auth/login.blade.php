<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="assets/css/style.css"></link>
    <title>Iniciar Sesion</title>
</head>
<body class="accountbg">
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">
                <a href="{{url('/')}}" class="logo logo-admin"><center><img src="resources/img/logo.png"  alt="logo" width="160px"></center></a>
                <div class="p-3">
                    <form class="m-t-20" action="{{ route('login') }}" method="POST">
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

            </div>
        </div>
    </div>
</body>
</html>


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

