@extends('admin.layouts.app')
@section('content')
@include('admin.include.animate')
<div class="container">
	<div class="row">
		<div class="col-8 col-md-8 col-lg-8">col-8</div>
		<div class="col-4 col-md-4 col-lg-4" style="canvas { width: 100%; height: 100%; background-color: white; }">col-4</div>
	</div>
</div>
@endsection
@section('js')
	<script>
  	//variables
  	var camera, scene, light, render, controls;
  	init();
  	render();

  	function init()
  	{
  		scene = new THREE.Scene();
    	light = new THREE.DirectionalLight('#ffffff', 0.9);
    	light.position.set(0, 1, 1.5);
    	scene.add(light);
    	camera = new THREE.PerspectiveCamera(75,
	    window.innerWidth/window.innerHeight, 0.1, 1000);


	    // camera.position.z = 1.5;
	    // camera.position.y = 1;
	    // camera.position.x = 0;
	    renderer = new THREE.WebGLRenderer({alpha: true});
	    renderer.setSize(window.innerWidth, window.innerHeight);
	    document.body.appendChild(renderer.domElement);
	    controls = new THREE.OrbitControls( camera, renderer.domElement );
	    controls.target.set(0, 1, 0);
	    // controls.center.set( 0, 3000, 0);
	    //camera.position.set( 0, 5, 5 );
	    camera.position.set(0, 1.3, 1.5);
		controls.update();
	    var loader = new THREE.GLTFLoader();
		// Load a glTF resource
		loader.load('/resources/admin/assets/blender-files/dama/damagltf.json',
		  	function ( gltf ) {
			    scene.add( gltf.scene );
			    gltf.animations; // Array<THREE.AnimationClip>
			    gltf.scene; // THREE.Scene
			    gltf.scenes; // Array<THREE.Scene>
			    gltf.cameras; // Array<THREE.Camera>
			    gltf.asset; // Object
			    gltf.position.y=10000;

		  	},

		  	function ( xhr ) {
		    	console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );
		  	},
		  // called when loading has errors
		  	function ( error ) {
		    console.log( 'An error happened' );
		  	}
		);

  	}

    function render() {
	    requestAnimationFrame(render);
	    controls.update();
	    renderer.render(scene, camera);
    }
</script>
@endsection
