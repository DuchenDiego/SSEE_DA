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
	Route::post('/criterio','inicioController@criterio')->name('inicio.criterio');
	Route::post('/medicinfluyente','inicioController@medicinfluyente')->name('inicio.medicinfluyente');
	Route::post('/predisposicion','inicioController@predisposicion')->name('inicio.predisposicion');
	Route::post('/elemento','inicioController@elemento')->name('inicio.elemento');
	Route::post('/sintoma','inicioController@sintoma')->name('inicio.sintoma');
});

Route::prefix('conocimiento')->group(function(){
	Route::get('/antiasmaticos/show','ReglasController@antiasmaticos_show')->name('reglas.antiasmaticos.show');
	Route::post('/antiasmaticos/update','ReglasController@antiasmaticos_update')->name('reglas.antiasmaticos.update');
	Route::get('/inmunosupresores/show','ReglasController@inmunosupresores_show')->name('reglas.inmunosupresores.show');
	Route::post('/inmunosupresores/update','ReglasController@inmunosupresores_update')->name('reglas.inmunosupresores.update');
	Route::get('/antidepresivos/show','ReglasController@antidepresivos_show')->name('reglas.antidepresivos.show');
	Route::post('/antidepresivos/update','ReglasController@antidepresivos_update')->name('reglas.antidepresivos.update');
	Route::get('/estatinas/show','ReglasController@estatinas_show')->name('reglas.estatinas.show');
	Route::post('/estatinas/update','ReglasController@estatinas_update')->name('reglas.estatinas.update');
	Route::get('/anticonvulsivos/show','ReglasController@anticonvulsivos_show')->name('reglas.anticonvulsivos.show');
	Route::post('/anticonvulsivos/update','ReglasController@anticonvulsivos_update')->name('reglas.anticonvulsivos.update');
	Route::get('/antihipertensivos/show','ReglasController@antihipertensivos_show')->name('reglas.antihipertensivos.show');
	Route::post('/antihipertensivos/update','ReglasController@antihipertensivos_update')->name('reglas.antihipertensivos.update');
	Route::get('/benzodiazepinas/show','ReglasController@benzodiazepinas_show')->name('reglas.benzodiazepinas.show');
	Route::post('/benzodiazepinas/update','ReglasController@benzodiazepinas_update')->name('reglas.benzodiazepinas.update');
	Route::get('/antiinfeccpara/show','ReglasController@antiinfeccpara_show')->name('reglas.antiinfeccpara.show');
	Route::post('/antiinfeccpara/update','ReglasController@antiinfeccpara_update')->name('reglas.antiinfeccpara.update');
	Route::get('/analgesicos/show','ReglasController@analgesicos_show')->name('reglas.analgesicos.show');
	Route::post('/analgesicos/update','ReglasController@analgesicos_update')->name('reglas.analgesicos.update');
	Route::get('/antimicoticos/show','ReglasController@antimicoticos_show')->name('reglas.antimicoticos.show');
	Route::post('/antimicoticos/update','ReglasController@antimicoticos_update')->name('reglas.antimicoticos.update');
	Route::get('/antipsicoticos/show','ReglasController@antipsicoticos_show')->name('reglas.antipsicoticos.show');
	Route::post('/antipsicoticos/update','ReglasController@antipsicoticos_update')->name('reglas.antipsicoticos.update');
	Route::get('/antihistacata/show','ReglasController@antihistacata_show')->name('reglas.antihistacata.show');
	Route::post('/antihistacata/update','ReglasController@antihistacata_update')->name('reglas.antihistacata.update');
});
