<!DOCTYPE html>
<html lang="es">
<head>
	@include('admin.include.css')
	@include('admin.include.data')
	@php
	use Carbon\Carbon;
	setlocale(LC_TIME, 'es_ES.UTF-8');
	Carbon::setLocale('es');
	@endphp
	<script type="text/javascript" src="/resources/admin/assets/js/threejs-loader/three.min.js"></script>
	<script type="text/javascript" src="/resources/admin/assets/js/threejs-loader/three.js"></script>
	<script type="text/javascript" src="/resources/admin/assets/js/threejs-loader/Orbit.js"></script>
	<script type="text/javascript" src="/resources/admin/assets/js/threejs-loader/GLTFLoader.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
	  	//variables
	  	var camera, scene, light, render, controls, sexo;
	  	var mesh;
	  	var delta = 0;
    	var prevTime = Date.now();
	  	//funcion de valorres inicales y carga del modelo
	  	function init(){
	  		scene = new THREE.Scene(); //creacion de esecena
	  		/****************************
	  		 DECLARACION DE LUZ PRINCIPAL
	  		*****************************/
	    	light = new THREE.AmbientLight(0xffffff, 0.9);
		    scene.add(light);
		    /****************************
	  		 DECLARACION DE LUZ SECUNDARIA
	  		*****************************/
		    var light2 = new THREE.PointLight(0xffffff, 0.35);
		    scene.add(light2);
		    light2.position.y=30;
		    light2.position.set(0,2,3);

		    /*******************************************
	  		 DECLARACION DE LUZ ESCENA, CAMARA Y RENDER
	  		*******************************************/

	    	var canva = document.getElementById("canvas"); // identificacion del canvas para adaptar las medidas a el
	    	camera = new THREE.PerspectiveCamera(35,
		    canva.clientWidth/canva.clientHeight, 0.1, 1000);//camara relativa tal tamaño de contenedor con id=canvas
		    renderer = new THREE.WebGLRenderer({alpha: true});
		    renderer.setSize(canva.clientWidth, canva.clientHeight);//render relativo al tamaño del contendor
		    document.getElementById("canvas").appendChild(renderer.domElement);
		    /****************************
	  		 DECLARACION DE LOS CONTROLES
	  		*****************************/
		    controls = new THREE.OrbitControls( camera, renderer.domElement );
		    controls.target.set(0, 0.95, 0);
		    camera.position.set(0, 2, 3);//uibacion de la camara
			controls.update();
		    var loader = new THREE.GLTFLoader();
			// Load a glTF resource
			// loader.load('/resources/admin/assets/blender-files/varon/untitled.json',
			//   	function ( gltf ) {
			//   		mesh=gltf.scene.children[0];
			//   		scene.add(mesh);
			// 	    scene.add( gltf.scene );
			// 	    gltf.animations; // Array<THREE.AnimationClip>
			// 	    gltf.scene; // THREE.Scene
			// 	    gltf.scenes; // Array<THREE.Scene>
			// 	    gltf.cameras; // Array<THREE.Camera>
			// 	    gltf.asset; // Object
			// 	    mesh.position.z=500;

			//   	},

			//   	function ( xhr ) {
			//     	console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );
			//   	},
			//   // called when loading has errors
			//   	function ( error ) {
			//     console.log( 'An error happened' );
			//   	}
			// );
			/****************************
	  		 CARGA DEL MODELO
	  		******************************/
	  		 var sexos='<?php echo $ficha->usuario->sexo;?>'
	  		if (sexos==1) {
	  			loader.load('/resources/admin/assets/blender-files/nueva_carpeta/untitled.json', handle_load);
	  		}
	  		else{
	  			loader.load('/resources/admin/assets/blender-files/dama/damagltf.json', handle_load);
	  		}

		    function handle_load(gltf) {
		        console.log(gltf);
		        mesh = gltf.scene;
		        console.log(mesh.children[0]);
		        mesh.children[0].material = new THREE.MeshLambertMaterial();
				scene.add( mesh );
		    }
	  	}

	    function render() {
	    	delta += 0.1;
	        if (mesh) {
	            mesh.rotation.y += 0.01;
	        }
		    requestAnimationFrame(render);
		    controls.update();
		    renderer.render(scene, camera);

	    }
	    function start(){
	    	init();
	  		render();
	    }
	</script>
	<script>

	    //////////////////////////////////////////////////////////
	    //PESO
	    //////////////////////////////////////////////////////////
	    google.charts.load('current', { packages: ['corechart', 'bar'] });
	    google.charts.setOnLoadCallback(drawPeso);

	    function drawPeso() {
	        var data = google.visualization.arrayToDataTable([
	            ['Fecha', 'IMC'],
	            @foreach ($ficha->periodos as $periodo)
	                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->peso }}],
	            @endforeach
	        ]);

	        var options = {
	            // title: 'Peso',
	            chartArea: { width: '65%' },
	            hAxis: {
	                title: 'Peso en Kg.',
	                legend: { position: 'top', maxLines: 1 },
	                minValue: 0,
	            },
	            vAxis: {
	                title: 'Periodos'
	            },
	            colors: ['#01579b']
	        };
	        var chart = new google.visualization.BarChart(document.getElementById('chart_imc'));
	        chart.draw(data, options);
	    }

	    //////////////////////////////////////////////////////////
	    //GRASA
	    //////////////////////////////////////////////////////////
	    google.charts.load('current', { packages: ['corechart', 'bar'] });
	    google.charts.setOnLoadCallback(drawGrasa);

	    function drawGrasa() {
	        var data = google.visualization.arrayToDataTable([
	            ['Fecha', 'Grasa'],
	            @foreach ($ficha->periodos as $periodo)
	                ['{{ Carbon::parse($periodo->fecha)->format('d-m-Y') }}',  {{ $periodo->grasa }}],
	            @endforeach
	        ]);

	        var options = {
	            chartArea: { width: '65%' },
	            hAxis: {
	                title: 'Grasa en %.',
	                legend: { position: 'top', maxLines: 1 },
	                minValue: 0,
	            },
	            vAxis: {
	                title: 'Periodos'
	            },
	            colors: ['#0277bd']
	        };
	        var chart = new google.visualization.BarChart(document.getElementById('chart_grasa'));
	        chart.draw(data, options);
	    }
	</script>
