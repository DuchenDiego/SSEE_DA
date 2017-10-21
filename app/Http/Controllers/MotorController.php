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

class MotorController extends Controller
{
	//Motor de Inferencia

    public function base(){
    	/*$idestudiante=Auth::user()->id;
    	$criterio=Criterio::where('user_id','=',$idestudiante)->first();*/
    	//return redirect()->route('medicinas.antiasmaticos');
    }
}
