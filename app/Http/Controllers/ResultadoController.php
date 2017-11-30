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
    }

    public function historial(){
    	$user=Auth::user();
    	$diag=Diagnostico::where('user_id','=',$user->id)->get();
    	return view("listados/historial")->with('user',$user)->with('diag',$diag);
    }

    public function busqueda(Request $request){
    	$usercred=User::where('idcredencial','like',$request->busqueda)->get();
    	$userap=User::where('appaterno','like',$request->busqueda)->get();

    	$arruser=array();
    	if(count($usercred)>0){
    		foreach ($usercred as $ucred) {
    			$diagcred=Diagnostico::where('user_id','=',$ucred["id"])->get();
    			foreach ($diagcred as $duser) {
    				$arritem=array('credencial' =>$ucred["idcredencial"],
    							   'nombre'=>$ucred["name"],
    							   'appaterno'=>$ucred["appaterno"],
    							   'apmaterno'=>$ucred["apmaterno"],
    							   'carrera'=>$ucred["carrera"],
    							   'semestre'=>$ucred["semestre"],
    							   'fechanac'=>$ucred["fechanac"],
    							   'numdiag'=>$duser["numero"],
    							   'resultado'=>$duser["resultado"],
    							   'tipotrastorno'=>$duser["tipotrastorno"],
    							   'fecha'=>$duser["fecha"],
    							   'hora'=>$duser["hora"],
    							   'iddiag'=>$duser["id"]
    							 );
    				array_push($arruser, $arritem);
    			}
    		}
    	}
    	if(count($userap)>0){
    		foreach ($userap as $uap) {
    			$diagap=Diagnostico::where('user_id','=',$uap["id"])->get();
    			foreach ($diagap as $duserap) {
    				$arritem2=array('credencial' =>$uap["idcredencial"],
    							   'nombre'=>$uap["name"],
    							   'appaterno'=>$uap["appaterno"],
    							   'apmaterno'=>$uap["apmaterno"],
    							   'carrera'=>$uap["carrera"],
    							   'semestre'=>$uap["semestre"],
    							   'fechanac'=>$uap["fechanac"],
    							   'numdiag'=>$duserap["numero"],
    							   'resultado'=>$duserap["resultado"],
    							   'tipotrastorno'=>$duserap["tipotrastorno"],
    							   'fecha'=>$duserap["fecha"],
    							   'hora'=>$duserap["hora"],
    							   'iddiag'=>$duserap["id"]
    							 );
    				array_push($arruser, $arritem2);
    			}
    		}
    	}
    	return view("personal/busqueda")->with('listado',$arruser);	
    }

    public function ordenar(Request $request){
    	$arraux=array();
    	if($request->orden=="Apellido"){
    		$usr=User::orderBy('appaterno','ASC')->get();
    	}else if($request->orden=="Carrera"){
    		$usr=User::orderBy('carrera','DESC')->get();
    	}else if($request->orden=="Semestre"){
    		$usr=User::orderBy('semestre','ASC')->get();
    	}
 		foreach ($usr as $us ) {
    			$diagus=Diagnostico::where('user_id','=',$us["id"])->get();
    			foreach ($diagus as $dus) {
    				$arritem=array('credencial' =>$us["idcredencial"],
    							   'nombre'=>$us["name"],
    							   'appaterno'=>$us["appaterno"],
    							   'apmaterno'=>$us["apmaterno"],
    							   'carrera'=>$us["carrera"],
    							   'semestre'=>$us["semestre"],
    							   'fechanac'=>$us["fechanac"],
    							   'numdiag'=>$dus["numero"],
    							   'resultado'=>$dus["resultado"],
    							   'tipotrastorno'=>$dus["tipotrastorno"],
    							   'fecha'=>$dus["fecha"],
    							   'hora'=>$dus["hora"],
    							   'iddiag'=>$dus["id"]
    							 );
    				array_push($arraux, $arritem);
    		}
    	}   
    	return view("personal/ordenar")->with('orden',$arraux);		

    }

    public function detallepers($iddiag){
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

    	return view("personal/detallepers")->with('medic',$arrmedic)->with('sinto',$arrsinto)->with('predis',$arrpred);
    }
}
