<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Criterio;
use App\Diagnostico;
use App\Medicinfluyente;
use App\Predisposicion;
use App\Elemento;
use App\Sintoma;
use Auth;

class MedicinasController extends Controller
{
	//Base de Conocimientos

	//Excepciones Farmacológicas
    public function antiasmaticos_show(){
    	/*$idestudiante=Auth::user()->id;
    	$criterio=Criterio::where('user_id','=',$idestudiante)->first();*/
    	return view('criterios/medicinas/antiasmaticos');
    }
    public function antiasmaticos_update($id){
    	$idestudiante=Auth::user()->id;
    	$criterio=Criterio::where('user_id','=',$idestudiante)->first();
    	$antiasmatico=Medicinfluyente::where('name'="antiasmaticos")->where('cri_id'=$criterio->id);
    	if($antiasmatico->estado=="si"){
    		//se inhabilitan diferentes síntomas
    	}
    }

}
