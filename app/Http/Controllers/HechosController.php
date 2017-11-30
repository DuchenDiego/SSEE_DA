<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Medicinfluyente;
use App\Criterio;
use App\Hecho;
use App\Predisposicion;
use App\Diagnostico;
use App\Sintoma;
use App\SintomaTrastorno;
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

    public function hechosPredisposiciones(Request $request){
        $id=Auth::user()->id;
        $ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
        $diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();
        $cripred=Criterio::where('predis_id','=',$request->predid)->first();
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');

        if($sichecked==true){
            $hechopred=Hecho::updateOrCreate(
                ['user_id'=>$id, 'numPremisa'=>$cripred->premis_id,'diag_id'=>$diag->id, 'predis_id'=>$request->predid],
                ['estado'=>1]
            );
           return redirect()->route('reglas.indicador',['valor'=>2]);
        }
        if($nochecked==true){
            $hechospred=Hecho::updateOrCreate(
                ['user_id'=>$id,'numPremisa'=>$cripred->premis_id,'diag_id'=>$diag->id, 'predis_id'=>$request->predid],
                ['estado'=>0]
            );
            return redirect()->route('reglas.indicador',['valor'=>0]);
        }
        if(($sichecked==true && $nochecked==true)||($sichecked==false && $nochecked==false)){
            $pred=Predisposicion::where('id','=',$request->predid)->first();
            return view("criterios/predisposiciones/".$pred->name)->with("predid",$pred->id);
        }
    }

    public function hechosSintomasTrastornos(Request $request){
        //fake(hc)
        $id=Auth::user()->id;
        $ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
        $diag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();

        $sichecked=Input::has('si');
        $nochecked=Input::has('no');

         if($sichecked==true){
            $hechosinttras=Hecho::updateOrCreate(
                ['user_id'=>$id, 'numPremisa'=>204,'diag_id'=>$diag->id, 'sinttras_id'=>$request->sinttrasid],
                ['estado'=>1]
            );
           return redirect()->route('reglas.sintomastrastornos',['id'=>$request->sinttrasid]);
        }
        if($nochecked==true){
            $hechosinttras=Hecho::updateOrCreate(
                ['user_id'=>$id,'numPremisa'=>204,'diag_id'=>$diag->id, 'sinttras_id'=>$request->sinttrasid],
                ['estado'=>0]
            );
            return redirect()->route('reglas.sintomastrastornos',['id'=>$request->sinttrasid]);
        }
        if(($sichecked==true && $nochecked==true)||($sichecked==false && $nochecked==false)){
            $sinttras=SintomaTrastorno::where('id','=',$request->sinttrasid)->first();
            return view("criterios/sintomastrastornos/".$sinttras->name)->with("sinttrasid",$sinttras->id);
        }
    }
}
