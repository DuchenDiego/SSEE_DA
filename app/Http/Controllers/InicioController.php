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

class InicioController extends Controller
{
	public function estudiante(){
		$cred=Auth::user()->idcredencial;
		$estudiante=User::where('idcredencial','=',$cred)->first();
		return view("inicio/diagnostico")->with("estudiante",$estudiante->id);
		
	}
	public function diagnostico(Request $request){
		//dd($est);
		$est=$request->estudiante;
		$diagnostico=Diagnostico::where('user_id','=',$est)->first();
		//Insertar diagnostico vacio de estudiante respectivo si no existe
    	if($diagnostico==null){
    		$fecha=date("Y-m-d");
    		$hora=date("H:i:s");
    		Diagnostico::insert(array('resultado'=>"indefinido",'tipotrastorno'=>"NA",'fecha'=>$fecha,'hora'=>$hora,'user_id'=>$est,'pers_id'=>1));

   			return view("inicio/diagnostico")->with("estudiante",$est);//repetir el proceso para entrar a else
    	}else{
    		return view("inicio/criterio")->with("estudiante",$est)->with("diagnostico",$diagnostico->id);
    	}
    	
	}
	public function criterio(Request $request){
		//dd($est,$diag);
		$est=$request->estudiante;
		$diag=$request->diagnostico;
		$criterio=Criterio::where('user_id','=',$est)->first();
		//Insertar criterio de estudiante respectivo si no existe
    	if($criterio==null){
    		Criterio::insert(array('indicador'=>0,'user_id'=>$est,'diag_id'=>$diag));

    		return view("inicio/criterio")->with("estudiante",$est)->with("diagnostico",$diag);
    	}else{
    		return view("inicio/medicinfluyente")->with("criterio",$criterio->id);
    	}

	}
	public function medicinfluyente(Request $request){
		//dd($cri);
		$cri=$request->criterio;
		$medicinfluyente=Medicinfluyente::where('cri_id','=',$cri)->first();
		//insertar medicamentos inicializados en "no"
    	if($medicinfluyente==null){
    		Medicinfluyente::insert(array(
    			array('name'=>"antiasmaticos",'cri_id'=>$cri),
    			array('name'=>"inmunosupresores",'cri_id'=>$cri),
    			array('name'=>"antidepresivos",'cri_id'=>$cri),
    			array('name'=>"estatinas",'cri_id'=>$cri),
    			array('name'=>"anticonvulsivos",'cri_id'=>$cri),
    			array('name'=>"antihipertensivos",'cri_id'=>$cri),
    			array('name'=>"benzodiazepinas",'cri_id'=>$cri),
    			array('name'=>"antiinfecciosos",'cri_id'=>$cri),
    			array('name'=>"antiparasitarios",'cri_id'=>$cri),
    			array('name'=>"analgesicos",'cri_id'=>$cri),
    			array('name'=>"antimicoticos",'cri_id'=>$cri),
    			array('name'=>"antipsicoticos",'cri_id'=>$cri),
    			array('name'=>"antihistaminicos",'cri_id'=>$cri),
    			array('name'=>"antigripales",'cri_id'=>$cri),
    			array('name'=>"anticatarrales",'cri_id'=>$cri)
    		));

    		return view("inicio/medicinfluyente")->with("criterio",$cri);
    	}else{
    		return view("inicio/predisposicion")->with("criterio",$cri);
    	}
	}
	public function predisposicion(Request $request){
		//dd($cri);
		$cri=$request->criterio;
		$predisposicion=Predisposicion::where('cri_id','=',$cri)->first();
		//insertar las predisposiciones inicializadas en "no"
    	if($predisposicion==null){
    		Predisposicion::insert(array('name'=>"ansiedadparientes",'cri_id'=>$cri));

    		return view("inicio/predisposicion")->with("criterio",$cri);
    	}else{
    		return view("inicio/elemento")->with("criterio",$cri);
    	}
	}
	public function elemento(Request $request){
		//dd($cri);
		$cri=$request->criterio;
		$elemento=Elemento::where('cri_id','=',$cri)->first();
    	//insertar elementos inicializados en 0
    	if($elemento==null){
    		Elemento::insert(array(
    			array('name'=>"E_Ansioso",'cri_id'=>$cri),
    			array('name'=>"E_Tension",'cri_id'=>$cri),
    			array('name'=>"E_Miedos",'cri_id'=>$cri),
    			array('name'=>"E_Insomnio",'cri_id'=>$cri),
    			array('name'=>"E_Intelectual",'cri_id'=>$cri),
    			array('name'=>"E_Humor_Depresivo",'cri_id'=>$cri),
    			array('name'=>"E_Somatico_Muscular",'cri_id'=>$cri),
    			array('name'=>"E_Somatico_Sensorial",'cri_id'=>$cri),
    			array('name'=>"E_Sintomas_Cardiovasculares",'cri_id'=>$cri),
    			array('name'=>"E_Sintomas_Respiratorios",'cri_id'=>$cri),
    			array('name'=>"E_Sintomas_Gastrointestinales",'cri_id'=>$cri),
    			array('name'=>"E_Sintomas_Genitourinarios",'cri_id'=>$cri),
    			array('name'=>"E_Sintomas_Autonomos",'cri_id'=>$cri),
    			array('name'=>"E_Indicio_Trastorno",'cri_id'=>$cri)
    		));

    		return view("inicio/elemento")->with("criterio",$cri);
    	}else{
    		return view("inicio/sintoma")->with("criterio",$cri);
    	}
	}
	public function sintoma(Request $request){
		$cri=$request->criterio;
		//definir ids de elementos 
    	$eleansioso=Elemento::where('cri_id','=',$cri)->where('name','=','E_Ansioso')->first();
    	$eletension=Elemento::where('cri_id','=',$cri)->where('name','=','E_Tension')->first();
    	$elemiedos=Elemento::where('cri_id','=',$cri)->where('name','=','E_Miedos')->first();
    	$eleinsomnio=Elemento::where('cri_id','=',$cri)->where('name','=','E_Insomnio')->first();
    	$eleintelectual=Elemento::where('cri_id','=',$cri)->where('name','=','E_Intelectual')->first();
    	$elehumordepresivo=Elemento::where('cri_id','=',$cri)->where('name','=','E_Humor_Depresivo')->first();
    	$elesomaticomusc=Elemento::where('cri_id','=',$cri)->where('name','=','E_Somatico_Muscular')->first();
    	$elesomaticosens=Elemento::where('cri_id','=',$cri)->where('name','=','E_Somatico_Sensorial')->first();
    	$elesintcard=Elemento::where('cri_id','=',$cri)->where('name','=','E_Sintomas_Cardiovasculares')->first();
    	$elesintres=Elemento::where('cri_id','=',$cri)->where('name','=','E_Sintomas_Respiratorios')->first();
    	$elesintgastro=Elemento::where('cri_id','=',$cri)->where('name','=','E_Sintomas_Gastrointestinales')->first();
    	$elesintgenito=Elemento::where('cri_id','=',$cri)->where('name','=','E_Sintomas_Genitourinarios')->first();
    	$elesintautono=Elemento::where('cri_id','=',$cri)->where('name','=','E_Sintomas_Autonomos')->first();
    	$eleindtras=Elemento::where('cri_id','=',$cri)->where('name','=','E_Indicio_Trastorno')->first();

    	//insertar sintomas inicializados en "no"
    	if($sintoma=Sintoma::where('ele_id','=',$eleansioso->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Preocupaciones",'ele_id'=>$eleansioso->id),
    			array('name'=>"Anticipaciones_Temerosas",'ele_id'=>$eleansioso->id),
    			array('name'=>"Irritabilidad",'ele_id'=>$eleansioso->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$eletension->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Sensacion_Tension",'ele_id'=>$eletension->id),
    			array('name'=>"Fatiga",'ele_id'=>$eletension->id),
    			array('name'=>"Inquietud",'ele_id'=>$eletension->id),
    			array('name'=>"Temblor",'ele_id'=>$eletension->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elemiedos->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Miedo_Oscuridad",'ele_id'=>$elemiedos->id),
    			array('name'=>"Miedo_Extraños",'ele_id'=>$elemiedos->id),
    			array('name'=>"Miedo_Soledad",'ele_id'=>$elemiedos->id),
    			array('name'=>"Miedo_Multitudes",'ele_id'=>$elemiedos->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$eleinsomnio->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Dificultad_Dormir",'ele_id'=>$eleinsomnio->id),
    			array('name'=>"Sueno_Fragmentado",'ele_id'=>$eleinsomnio->id),
    			array('name'=>"Fatiga_Despertar",'ele_id'=>$eleinsomnio->id),
    			array('name'=>"Pesadillas",'ele_id'=>$eleinsomnio->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$eleintelectual->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Dificultad_Concentracion",'ele_id'=>$eleintelectual->id),
    			array('name'=>"Memoria_Reducida",'ele_id'=>$eleintelectual->id),
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elehumordepresivo->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Perdida_Interes",'ele_id'=>$elehumordepresivo->id),
    			array('name'=>"Ausencia_Placer_Aficiones",'ele_id'=>$elehumordepresivo->id),
    			array('name'=>"Conducta_Depresiva",'ele_id'=>$elehumordepresivo->id),
    			array('name'=>"Despertar_Anticipado",'ele_id'=>$elehumordepresivo->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesomaticomusc->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Dolores",'ele_id'=>$elesomaticomusc->id),
    			array('name'=>"Contracciones",'ele_id'=>$elesomaticomusc->id),
    			array('name'=>"Rigidez",'ele_id'=>$elesomaticomusc->id),
    			array('name'=>"Voz_Titubeante",'ele_id'=>$elesomaticomusc->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesomaticosens->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Tinnitus",'ele_id'=>$elesomaticosens->id),
    			array('name'=>"Vision_Borrosa",'ele_id'=>$elesomaticosens->id),
    			array('name'=>"Escalofrios",'ele_id'=>$elesomaticosens->id),
    			array('name'=>"Sensacion_Debilidad",'ele_id'=>$elesomaticosens->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintcard->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Taquicardia",'ele_id'=>$elesintcard->id),
    			array('name'=>"Palpitaciones",'ele_id'=>$elesintcard->id),
    			array('name'=>"Pulso_Fuerte",'ele_id'=>$elesintcard->id),
    			array('name'=>"Ausencia_Latido",'ele_id'=>$elesintcard->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintres->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Presion_Pecho",'ele_id'=>$elesintres->id),
    			array('name'=>"Sensacion_Ahogo",'ele_id'=>$elesintres->id),
    			array('name'=>"Suspiros",'ele_id'=>$elesintres->id),
    			array('name'=>"Disnea",'ele_id'=>$elesintres->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintgastro->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Nauseas",'ele_id'=>$elesintgastro->id),
    			array('name'=>"Vomito",'ele_id'=>$elesintgastro->id),
    			array('name'=>"Perdida_Peso",'ele_id'=>$elesintgastro->id),
    			array('name'=>"Estrenimiento",'ele_id'=>$elesintgastro->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintgenito->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Perdida_Libido",'ele_id'=>$elesintgenito->id),
    			array('name'=>"Frecuencia_Miccional",'ele_id'=>$elesintgenito->id),
    			array('name'=>"Impotencia",'ele_id'=>$elesintgenito->id),
    			array('name'=>"Urgencia_Miccional",'ele_id'=>$elesintgenito->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintautono->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Sofocos",'ele_id'=>$elesintautono->id),
    			array('name'=>"Tendencia_Sudor",'ele_id'=>$elesintautono->id),
    			array('name'=>"Mareos",'ele_id'=>$elesintautono->id),
    			array('name'=>"Cefalea_Tensional",'ele_id'=>$elesintautono->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$eleindtras->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Preocupacion_Excesiva_pTodo",'ele_id'=>$eleindtras->id),
    			array('name'=>"Ataques_Ansiosos_Subitos",'ele_id'=>$eleindtras->id),
    			array('name'=>"Obsesiones_o_Compulsiones",'ele_id'=>$eleindtras->id),
    			array('name'=>"Evitacion_Social",'ele_id'=>$eleindtras->id)
    		));
    	}
    	return redirect()->route('reglas.antiasmaticos.show');
    	//return redirect()->route('reglas.prueba.show');
	}
    /*public function inicializacion(){
    	$cred=Auth::user()->idcredencial;
    	$estudiante=User::where('idcredencial','=',$cred)->first();
		$diagnostico=Diagnostico::where('user_id','=',$estudiante->id)->first();
		$criterio=Criterio::where('user_id','=',$estudiante->id)->first();
		$medicinfluyente=Medicinfluyente::where('cri_id','=',$criterio->id)->first();
		$predisposicion=Predisposicion::where('cri_id','=',$criterio->id)->first();
		$elemento=Elemento::where('cri_id','=',$criterio->id)->first();
		
    	//Insertar diagnostico vacio de estudiante respectivo si no existe
    	if($diagnostico==null){
    		$fecha=date("Y-m-d");
    		$hora=date("H:i:s");
    		Diagnostico::insert(array('resultado'=>"indefinido",'tipotrastorno'=>"NA",'fecha'=>$fecha,'hora'=>$hora,'user_id'=>$estudiante->id,'pers_id'=>1));
    	}

    	//Insertar criterio de estudiante respectivo si no existe
    	if($criterio==null){
    		Criterio::insert(array('indicador'=>0,'user_id'=>$estudiante->id,'diag_id'=>$diagnostico->id));
    	}
    	//insertar medicamentos inicializados en "no"
    	if($medicinfluyente==null){
    		Medicinfluyente::insert(array(
    			array('name'=>"antiasmaticos",'cri_id'=>$criterio->id),
    			array('name'=>"inmunosupresores",'cri_id'=>$criterio->id),
    			array('name'=>"antidepresivos",'cri_id'=>$criterio->id),
    			array('name'=>"estatinas",'cri_id'=>$criterio->id),
    			array('name'=>"anticonvulsivos",'cri_id'=>$criterio->id),
    			array('name'=>"antihipertensivos",'cri_id'=>$criterio->id),
    			array('name'=>"benzodiazepinas",'cri_id'=>$criterio->id),
    			array('name'=>"antiinfecciosos",'cri_id'=>$criterio->id),
    			array('name'=>"antiparasitarios",'cri_id'=>$criterio->id),
    			array('name'=>"antibioticos",'cri_id'=>$criterio->id),
    			array('name'=>"antimicoticos",'cri_id'=>$criterio->id),
    			array('name'=>"antipsicoticos",'cri_id'=>$criterio->id),
    			array('name'=>"antihistaminicos",'cri_id'=>$criterio->id),
    			array('name'=>"antigripales",'cri_id'=>$criterio->id),
    			array('name'=>"anticatarrales",'cri_id'=>$criterio->id)
    		));
    	}
    	//insertar las predisposiciones inicializadas en "no"
    	if($predisposicion==null){
    		Predisposicion::insert(array('name'=>"ansiedadparientes",'cri_id'=>$criterio->id));
    	}
    	//insertar elementos inicializados en 0
    	if($elemento==null){
    		Elemento::insert(array(
    			array('name'=>"E_Ansioso",'cri_id'=>$criterio->id),
    			array('name'=>"E_Tension",'cri_id'=>$criterio->id),
    			array('name'=>"E_Miedos",'cri_id'=>$criterio->id),
    			array('name'=>"E_Insomnio",'cri_id'=>$criterio->id),
    			array('name'=>"E_Intelectual",'cri_id'=>$criterio->id),
    			array('name'=>"E_Humor_Depresivo",'cri_id'=>$criterio->id),
    			array('name'=>"E_Somatico_Muscular",'cri_id'=>$criterio->id),
    			array('name'=>"E_Somatico_Sensorial",'cri_id'=>$criterio->id),
    			array('name'=>"E_Sintomas_Cardiovasculares",'cri_id'=>$criterio->id),
    			array('name'=>"E_Sintomas_Respiratorios",'cri_id'=>$criterio->id),
    			array('name'=>"E_Sintomas_Gastrointestinales",'cri_id'=>$criterio->id),
    			array('name'=>"E_Sintomas_Genitourinarios",'cri_id'=>$criterio->id),
    			array('name'=>"E_Sintomas_Autonomos",'cri_id'=>$criterio->id),
    			array('name'=>"E_Indicio_Trastorno",'cri_id'=>$criterio->id)
    		));
    	}
    	//definir ids de elementos 
    	$eleansioso=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Ansioso')->first();
    	$eletension=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Tension')->first();
    	$elemiedos=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Miedos')->first();
    	$eleinsomnio=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Insomnio')->first();
    	$eleintelectual=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Intelectual')->first();
    	$elehumordepresivo=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Humor_Depresivo')->first();
    	$elesomaticomusc=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Somatico_Muscular')->first();
    	$elesomaticosens=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Somatico_Sensorial')->first();
    	$elesintcard=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Sintomas_Cardiovasculares')->first();
    	$elesintres=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Sintomas_Respiratorios')->first();
    	$elesintgastro=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Sintomas_Gastrointestinales')->first();
    	$elesintgenito=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Sintomas_Genitourinarios')->first();
    	$elesintautono=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Sintomas_Autonomos')->first();
    	$eleindtras=Elemento::where('cri_id','=',$criterio->id)->where('name','=','E_Indicio_Trastorno')->first();

    	//insertar sintomas inicializados en "no"
    	if($sintoma=Sintoma::where('ele_id','=',$eleansioso->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Preocupaciones",'ele_id'=>$eleansioso->id),
    			array('name'=>"Anticipaciones_Temerosas",'ele_id'=>$eleansioso->id),
    			array('name'=>"Irritabilidad",'ele_id'=>$eleansioso->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$eletension->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Sensacion_Tension",'ele_id'=>$eletension->id),
    			array('name'=>"Fatiga",'ele_id'=>$eletension->id),
    			array('name'=>"Inquietud",'ele_id'=>$eletension->id),
    			array('name'=>"Temblor",'ele_id'=>$eletension->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elemiedos->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Miedo_Oscuridad",'ele_id'=>$elemiedos->id),
    			array('name'=>"Miedo_Extraños",'ele_id'=>$elemiedos->id),
    			array('name'=>"Miedo_Soledad",'ele_id'=>$elemiedos->id),
    			array('name'=>"Miedo_Multitudes",'ele_id'=>$elemiedos->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$eleinsomnio->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Dificultad_Dormir",'ele_id'=>$eleinsomnio->id),
    			array('name'=>"Sueno_Fragmentado",'ele_id'=>$eleinsomnio->id),
    			array('name'=>"Fatiga_Despertar",'ele_id'=>$eleinsomnio->id),
    			array('name'=>"Pesadillas",'ele_id'=>$eleinsomnio->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$eleintelectual->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Dificultad_Concentracion",'ele_id'=>$eleintelectual->id),
    			array('name'=>"Memoria_Reducida",'ele_id'=>$eleintelectual->id),
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elehumordepresivo->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Perdida_Interes",'ele_id'=>$elehumordepresivo->id),
    			array('name'=>"Ausencia_Placer_Aficiones",'ele_id'=>$elehumordepresivo->id),
    			array('name'=>"Conducta_Depresiva",'ele_id'=>$elehumordepresivo->id),
    			array('name'=>"Despertar_Anticipado",'ele_id'=>$elehumordepresivo->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesomaticomusc->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Dolores",'ele_id'=>$elesomaticomusc->id),
    			array('name'=>"Contracciones",'ele_id'=>$elesomaticomusc->id),
    			array('name'=>"Rigidez",'ele_id'=>$elesomaticomusc->id),
    			array('name'=>"Voz_Titubeante",'ele_id'=>$elesomaticomusc->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesomaticosens->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Tinnitus",'ele_id'=>$elesomaticosens->id),
    			array('name'=>"Vision_Borrosa",'ele_id'=>$elesomaticosens->id),
    			array('name'=>"Escalofrios",'ele_id'=>$elesomaticosens->id),
    			array('name'=>"Sensacion_Debilidad",'ele_id'=>$elesomaticosens->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintcard->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Taquicardia",'ele_id'=>$elesintcard->id),
    			array('name'=>"Palpitaciones",'ele_id'=>$elesintcard->id),
    			array('name'=>"Pulso_Fuerte",'ele_id'=>$elesintcard->id),
    			array('name'=>"Ausencia_Latido",'ele_id'=>$elesintcard->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintres->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Presion_Pecho",'ele_id'=>$elesintres->id),
    			array('name'=>"Sensacion_Ahogo",'ele_id'=>$elesintres->id),
    			array('name'=>"Suspiros",'ele_id'=>$elesintres->id),
    			array('name'=>"Disnea",'ele_id'=>$elesintres->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintgastro->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Nauseas",'ele_id'=>$elesintgastro->id),
    			array('name'=>"Vomito",'ele_id'=>$elesintgastro->id),
    			array('name'=>"Perdida_Peso",'ele_id'=>$elesintgastro->id),
    			array('name'=>"Estrenimiento",'ele_id'=>$elesintgastro->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintgenito->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Perdida_Libido",'ele_id'=>$elesintgenito->id),
    			array('name'=>"Frecuencia_Miccional",'ele_id'=>$elesintgenito->id),
    			array('name'=>"Impotencia",'ele_id'=>$elesintgenito->id),
    			array('name'=>"Urgencia_Miccional",'ele_id'=>$elesintgenito->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$elesintautono->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Sofocos",'ele_id'=>$elesintautono->id),
    			array('name'=>"Tendencia_Sudor",'ele_id'=>$elesintautono->id),
    			array('name'=>"Mareos",'ele_id'=>$elesintautono->id),
    			array('name'=>"Cefalea_Tensional",'ele_id'=>$elesintautono->id)
    		));
    	}
    	if($sintoma=Sintoma::where('ele_id','=',$eleindtras->id)->first()==null){
    		Sintoma::insert(array(
    			array('name'=>"Preocupacion_Excesiva_pTodo",'ele_id'=>$eleindtras->id),
    			array('name'=>"Ataques_Ansiosos_Subitos",'ele_id'=>$eleindtras->id),
    			array('name'=>"Obsesiones_o_Compulsiones",'ele_id'=>$eleindtras->id),
    			array('name'=>"Evitacion_Social",'ele_id'=>$eleindtras->id)
    		));
    	}
    	//return redirect()->route('estudiante.base');
    }*/
}
