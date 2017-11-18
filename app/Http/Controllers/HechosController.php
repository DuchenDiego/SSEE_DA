<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Medicinfluyente;
use App\Hecho;
use App\Diagnostico;
use Auth;
class HechosController extends Controller
{
    public function hechosMedicamentos(Request $request){
    	$id=Auth::user()->id;
    	$ultdiag=Diagnostico::max('numero');
    	$diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();
    	$sichecked=Input::has('si');
        $nochecked=Input::has('no');
        if($sichecked==true){
        	$hechomed=Hecho::updateOrCreate(
        		['user_id'=>$id, 'diag_id'=>$diag->id, 'medic_id'=>$request->medid],
        		['estado'=>1]
        	);
        	return redirect()->route('reglas.medicamentos',['id'=>$request->medid]);
        }
        if($nochecked==true){
        	$hechomed=Hecho::updateOrCreate(
        		['user_id'=>$id, 'diag_id'=>$diag->id, 'medic_id'=>$request->medid],
        		['estado'=>0]
        	);
        	return redirect()->route('reglas.medicamentos',['id'=>$request->medid]);
        }
        if(($sichecked==true && $nochecked==true)||($sichecked==false && $nochecked==false)){
        	$medi=Medicinfluyente::where('id','=',$request->medid)->first();
        	return view("criterios/medicinas/".$medi->name)->with("medid",$medi->id);
        }
    }
}
