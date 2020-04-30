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
                @if ($error==1)
                    <div class="col-sm-12">
                        <div class="text-center">
                            <a href="{{ url('/') }}">
                                <img src="{{ $configuracion->logo }}" alt="{{ $configuracion->titulo }}" width="180">
                            </a>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Reestablecer contraseña</h3><br />
                                        <div class="alert alert-danger background-danger">
                                            <strong>¡Error!</strong> El enlace para reestablecer su contraseña es inválido o ya fue utilizado.
                                        </div>
                                        <p class="text-inverse text-left">¿Desea generar un nuevo enlace? <a href="{{ url('/password/reset') }}"> <b>¡Click aquí!</b></a></p>
                                    </div>
                                </div>

                            </div><!-- /.card-block -->
                        </div><!-- /.auth-box card -->
                    </div>
                @endif

                <div class="col-sm-12 {{ $error ==1? 'd-none' : ''}}">
                    <form class="md-float-material form-material" action="{{ url('/password/reset/'.$token) }}" method="POST">
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
                                        <p class="text-muted text-center p-b-5">¡Enlace válido! Ingrese una nueva contraseña.</p>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required="">
                                    @if ($errors->has('password'))
                                        <div class="has-danger">
                                            <div class="col-form-label">
                                                {{ $errors->first('password') }}
                                            </div>
                                        </div>
                                    @endif
                                    <span class="form-bar"></span>
                                    <label class="float-label">Contraseña</label>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" required="">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="has-danger">
                                            <div class="col-form-label">
                                                {{ $errors->first('password_confirmation') }}
                                            </div>
                                        </div>
                                    @endif
                                    <span class="form-bar"></span>
                                    <label class="float-label">Confirmar contraseña</label>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Enviar</button>
                                    </div>
                                </div>

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

    </body>
</html>
