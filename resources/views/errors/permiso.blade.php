@section('title')
¡Error!
@endsection

@section('content')
<section class="login-block offline-404">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">

				<div class="card auth-box">
					<div class="card-block text-center">
						<form>
							<h1>🚫</h1>
                            </br>
                            <h2 class="m-b-15 text-muted">¡Alto!</h2>
                            </br>
							<h2 class="m-b-15 text-muted">No tienes permiso para acceder a esta sección</h2>
							{{-- <button onclick="history.back()" class="btn btn-inverse m-t-30">Regresar</button> --}}
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
@endsection

<!DOCTYPE html>
<html lang="es">
<head>
    <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>@yield('title') | Panel de administración</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ url('/resources/img/user/logo.png') }}" type="image/x-icon">

    @include('admin.include.css')
    @include('admin.include.data')

</head>
<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <div class="pcoded-content-block">

                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">

                                        @yield('content')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div id="styleSelector">
                    </div>--}}

                </div>
            </div>
        </div>
    </div>

    @include('admin.include.js')

</body>

</html>

