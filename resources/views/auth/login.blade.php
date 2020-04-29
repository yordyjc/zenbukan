<!DOCTYPE html>
<html lang="es">
<head>
	<title>Iniciar sesión | Fitness 10</title>

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
					<form class="md-float-material form-material" action="{{ route('login') }}" method="POST">
						@csrf
						<div class="text-center">
							<a href="{{ url('/') }}">
								<img src="{{ url('resources/img/logo.jpg') }}" alt="logo.png" width="180">
							</a>
						</div>
						<div class="auth-box card">
							<div class="card-block">
								<div class="row m-b-20">
									<div class="col-md-12">
										<div id="message-user"></div>
										<h3 class="text-center txt-primary">Iniciar sesión</h3>
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

								<div class="form-group form-primary">
									<input type="email" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" id="email" name="email">
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

								<div class="form-group form-primary">
									<input type="password" class="form-control {{ $errors->has('password') ? ' form-control-danger' : '' }}" id="password" name="password">
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

								<div class="row m-t-25 text-left">
									<div class="col-12">
										<div class="checkbox-fade fade-in-primary">
											<label>
												<input type="checkbox" value="">
												<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
												<span class="text-inverse">Recordar</span>
											</label>
										</div>
										<div class="forgot-phone text-right float-right">
											<a href="{{ url('/password/reset') }}" class="text-right f-w-600"> ¿Olvidó su contraseña?</a>
										</div>
									</div>
								</div>

								<div class="row m-t-30">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Iniciar sesión</button>
									</div>
								</div>

								{{-- <p class="text-inverse text-left">¿Aún no estás registrado? <a href="{{ url('/registro-usuario') }}"> <b>Hazlo aquí </b></a></p> --}}
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

	</body>
</html>
