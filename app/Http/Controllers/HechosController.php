<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Medicinfluyente;
use App\Criterio;
use App\Hecho;
use App\Diagnostico;
use App\Sintoma;
use Auth;
class HechosController extends Controller
{
    public function hechosMedicamentos(Request $request){
    	$id=Auth::user()->id;
    	$ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
    	$diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();
        $crimedic=Criterio::where('medic_id','=',$request->medid)->first();
    	$sichecked=Input::has('si');
        $nochecked=Input::has('no');
        if($sichecked==true){
        	$hechomed=Hecho::updateOrCreate(
        		['user_id'=>$id, 'numPremisa'=>$crimedic->premis_id,'diag_id'=>$diag->id, 'medic_id'=>$request->medid],
        		['estado'=>1]
        	);
        	return redirect()->route('reglas.medicamentos',['id'=>$request->medid]);
        }
        if($nochecked==true){
        	$hechomed=Hecho::updateOrCreate(
        		['user_id'=>$id, 'numPremisa'=>$crimedic->premis_id,'diag_id'=>$diag->id, 'medic_id'=>$request->medid],
        		['estado'=>0]
        	);
        	return redirect()->route('reglas.medicamentos',['id'=>$request->medid]);
        }
        if(($sichecked==true && $nochecked==true)||($sichecked==false && $nochecked==false)){
        	$medi=Medicinfluyente::where('id','=',$request->medid)->first();
        	return view("criterios/medicinas/".$medi->name)->with("medid",$medi->id);
        }
    }

    public function hechosSintomas(Request $request){
        $id=Auth::user()->id;
        $ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
        $diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();
        $crisint=Criterio::where('sinto_id','=',$request->sintid)->first();
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
         if($sichecked==true){
            $hechosint=Hecho::updateOrCreate(
                ['user_id'=>$id, 'numPremisa'=>$crisint->premis_id,'diag_id'=>$diag->id, 'sinto_id'=>$request->sintid],
                ['estado'=>1]
            );
            return redirect()->route('reglas.sintomas',['id'=>$request->sintid]);
        }
        if($nochecked==true){
            $hechosint=Hecho::updateOrCreate(
                ['user_id'=>$id,'numPremisa'=>$crisint->premis_id,'diag_id'=>$diag->id, 'sinto_id'=>$request->sintid],
                ['estado'=>0]
            );
            return redirect()->route('reglas.sintomas',['id'=>$request->sintid]);
        }
        if(($sichecked==true && $nochecked==true)||($sichecked==false && $nochecked==false)){
            $sint=Sintoma::where('id','=',$request->sintid)->first();
            return view("criterios/sintomas/".$sint->name)->with("sintid",$sint->id);
        }
    }
}
