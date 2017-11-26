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
use Session;

use App\Hecho;

class MotorController extends Controller
{

	public function showMedicamentos($back){
        //recibir parametro para saber si se presionó adelante o back
        //si fue back: retornar la vista del último registro de medicamento de hechos
        //si fue adelante:comprobar si existe el medicamento en los hechos, si es asi redireccionar, si no, retornar vista del medicamento faltante
		$medicamentos=Medicinfluyente::all();

		$id=Auth::user()->id;
    	$ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
    	$diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();

        if($back==1){
            $idult=Hecho::where("diag_id","=",$diag->id)->max('medic_id');
            $ultmedic=Medicinfluyente::where("id","=",$idult)->first();
            return view("criterios/medicinas/".$ultmedic->name)->with("medid",$ultmedic->id);
        }
        if($back==0){
            foreach ($medicamentos as $campos){
                $hechomedic=Hecho::where("medic_id","=",$campos["id"])->where("diag_id","=",$diag->id)->first();
                if($hechomedic==false){
                    return view("criterios/medicinas/".$campos["name"])->with("medid",$campos["id"]);
                }
            }  
        }

		return redirect()->route('motor.sintomas', ['back'=>0]);
    }

    public function showSintomas($back){
        //el mismo procedimiento que showMedicamentos
        $sintomas=Sintoma::all();

        $id=Auth::user()->id;
        $ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
        $diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();

        if($back==1){
             //para borrado de registro de valor de elemento if back
            $finelemento=Session::get('finelemento');
            $valorback=Session::get('valorback');
            if($finelemento==1){
                Session::put('backelemento',1);
                return redirect()->route('reglas.indicador', ['valor'=>$valorback]);
            }

            $idult=Hecho::where("diag_id","=",$diag->id)->where('numPremisa','>',15)->max('sinto_id');
            $ultsinto=Sintoma::where("id","=",$idult)->first();
            if($ultsinto==true){
               return view("criterios/sintomas/".$ultsinto->name)->with("sintid",$ultsinto->id); 
            }
        }

        //Session::put('finelemento',0);//Confirmacion de fin de elemento nula

        foreach($sintomas as $campos){
                $hechosint=Hecho::where("sinto_id","=",$campos["id"])->where("diag_id","=",$diag->id)->first();
                if($hechosint==false){
                    return view("criterios/sintomas/".$campos["name"])->with("sintid",$campos["id"]);
                }
            }           

        return redirect()->route('motor.predisposiciones');
    } 

    public function showPredisposiciones(){
    	$predisposiciones=Predisposicion::all();
    }

    public function reglasMedicamentos($id){
        //Comprobar si el estado del hecho registrado es positivo, si es así, registrar las conclusiones de sintomas correspondientes, si no, verificar si existen y si es asi eliminarlas
    	$idusr=Auth::user()->id;
    	$ultdiag=Diagnostico::max('numero');
    	$diag=Diagnostico::where('user_id','=',$idusr)->where('numero','=',$ultdiag)->first();

    	$hechomedi=Hecho::where('medic_id','=',$id)->where('diag_id','=',$diag->id)->first();
    	$reglamedi=Criterio::where('medic_id','=',$id)->first();

    	$conclusiones=Criterio::where('premis_id','=',$reglamedi->premis_id)->where('conclusion','=',1)->get();
    	if($hechomedi->estado==1){
    		foreach ($conclusiones as $con) {
                $findcon=Hecho::where('user_id','=',$idusr)->where('diag_id','=',$diag->id)->where('sinto_id','=',$con["sinto_id"])->where('estado','=',$con["valor"])->first();
                if($findcon==false){
                    $sintdes=new Hecho;
                    $sintdes->numPremisa=$reglamedi->premis_id;
                    $sintdes->user_id=$idusr;
                    $sintdes->diag_id=$diag->id;
                    $sintdes->sinto_id=$con["sinto_id"];
                    $sintdes->estado=$con["valor"];
                    $sintdes->save();
                }
                /*$sintdes=Hecho::updateOrCreate(
                ['user_id'=>$idusr,'diag_id'=>$diag->id, 'sinto_id'=>$con["sinto_id"], 'estado'=>$con["valor"]],
                ['numPremisa'=>$reglamedi->premis_id]
                );*/
    		}
    	}else if($hechomedi->estado==0){
    		foreach ($conclusiones as $con) {
    			$hechosinto=Hecho::where('sinto_id','=',$con["sinto_id"])->where('estado','=',0)->where('numPremisa','=',$con["premis_id"])->where('diag_id','=',$diag->id)->first();
    			if($hechosinto==true){
    				$hechosinto->delete();
    			}
    		}
    	}
    	return redirect()->route('motor.medicamentos', ['back'=>0]);
    }

