<?php

Route::middleware(['guest'])->group(function () {
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    // Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm');
    // Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

Route::post('/login','Auth\LoginController@login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
// Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::post('/password/reset/{token}','Auth\ResetPasswordController@reset')->name('password.request');

Route::get('/', function () {
    return redirect('login');
});

// Route::get('login', function(){
//     return view('auth.login');
// });


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
        });
    });
});

