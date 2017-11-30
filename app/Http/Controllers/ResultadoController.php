<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Criterio;
use App\Diagnostico;
use App\Medicinfluyente;
use App\Predisposicion;
use App\Elemento;
use App\Sintoma;
use App\SintomaTrastorno;
use Auth;
use Session;

use App\Hecho;

class ResultadoController extends Controller
{
    public function resultado(){
    	$user=Auth::user();
    	$ultdiag=Diagnostico::where('user_id','=',$user->id)->max('numero');
    	$diag=Diagnostico::where('user_id','=',$user->id)->where('numero','=',$ultdiag)->first();

    	return view("listados/resultado")->with('user',$user)->with('diag',$diag);

    }

    public function detalle($iddiag){
    	$medicdiag=Hecho::where('diag_id','=',$iddiag)->whereNotNull('medic_id')->where('estado','=',1)->orderBy('id','ASC')->get();
    	$sintodiag=Hecho::where('diag_id','=',$iddiag)->whereNotNull('sinto_id')->where('estado','=',1)->orderBy('id','ASC')->get();
    	$preddiag=Hecho::where('diag_id','=',$iddiag)->whereNotNull('predis_id')->where('estado','=',1)->orderBy('id','ASC')->get();

    	$arrmedic=array();
    	$arrsinto=array();
    	$arrpred=array();

    	foreach ($medicdiag as $med) {
    		$medic=Medicinfluyente::where("id","=",$med["medic_id"])->first();
    		array_push($arrmedic,$medic->name);
    	}
    	foreach($sintodiag as $sint){
    		$sinto=Sintoma::where("id","=",$sint["sinto_id"])->first();
    		array_push($arrsinto,$sinto->name);
    	}
    	foreach ($preddiag as $pred) {
    		$predis=Predisposicion::where("id","=",$pred["predis_id"])->first();
    		array_push($arrpred,$pred->name);
    	}

    	return view("listados/detalle")->with('medic',$arrmedic)->with('sinto',$arrsinto)->with('predis',$arrpred);

    	/*$medicdiag=Hecho::where('diag_id','=',$iddiag)->whereNotNull('medic_id')->orderBy('id','ASC')->get();
    	$sintodiag=Hecho::where('diag_id','=',$iddiag)->whereNotNull('sinto_id')->orderBy('id','ASC')->get();
    	$preddiag=Hecho::where('diag_id','=',$iddiag)->whereNotNull('predis_id')->orderBy('id','ASC')->get();

    	$arrmedic=array();
    	$arrsinto=array();
    	$arrpred=array();

    	foreach ($medicdiag as $med) {
    		$medic=Medicinfluyente::where("id","=",$med["medic_id"])->first();
    		array_push($arrmedic,$medic->name);
    	}
    	foreach($sintodiag as $sint){
    		$sinto=Sintoma::where("id","=",$sint["sinto_id"])->first();
    		array_push($arrsinto,$sinto->name);
    	}
    	foreach ($preddiag as $pred) {
    		$predis=Predisposicion::where("id","=",$pred["predis_id"])->first();
    		array_push($arrpred,$pred->name);
    	}

    	return view("listados/detalle")->with('medic',$arrmedic)->with('sinto',$arrsinto)->with('predis',$arrpred)->with('medicdiag',$medicdiag)->with('sintodiag',$sintodiag)->with('preddiag',$preddiag);*/
    }
}
