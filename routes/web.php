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

/*Route::get('/', function () {
    return view('home');
});*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('personal')->group(function(){
	Route::get('/login','Auth\PersonalLoginController@showLoginForm')->name('personal.login');
	Route::post('/login','Auth\PersonalLoginController@login')->name('personal.login.submit');
	Route::get('/', 'PersonalController@index')->name('personal.dashboard');
});

Route::prefix('inicio')->group(function(){
	Route::get('/estudiante','inicioController@estudiante')->name('inicio.estudiante');
	Route::post('/diagnostico','inicioController@diagnostico')->name('inicio.diagnostico');
});

Route::prefix('medicinas')->group(function(){
	Route::get('/antiasmaticos/show','MedicinasController@antiasmaticos_show')->name('medicinas.antiasmaticos.show');
	Route::put('/antiasmaticos/{id}','MedicinasController@antiasmaticos_update')->name('medicinas.antiasmaticos.update');
});
