<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('login', function(){
    return view('auth.login');
});

Route::prefix('admin')->group(function(){
    Route::get('/', function () {
        return redirect('/admin/inscritos');
    });

    Route::get('inscritos', function(){
        return view('admin.inscritos.index');
    });
    Route::get('inscritos/create', function(){
        return view('admin.inscritos.crear');
    });
    Route::get('inscritos/historial', function(){
        return view('admin.inscritos.historial');
    });
});
