<?php

Route::middleware(['guest'])->group(function () {
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

Route::post('/login','Auth\LoginController@login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset/{token}','Auth\ResetPasswordController@reset')->name('password.request');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::get('/sin-permiso', function (){
            return view('errors.permiso');
        });

        Route::middleware(['admin'])->group(function () {
            Route::get('/', function () {
                return redirect('/admin/inscritos');
            });
            Route::resource('/inscritos','Admin\InscritosController');
            Route::get('/fichas','Admin\FichasController@listaFichas');
            Route::get('/ver-ficha/{correlativo}','Admin\FichasController@verFicha');
            // Route::get('/ver-datos-historicos/{correlativo}','Admin\FichasController@verHistorial');
            Route::get('/crear-periodo/{correlativo}','Admin\PeriodosController@formCrear');
            Route::resource('/periodos','Admin\PeriodosController');
            Route::get('/simulacion/{correlativo}','Admin\SimulacionController@ver');

            //administradores
            Route::resource('lista-administrador','Admin\AdministradoresController');
            Route::get('/perfil-admin','Admin\AdministradoresController@perfil');
            Route::post('/perfil-admin','Admin\AdministradoresController@modificarfoto');
            Route::get('/perfil-admin/modificar','Admin\AdministradoresController@obtenerperfil');
            Route::put('/perfil-admin/modificar','Admin\AdministradoresController@modificarperfil');
            Route::get('/perfil/confirmpass','Admin\AdministradoresController@confirmpass');
            Route::post('/perfil/changepass','Admin\AdministradoresController@changepass');

            //pagina-web
            Route::resource('configuracion-general','Admin\ConfiguracionesController');
            Route::resource('/fondos','Admin\FondosController');
            Route::resource('/productos','Admin\ProductosController');
            Route::resource('/servicios','Admin\ServiciosController');
            Route::resource('/planes','Admin\PlanesController');
            Route::resource('/pre-inscritos','Admin\PreInscritosController');
            Route::resource('/pre-inscritos-contactados','Admin\PreInscritosContactadosController');
            Route::resource('/suscriptores','Admin\SuscriptoresController');
            Route::resource('/contacto','Admin\ContactoController');
            Route::resource('/pases-gratis','Admin\PasesController');

            //galeria de videos
            Route::resource('galeria-videos','Admin\GaleriasController');
            Route::get('galeria-videos/video/lista','Admin\GaleriasController@listaVideos');
            Route::get('galeria-videos/videos/subir','Admin\GaleriasController@subirVideo');
            Route::post('galeria-videos/videos/guardar','Admin\GaleriasController@guardarVideo');
            Route::delete('galeria-videos/video/lista/{id}','Admin\GaleriasController@eliminarVideo');

            //reportes
            Route::get('/reporte-fechas/','Admin\ReportesController@fechasGet');
            Route::post('/reporte-fechas/','Admin\ReportesController@fechasPost');
            Route::get('/reporte-fechas-excel','Admin\ReportesController@fechasExcel');

            Route::get('/reporte-sexo/','Admin\ReportesController@sexoGet');
            Route::post('/reporte-sexo/','Admin\ReportesController@sexoPost');
            Route::get('/reporte-sexo-excel','Admin\ReportesController@sexoExcel');

            Route::get('/reporte-objetivo/','Admin\ReportesController@objetivoGet');
            Route::post('/reporte-objetivo/','Admin\ReportesController@objetivoPost');
            Route::get('/reporte-objetivo-excel','Admin\ReportesController@objetivoExcel');

            Route::get('/cumpleanos-mes/','Admin\ReportesController@cumpleanosGet');
            Route::post('/cumpleanos-mes/','Admin\ReportesController@cumpleanosPost');
            Route::get('/reporte-cumpleanos-excel','Admin\ReportesController@cumpleanosExcel');

            Route::get('/backup','Admin\FichasController@backup');
            Route::get('/generar-backup','Admin\FichasController@generarBackup');

             //Zenbukan
             Route::resource('torneos','Admin\TorneosController');
             Route::resource('clubes','Admin\ClubesController');
             //competidores
             Route::resource('/inscripciones', 'Admin\InscripcionesController');
             Route::get('inscripciones/nuevo/{id}','Admin\InscripcionesController@frmCrear');
             Route::get('inscripciones/editar/{id}','Admin\InscripcionesController@frmEditar');
             Route::post('inscripciones/categoria', 'Admin\InscripcionesController@obtenerCategoria');
             //reportes
             Route::get('/sorteo','Admin\ReportesController@frmSorteo');
             Route::post('/sorteo','Admin\ReportesController@generarSorteo');

        });
    });

    Route::prefix('user')->group(function(){
        Route::get('/',function(){
            return redirect('/user/mificha');
        });
        //ficha
        Route::get('/actual','user\FichaController@actual');
        Route::get('/perfil','user\FichaController@verperfil');
        Route::get('/mificha','user\FichaController@mificha');
        Route::get('/reporte','user\FichaController@reporte');
        Route::get('/periodo/{id}','user\FichaController@verperiodo');

        //perfil
        Route::get('/perfil-user','user\PerfilController@perfil');
        Route::post('/perfil-user','user\PerfilController@modificarfoto');
        Route::get('/perfil-user/modificar','user\PerfilController@obtenerperfil');
        Route::put('/perfil-user/modificar','user\PerfilController@modificarperfil');
        Route::post('/perfil-user/changepass','user\PerfilController@changepass');
        Route::get('/perfil-user/confirmpass','user\PerfilController@confirmpass');
    });
});

Route::get('/','Front\FrontController@index');
Route::get('/imc','Front\FrontController@imc');
Route::get('/productos','Front\FrontController@listaProductos');
Route::get('/productos/{slug}','Front\FrontController@detalleProducto');
Route::get('/servicios','Front\FrontController@listaServicios');
Route::get('/planes','Front\FrontController@listaPlanes');
Route::get('/pre-inscripcion','Front\FrontController@formPreInscripcion');
Route::post('/pre-inscripcion','Front\FrontController@sendPreInscripcion');
Route::post('/suscribirse','Front\FrontController@sendSuscripcion');
Route::get('/contacto', 'Front\FrontController@formContacto');
Route::post('/contacto', 'Front\FrontController@sendContacto');
Route::get('/galerias-videos','Front\FrontController@galeriasVideos');
Route::get('/galerias-videos/{id}','Front\FrontController@videos');
Route::get('/pase-gratis','Front\FrontController@formPase');
Route::post('/pase-gratis','Front\FrontController@sendPase');
Route::get('/mision-vision','Front\FrontController@misionVision');
Route::get('/horarios','Front\FrontController@horarios');
Route::get('/entrenamiento-kids','Front\FrontController@entrenamientoKids');
Route::get('/maternidad-fitness','Front\FrontController@maternidad');
Route::get('/corporativo','Front\FrontController@corporativo');

//Zenbukan
Route::get('/torneos','Front\FrontController@listaTorneos');
Route::get('/torneos/{id}','Front\FrontController@torneo');
