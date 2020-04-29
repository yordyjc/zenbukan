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

Route::get('/', function () {
    return redirect('login');
});

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

            Route::resource('lista-administrador','Admin\AdministradoresController');
            Route::get('/perfil-admin','Admin\AdministradoresController@perfil');
            Route::post('/perfil-admin','Admin\AdministradoresController@modificarfoto');
            Route::get('/perfil-admin/modificar','Admin\AdministradoresController@obtenerperfil');
            Route::put('/perfil-admin/modificar','Admin\AdministradoresController@modificarperfil');
            Route::get('/perfil/confirmpass','Admin\AdministradoresController@confirmpass');
            Route::post('/perfil/changepass','Admin\AdministradoresController@changepass');

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
        });
    });

    Route::prefix('user')->group(function(){
        Route::get('/',function(){
            return redirect('/user/mificha');
        });
        Route::get('/actual','user\PerfilController@actual');
        Route::get('/perfil','user\PerfilController@verperfil');
        Route::get('/mificha','user\PerfilController@mificha');
        Route::get('/reporte','user\PerfilController@reporte');
        Route::get('/periodo/{id}','user\PerfilController@verperiodo');
    });
});

