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
	Route::get('/Sintomas','MotorController@showSintomas')->name('motor.sintomas');
	Route::get('/Medicamentos','MotorController@showMedicamentos')->name('motor.medicamentos');
});

Route::prefix('hechos')->group(function(){
	Route::post('/Predisposiciones','HechosController@hechosPredisposiciones')->name('hechos.predisposiciones');
	Route::post('/Sintomas','HechosController@hechosSintomas')->name('hechos.sintomas');
	Route::post('/Medicamentos','HechosController@hechosMedicamentos')->name('hechos.medicamentos');
	Route::post('/Elementos','HechosController@hechosMedicamentos')->name('hechos.elementos');
});

Route::prefix('reglas')->group(function(){
	Route::get('/Predisposiciones','MotorController@reglasPredisposiciones')->name('reglas.predisposiciones');
	Route::get('/Sintomas','MotorController@reglasSintomas')->name('reglas.sintomas');
	Route::get('/Medicamentos/{id}','MotorController@reglasMedicamentos')->name('reglas.medicamentos');
	Route::get('/Elementos','MotorController@reglasElementos')->name('reglas.elementos');
});