    public function reglasSintomas($id){
        //verificar si se registraron todos los sitomas del elemento, si es asi redireccionar a reglas.elementos, si no es así redireccionar a motor.sintomas
        $idusr=Auth::user()->id;
        $ultdiag=Diagnostico::max('numero');
        $diag=Diagnostico::where('user_id','=',$idusr)->where('numero','=',$ultdiag)->first();

        $sintoma=Sintoma::where('id','=',$id)->first();
        $sintosdeelemento=Sintoma::where('elem_id','=',$sintoma->elem_id)->get();//todos los sintomas relacionados de acuerdo al id de elemento

        $contador=0;
        foreach ($sintosdeelemento as $sint) {
            $hechosint=Hecho::where('sinto_id','=',$sint["id"])->where('diag_id','=',$diag->id)->first();
            if($hechosint==true){
                $contador++;
            }else{
                return redirect()->route('motor.sintomas', ['back'=>0]);
            }
            /*$hechosint=Hecho::where('sinto_id','=',$sint["id"])->where('diag_id','=',$diag->id)->first();
            $critsint=Criterio::where('sinto_id','=',$sint["id"])->where('conclusion','=',1)->first();
            if($hechosint==false && $critsint==false){
                return redirect()->route('motor.sintomas');
            }*/
        }
        if(count($sintosdeelemento)==$contador){
            return redirect()->route('reglas.elementos',['id'=>$sintoma->elem_id]);
        }
        //$numhechosint=Hecho::where('sinto_id','=',$sintoma->id)->count();
        //return redirect()->route('reglas.elementos',['id'=>$sintoma->elem_id]);
    }

    public function reglasElementos($id){
        $idusr=Auth::user()->id;
        $ultdiag=Diagnostico::max('numero');
        $diag=Diagnostico::where('user_id','=',$idusr)->where('numero','=',$ultdiag)->first();

        //Elemento Determinado
        $elemento=Criterio::where('elem_id','=',$id)->where('conclusion','=',1)->get();
        //Cantidad de sintomas de elemento 
        $sintoma=Criterio::where('premis_id','=',$elemento[0]->premis_id)->where('conclusion','=',0)->get();
        //array para verificar si los sintomas ingresados concuerdan con la premisa
        $verificar=array();
        //Para cada elemento verificar si sus sintomas tienen el mismo valor que los registrados
        foreach ($elemento as $ele) {
            $sintomaele=Criterio::where('premis_id','=',$ele["premis_id"])->where('conclusion','=',0)->get();
            foreach ($sintomaele as $sint) {
                $hechosint=Hecho::where('sinto_id','=',$sint["sinto_id"])->where('diag_id','=',$diag->id)->first();
                if($hechosint->estado==$sint["valor"]){
                    array_push($verificar, 1);//si tiene el mismo valor, agregar 1 al array
                }else{
                    array_push($verificar, 0);
                }
                if(count($verificar)==count($sintoma)){// si el array auxiliar es del mismo tamaño que la cantidad de sintomas
                    $esigual=count(array_unique($verificar));
                    $esuno=array_unique($verificar);
                    if($esigual==1 && $esuno[0]==1){// si todos los elementos del array son iguales y si su valor es 1
                        $hechoele=Hecho::updateOrCreate(
                            ['user_id'=>$idusr,'diag_id'=>$diag->id, 'elem_id'=>$ele["elem_id"]],
                            ['estado'=>$ele["valor"],'numPremisa'=>$ele["premis_id"]]
                        );
                        Session::put('valorback',$ele["valor"]);//en caso de retroceder en un registro de elemento
                        Session::put('finelemento',1);//confirmacion de ultimo sintoma de elemento
                        Session::put('backelemento',0);
                        return redirect()->route('reglas.indicador',['valor'=>$ele["valor"]]);
                        break;
                    }
                    $verificar=array();
                }
            }
        }
        return redirect()->route('motor.sintomas', ['back'=>0]);
    }

    public function indicador($valor){
        $idusr=Auth::user()->id;
        $ultdiag=Diagnostico::max('numero');
        $diag=Diagnostico::where('user_id','=',$idusr)->where('numero','=',$ultdiag)->first();

        $backelemento=Session::get('backelemento');
        if($backelemento==1){
            $diag->indicador=$diag->indicador-$valor;
            $diag->save();
            Session::put('finelemento',0);
            return redirect()->route('motor.sintomas', ['back'=>1]);
        }
        if($backelemento==0){
            $diag->indicador=$diag->indicador+$valor;
            $diag->save();
        }

        if($diag->indicador>=0 && $diag->indicador<6){
            $diag->resultado="Sin Ansiedad";
            $diag->save();
        }else if($diag->indicador>=6 && $diag->indicador<15){
            $diag->resultado="Ansiedad Menor";
            $diag->save();
        }else if($diag->indicador>=15){ 
            $diag->resultado="Síndrome Ansioso";
            $diag->save();
            return redirect()->route('motor.crittras');
        }
        Session::put('backelemento',0);
        return redirect()->route('motor.sintomas', ['back'=>0]);
    }

    public function reglasPrediposiciones($id){
        
    }
}