</head>

<body onload="start();">
	<div class="container container-fluid" style="background-color: #ffffff">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  		<a class="navbar-brand" href="#">
		  		<img src="/resources/img/user/logo.png" width="30" height="30" alt="">
		  		Fitness 10
	  		</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
			<div class="collapse navbar-collapse navbar-container" id="navbarNav">
			    <ul class="navbar-nav mr-auto">
			    </ul>
				<ul class="nav-right">
					<li class="user-profile header-notification">
						<div class="dropdown-primary dropdown">
							<div class="dropdown-toggle" data-toggle="dropdown">
								<span>¡Hola {{-- {{ Auth::user()->nombres }} --}}Administrador!</span>
								{{-- <img src="{{ Auth::user()->foto ? Auth::user()->foto : '/resources/img/user/default.png' }}" class="img-radius img-40" width="40px" height="40px" alt="{{ Auth::user()->email }}"> --}}
			                    <img src="/resources/img/user/default.png" class="img-radius img-40" width="40px" height="40px">
								<i class="feather icon-chevron-down"></i>
							</div>
							<ul class="profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
								{{-- <li>
									<a href="{{ url('/admin/perfil-admin') }}">
										<i class="feather icon-user"></i> Mi perfil
									</a>
								</li>

								<li>
									<a href="{{ url('/admin/perfil-admin/modificar') }}">
										<i class="feather icon-settings"></i> Editar perfil
									</a>
								</li> --}}

								<form action="{{ url('/logout') }}" method="post" id="logout-form">
									@csrf
									<li style="cursor: default;">
										<button type="submit" class="btn-light btn-block" style="border:none; margin-left:-6px; cursor: pointer; text-align: left; font-size: 15px;">
											<i class="feather icon-log-out"></i> Cerrar sesión
										</button>
									</li>
								</form>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</br>
</br>
	<div class="container">
		<div class="row">
			<div class="col-6 col-md-6 col-lg-6">
				<div class="card">
					<div class="card-header text-center">
						<h3>Gráficos Estadísticos</h3>
					</div>
					<div class="card-body">
						<div class="card-block">
							<h5 class="card-title text-center">Índice de masa corporal</h5>
							<div id="chart_imc"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-6 col-lg-6">
				@if($ficha->usuario)
				<div id="canvas" style="height: 500px;">
					<!-- <div class="card-header text-center">
						<h3>Situación Actual</h3>
					</div> -->

<!-- 					<div class="card-body" id="canvas" >
						<div class="card-block">
						</div>
						<div class="card-block">
							<h5 class="card-title text-center">Datos</h5>
							<dl class="dl-horizontal row mt-2">
								<dt class="col-sm-3">Inscrito:</dt>
								<dd class=" col-sm-9">
									{{ $ficha->usuario->nombres }} {{ $ficha->usuario->apellidos }}
								</dd>
								<dt class="col-sm-3">Edad:</dt>
								<dd class=" col-sm-9">
									@if ($ficha->usuario->nacimiento)
									Nació {{ Carbon::parse($ficha->usuario->nacimiento)->diffForHumans(null, false, false, 1) }}
                            		@elseif($ficha->usuario->edad)
                            		{{ Carbon::parse($ficha->usuario->edad)->format('d \d\e M. \d\e Y')
                            		@endif
								</dd>
								<dt class="col-sm-3">Interés:</dt>
								<dd class=" col-sm-9">
									<span class="label label-warning">
		                                Interesado en
		                                @switch($ficha->usuario->interes)
		                                    @case(1)
		                                        Perder peso
		                                        @break
		                                    @case(2)
		                                        Tonificar
		                                        @break
		                                    @case(3)
		                                        Musculación
		                                        @break
		                                    @case(4)
		                                        Competencia
		                                        @break
		                                    @default
		                                        Otro
		                                @endswitch
                                	</span>
								</dd>
							</dl>
						</div>
					</div> -->
				@endif
				</div>
			</div>
		</div>
	</div>
	@include('admin.include.threejs')
</body>
</html>
