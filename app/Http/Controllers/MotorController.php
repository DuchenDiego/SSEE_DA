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

use App\Hecho;

class MotorController extends Controller
{

	public function showMedicamentos(){
		//comprobar si existe el medicamento en los hechos, si es asi redireccionar
		$medicamentos=Medicinfluyente::all();

		$id=Auth::user()->id;
    	$ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
    	$diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();

		foreach ($medicamentos as $campos){
			$hechomedic=Hecho::where("medic_id","=",$campos["id"])->where("diag_id","=",$diag->id)->first();
			if($hechomedic==false){
				return view("criterios/medicinas/".$campos["name"])->with("medid",$campos["id"]);
			}
		}
		return redirect()->route('motor.sintomas');
    }

    public function showSintomas(){
        //comprobar si existe el sintoma en los hechos, si es asi redireccionar
        $sintomas=Sintoma::all();

        $id=Auth::user()->id;
        $ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
        $diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first()

        foreach ($sintomas as $campos){
            $hechosint=Hecho:::where("sinto_id","=",$campos["id"])->where("diag_id","=",$diag->id)->first();
            if($hechosint==false){
                return view("criterios/sintomas/".$campos["name"])->with("sintid",$campos["id"]);
            }

        }
    } 

    public function showPredisposiciones(){
    	$predisposiciones=Predisposicion::all();
    }

    public function reglasMedicamentos($id){
    	$idusr=Auth::user()->id;
    	$ultdiag=Diagnostico::max('numero');
    	$diag=Diagnostico::where('user_id','=',$idusr)->where('numero','=',$ultdiag)->first();

    	$hechomedi=Hecho::where('medic_id','=',$id)->first();
    	$reglamedi=Criterio::where('medic_id','=',$id)->first();

    	$conclusiones=Criterio::where('premis_id','=',$reglamedi->premis_id)->where('conclusion','=',1)->get();
    	if($hechomedi->estado==1){
    		foreach ($conclusiones as $con) {
    			$sintdes=new Hecho;
    			$sintdes->user_id=$idusr;
    			$sintdes->diag_id=$diag->id;
    			$sintdes->sinto_id=$con["sinto_id"];
    			$sintdes->estado=$con["valor"];
    			$sintdes->save();
    		}
    	}else if($hechomedi->estado==0){
    		foreach ($conclusiones as $con) {
    			$hechosinto=Hecho::where('sinto_id','=',$con["sinto_id"])->where('estado','=',0)->first();
    			if($hechosinto==true){
    				$hechosinto->delete();
    			}
    		}
    	}
    	return redirect()->route('motor.medicamentos');
    }

    public function reglasSintomas($id){

    }

    public function reglasElementos(){

    }

    public function reglasPrediposiciones($id){

    }
}
