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
	Route::get('/','inicioController@inicio')->name('inicio.inicio');
	Route::get('/newDiagnostico','inicioController@newDiagnostico')->name('inicio.newDiagnostico');
});

Route::prefix('show')->group(function(){
	Route::get('/Predisposiciones','MotorController@showPredisposiciones')->name('motor.predisposiciones');
	Route::get('/Sintomas/{back}','MotorController@showSintomas')->name('motor.sintomas');
	Route::get('/Medicamentos/{back}','MotorController@showMedicamentos')->name('motor.medicamentos');
	Route::get('/SintomasTras/{back}','MotorController@showSintomasTrastornos')->name('motor.sinttras');
});

Route::prefix('hechos')->group(function(){
	Route::post('/Predisposiciones','HechosController@hechosPredisposiciones')->name('hechos.predisposiciones');
	Route::post('/Sintomas','HechosController@hechosSintomas')->name('hechos.sintomas');
	Route::post('/Medicamentos','HechosController@hechosMedicamentos')->name('hechos.medicamentos');
	Route::post('/Elementos','HechosController@hechosMedicamentos')->name('hechos.elementos');
	Route::post('/SintomasTras','HechosController@hechosSintomasTrastornos')->name('hechos.sintomastrastornos');

});

Route::prefix('reglas')->group(function(){
	Route::get('/Predisposiciones','MotorController@reglasPredisposiciones')->name('reglas.predisposiciones');
	Route::get('/Sintomas/{id}','MotorController@reglasSintomas')->name('reglas.sintomas');
	Route::get('/Medicamentos/{id}','MotorController@reglasMedicamentos')->name('reglas.medicamentos');
	Route::get('/Elementos/{id}','MotorController@reglasElementos')->name('reglas.elementos');

	Route::get('/SintomasTras/{id}', 'MotorController@reglasSintomasTrastornos')->name('reglas.sintomastrastornos');

	Route::get('/indicador/{valor}', 'MotorController@indicador')->name('reglas.indicador');
});

Route::prefix('resultado')->group(function(){
	Route::get('/', 'ResultadoController@resultado')->name('resultado');
	Route::get('/detalle/{iddiag}', 'ResultadoController@detalle')->name('detalle');
});

