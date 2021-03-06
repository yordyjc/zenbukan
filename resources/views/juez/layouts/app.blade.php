<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>@yield('title') | Panel de juez - Zenbukan</title>
	<meta name="description" content="@yield('description','Panel de administración de Zenbukan, esta sección está disponible sólo para jueces')" />
	<meta name="author" content="Zenbukan" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <link rel="icon" href="{{ url('/resources/admin/assets/images/favicon.ico') }}" type="image/x-icon"> --}}

	@include('juez.includes.css')
	@include('juez.includes.data')

</head>
<body onload="start();">

	<div class="loader-bg">
		<div class="loader-bar"></div>
	</div>

	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">

			@include('juez.includes.navbar')

			<div class="pcoded-main-container">
				<div class="pcoded-wrapper">

					@include('juez.includes.sidebar')

					<div class="pcoded-content">

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

	@include('juez.includes.js')

</body>

</html>
