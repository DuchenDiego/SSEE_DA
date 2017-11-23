<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnostico;
use Auth;

class InicioController extends Controller
{
	public function inicio(){
		$id=Auth::user()->id;
        $isDiag=Diagnostico::where('user_id','=',$id)->first();
        if($isDiag==true){
            return view("inicio/old");
        }else{
            return view("inicio/new");
        }
	}

    public function  newDiagnostico(){

        //Si el resultado del ultimo diagnostico es indefinido no se crea un nuevo diagnostico y se continua con ese
        $id=Auth::user()->id;
        $ultdiag=Diagnostico::where('user_id','=',$id)->max('numero');
        $lastdiag=Diagnostico::where('user_id','=',$id)->where('numero','=',$ultdiag)->first();
        if($lastdiag==false || $lastdiag->resultado!="indefinido"){
            $fecha=date("Y-m-d");
            $hora=date("H:i:s");
            $num=Diagnostico::where('user_id','=',$id)->count();
            $diag=new Diagnostico;
            $diag->numero=$num+1;
            $diag->indicador=0;
            $diag->resultado="indefinido";
            $diag->fecha=$fecha;
            $diag->hora=$hora;
            $diag->user_id=$id;
            $diag->save();
        }
        return redirect()->route('motor.medicamentos', ['back'=>0]);
    }

}
