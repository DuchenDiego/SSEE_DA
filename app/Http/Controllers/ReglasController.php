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
use Illuminate\Support\Facades\Input;

class ReglasController extends Controller
{
    public function elementos(){
        $idestudiante=Auth::user()->id;
        $criterio=Criterio::where('user_id','=',$idestudiante)->first();

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

        $idcriterio=$criterio->id;//0
        $ideleansioso=$eleansioso->id;//1 Ansioso
        $ideletension=$eletension->id;//2 Tension
        $idelemiedos=$elemiedos->id;//3 Miedos
        $ideleinsomnio=$eleinsomnio->id;//4 Insomnio
        $ideleintelectual=$eleintelectual->id;//5 Intelectual
        $idelehumordepresivo=$elehumordepresivo->id;//6 Humor Depresivo
        $idelesomaticomusc=$elesomaticomusc->id;//7 Somatico Muscular
        $idelesomaticosens=$elesomaticosens->id;//8 Somatico Sensorial
        $idelesintcard=$elesintcard->id;//9 Sintomas Cardiovasculares
        $idelesintres=$elesintres->id;//10 Sintomas respiratorios
        $idelesintgastro=$elesintgastro->id;//11 Sintomas Gastrointestinales
        $idelesintgenito=$elesintgenito->id;//12 Sintomas Genitourinarios
        $idelesintautono=$elesintautono->id;//13 Sintomas Autonomos
        $ideleindtras=$eleindtras->id;//14 Indicio Trastorno
        

        $arrelementos=array($idcriterio,$ideleansioso,$ideletension,$idelemiedos,$ideleinsomnio,$ideleintelectual,$idelehumordepresivo,$idelesomaticomusc,$idelesomaticosens,$idelesintcard,$idelesintres,$idelesintgastro,$idelesintgenito,$idelesintautono,$ideleindtras);
        return $arrelementos;
    }
    
    public function sintomas(){
        $preocupaciones=Sintoma::where('name','=','Preocupaciones')->where('ele_id','=',$this->elementos()[1])->first();//0
        $anticipaciones=Sintoma::where('name','=','Anticipaciones_Temerosas')->where('ele_id','=',$this->elementos()[1])->first();//1
        $irritabilidad=Sintoma::where('name','=','Irritabilidad')->where('ele_id','=',$this->elementos()[1])->first();//2
        $tension=Sintoma::where('name','=','Sensacion_Tension')->where('ele_id','=',$this->elementos()[2])->first();//3
        $fatiga=Sintoma::where('name','=','Fatiga')->where('ele_id','=',$this->elementos()[2])->first();//4
        $inquietud=Sintoma::where('name','=','Inquietud')->where('ele_id','=',$this->elementos()[2])->first();//5
        $temblor=Sintoma::where('name','=','Temblor')->where('ele_id','=',$this->elementos()[2])->first();//6
        $mieoscuridad=Sintoma::where('name','=','Miedo_Oscuridad')->where('ele_id','=',$this->elementos()[3])->first();//7
        $mieextraños=Sintoma::where('name','=','Miedo_Extraños')->where('ele_id','=',$this->elementos()[3])->first();//8
        $miesoledad=Sintoma::where('name','=','Miedo_Soledad')->where('ele_id','=',$this->elementos()[3])->first();//9
        $miemultitudes=Sintoma::where('name','=','Miedo_Multitudes')->where('ele_id','=',$this->elementos()[3])->first();//10
        $difdormir=Sintoma::where('name','=','Dificultad_Dormir')->where('ele_id','=',$this->elementos()[4])->first();//11
        $suefragmentado=Sintoma::where('name','=','Sueno_Fragmentado')->where('ele_id','=',$this->elementos()[4])->first();//12
        $fatidespert=Sintoma::where('name','=','Fatiga_Despertar')->where('ele_id','=',$this->elementos()[4])->first();//13
        $pesadi=Sintoma::where('name','=','Pesadillas')->where('ele_id','=',$this->elementos()[4])->first();//14
        $difconc=Sintoma::where('name','=','Dificultad_Concentracion')->where('ele_id','=',$this->elementos()[5])->first();//15
        $memred=Sintoma::where('name','=','Memoria_Reducida')->where('ele_id','=',$this->elementos()[5])->first();//16
        $perdinteres=Sintoma::where('name','=','Perdida_Interes')->where('ele_id','=',$this->elementos()[6])->first();//17
        $ausplacer=Sintoma::where('name','=','Ausencia_Placer_Aficiones')->where('ele_id','=',$this->elementos()[6])->first();//18
        $conddepre=Sintoma::where('name','=','Conducta_Depresiva')->where('ele_id','=',$this->elementos()[6])->first();//19
        $despantic=Sintoma::where('name','=','Despertar_Anticipado')->where('ele_id','=',$this->elementos()[6])->first();//20
        $dolores=Sintoma::where('name','=','Dolores')->where('ele_id','=',$this->elementos()[7])->first();//21
        $contracciones=Sintoma::where('name','=','Contracciones')->where('ele_id','=',$this->elementos()[7])->first();//22
        $rigidez=Sintoma::where('name','=','Rigidez')->where('ele_id','=',$this->elementos()[7])->first();//23
        $voztitub=Sintoma::where('name','=','Voz_Titubeante')->where('ele_id','=',$this->elementos()[7])->first();//24
        $tinnitus=Sintoma::where('name','=','Tinnitus')->where('ele_id','=',$this->elementos()[8])->first();//25
        $visionborr=Sintoma::where('name','=','Vision_Borrosa')->where('ele_id','=',$this->elementos()[8])->first();//26
        $escalofrios=Sintoma::where('name','=','Escalofrios')->where('ele_id','=',$this->elementos()[8])->first();//27
        $sensdeb=Sintoma::where('name','=','Sensacion_Debilidad')->where('ele_id','=',$this->elementos()[8])->first();//28
        $taquicardia=Sintoma::where('name','=','Taquicardia')->where('ele_id','=',$this->elementos()[9])->first();//29
        $palpitaciones=Sintoma::where('name','=','Palpitaciones')->where('ele_id','=',$this->elementos()[9])->first();//30
        $pulsfuerte=Sintoma::where('name','=','Pulso_Fuerte')->where('ele_id','=',$this->elementos()[9])->first();//31
        $auslatido=Sintoma::where('name','=','Ausencia_Latido')->where('ele_id','=',$this->elementos()[9])->first();//32
        $presionpech=Sintoma::where('name','=','Presion_Pecho')->where('ele_id','=',$this->elementos()[10])->first();//33
        $sensaho=Sintoma::where('name','=','Sensacion_Ahogo')->where('ele_id','=',$this->elementos()[10])->first();//34
        $suspiros=Sintoma::where('name','=','Suspiros')->where('ele_id','=',$this->elementos()[10])->first();//35
        $disnea=Sintoma::where('name','=','Disnea')->where('ele_id','=',$this->elementos()[10])->first();//36
        $nauseas=Sintoma::where('name','=','Nauseas')->where('ele_id','=',$this->elementos()[11])->first();//37
        $vomito=Sintoma::where('name','=','Vomito')->where('ele_id','=',$this->elementos()[11])->first();//38
        $perdidapeso=Sintoma::where('name','=','Perdida_Peso')->where('ele_id','=',$this->elementos()[11])->first();//39
        $estreñi=Sintoma::where('name','=','Estrenimiento')->where('ele_id','=',$this->elementos()[11])->first();//40
        $perdidalib=Sintoma::where('name','=','Perdida_Libido')->where('ele_id','=',$this->elementos()[12])->first();//41
        $frecuenciamic=Sintoma::where('name','=','Frecuencia_Miccional')->where('ele_id','=',$this->elementos()[12])->first();//42
        $impotencia=Sintoma::where('name','=','Impotencia')->where('ele_id','=',$this->elementos()[12])->first();//43
        $urgmic=Sintoma::where('name','=','Urgencia_Miccional')->where('ele_id','=',$this->elementos()[12])->first();//44
        $sofocos=Sintoma::where('name','=','Sofocos')->where('ele_id','=',$this->elementos()[13])->first();//45
        $tendenciasu=Sintoma::where('name','=','Tendencia_Sudor')->where('ele_id','=',$this->elementos()[13])->first();//46
        $mareos=Sintoma::where('name','=','Mareos')->where('ele_id','=',$this->elementos()[13])->first();//47
        $cefatens=Sintoma::where('name','=','Cefalea_Tensional')->where('ele_id','=',$this->elementos()[13])->first();//48
        $preocupexe=Sintoma::where('name','=','Preocupacion_Excesiva_pTodo')->where('ele_id','=',$this->elementos()[14])->first();//49
        $ataquesans=Sintoma::where('name','=','Ataques_Ansiosos_Subitos')->where('ele_id','=',$this->elementos()[14])->first();//50
        $obscompul=Sintoma::where('name','=','Obsesiones_o_Compulsiones')->where('ele_id','=',$this->elementos()[14])->first();//51
        $evitasocial=Sintoma::where('name','=','Evitacion_Social')->where('ele_id','=',$this->elementos()[14])->first();//52
        
        $arrsintomas=array($preocupaciones,$anticipaciones,$irritabilidad,$tension,$fatiga,$inquietud,$temblor,$mieoscuridad,$mieextraños,$miesoledad,$miemultitudes,$difdormir,$suefragmentado,$fatidespert,$pesadi,$difconc,$memred,$perdinteres,$ausplacer,$conddepre,$despantic,$dolores,$contracciones,$rigidez,$voztitub,$tinnitus,$visionborr,$escalofrios,$sensdeb,$taquicardia,$palpitaciones,$pulsfuerte,$auslatido,$presionpech,$sensaho,$suspiros,$disnea,$nauseas,$vomito,$perdidapeso,$estreñi,$perdidalib,$frecuenciamic,$impotencia,$urgmic,$sofocos,$tendenciasu,$mareos,$cefatens,$preocupexe,$ataquesans,$obscompul,$evitasocial);
        return $arrsintomas;
    }

	//Base de Conocimientos

	//Excepciones Farmacológicas
    //Regla1
    public function antiasmaticos_show(){
    	return view('criterios/medicinas/antiasmaticos');
    }
    public function antiasmaticos_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
    	$antiasmatico=Medicinfluyente::where('name','=',"antiasmaticos")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $antiasmatico->estado="si";
            $antiasmatico->save();

            $tension=Sintoma::where('name','=',"Sensacion_Tension")->where('ele_id','=',$this->elementos()[2])->first();
            $temblor=Sintoma::where('name','=',"Temblor")->where('ele_id','=',$this->elementos()[2])->first();
            $inquietud=Sintoma::where('name','=',"Inquietud")->where('ele_id','=',$this->elementos()[2])->first();
            $dolor=Sintoma::where('name','=',"Dolores")->where('ele_id','=',$this->elementos()[7])->first();
            $nauseas=Sintoma::where('name','=',"Nauseas")->where('ele_id','=',$this->elementos()[11])->first();
            $vomitos=Sintoma::where('name','=',"Vomito")->where('ele_id','=',$this->elementos()[11])->first();
            $difdormir=Sintoma::where('name','=',"Dificultad_Dormir")->where('ele_id','=',$this->elementos()[4])->first();

            $tension->habilitado="no";
            $temblor->habilitado="no";
            $inquietud->habilitado="no";
            $dolor->habilitado="no";
            $nauseas->habilitado="no";
            $vomitos->habilitado="no";
            $difdormir->habilitado="no";

            $tension->save();
            $temblor->save();
            $inquietud->save();
            $dolor->save();
            $nauseas->save();
            $vomitos->save();
            $difdormir->save();

            return redirect()->route('reglas.inmunosupresores.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $antiasmatico->estado="no";
            $antiasmatico->save();
            return redirect()->route('reglas.inmunosupresores.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/antiasmatico');
        }
    }

    //Regla 2
    public function inmunosupresores_show(){
        return view('criterios/medicinas/inmunosupresores');
    }
    public function inmunosupresores_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $inmunosupresor=Medicinfluyente::where('name','=',"inmunosupresores")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $inmunosupresor->estado="si";
            $inmunosupresor->save();

            $temblor=Sintoma::where('name','=',"Temblor")->where('ele_id','=',$this->elementos()[2])->first();
            $nauseas=Sintoma::where('name','=',"Nauseas")->where('ele_id','=',$this->elementos()[11])->first();
            $vomitos=Sintoma::where('name','=',"Vomito")->where('ele_id','=',$this->elementos()[11])->first();
            $fatiga=Sintoma::where('name','=',"Fatiga")->where('ele_id','=',$this->elementos()[2])->first();
            $sensdebil=Sintoma::where('name','=',"Sensacion_Debilidad")->where('ele_id','=',$this->elementos()[8])->first();

            $temblor->habilitado="no";
            $nauseas->habilitado="no";
            $vomitos->habilitado="no";
            $fatiga->habilitado="no";
            $sensdebil->habilitado="no";

            $temblor->save();
            $nauseas->save();
            $vomitos->save();
            $fatiga->save();;
            $sensdebil->save();

            return redirect()->route('reglas.antidepresivos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $inmunosupresor->estado="no";
            $inmunosupresor->save();

            return redirect()->route('reglas.antidepresivos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/inmunosupresores');
        }
    }

    //Regla 3
    public function antidepresivos_show(){
        return view('criterios/medicinas/antidepresivos');
    }
    public function antidepresivos_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $antidepresivo=Medicinfluyente::where('name','=',"antidepresivos")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $antidepresivo->estado="si";
            $antidepresivo->save();

            $nauseas=Sintoma::where('name','=',"Nauseas")->where('ele_id','=',$this->elementos()[11])->first();
            $fatiga=Sintoma::where('name','=',"Fatiga")->where('ele_id','=',$this->elementos()[2])->first();
            $difdormir=Sintoma::where('name','=',"Dificultad_Dormir")->where('ele_id','=',$this->elementos()[4])->first();
            $tension=Sintoma::where('name','=',"Sensacion_Tension")->where('ele_id','=',$this->elementos()[2])->first();
            $dolor=Sintoma::where('name','=',"Dolores")->where('ele_id','=',$this->elementos()[7])->first();
            $estreñi=Sintoma::where('name','=',"Estrenimiento")->where('ele_id','=',$this->elementos()[11])->first();
            $preocupa=Sintoma::where('name','=',"Preocupaciones")->where('ele_id','=',$this->elementos()[1])->first();
            $perdidalib=Sintoma::where('name','=',"Perdida_Libido")->where('ele_id','=',$this->elementos()[12])->first();

            $nauseas->habilitado="no";
            $fatiga->habilitado="no";
            $difdormir->habilitado="no";
            $tension->habilitado="no";
            $dolor->habilitado="no";
            $estreñi->habilitado="no";
            $preocupa->habilitado="no";
            $perdidalib->habilitado="no";

            $nauseas->save();
            $fatiga->save();
            $difdormir->save();
            $tension->save();
            $dolor->save();
            $estreñi->save();
            $preocupa->save();
            $perdidalib->save();

             return redirect()->route('reglas.estatinas.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $antidepresivo->estado="no";
            $antidepresivo->save();

            return redirect()->route('reglas.estatinas.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/antidepresivos');
        }
    }

    //Regla 4
    public function estatinas_show(){
        return view('criterios/medicinas/estatinas');
    }
    public function estatinas_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $estatina=Medicinfluyente::where('name','=',"estatinas")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $estatina->estado="si";
            $estatina->save();

            $memred=Sintoma::where('name','=',"Memoria_Reducida")->where('ele_id','=',$this->elementos()[5])->first();
            $dolor=Sintoma::where('name','=',"Dolores")->where('ele_id','=',$this->elementos()[7])->first();

            $memred->habilitado="no";
            $dolor->habilitado="no";

            $memred->save();
            $dolor->save();
            
            return redirect()->route('reglas.anticonvulsivos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $estatina->estado="no";
            $estatina->save();

           return redirect()->route('reglas.anticonvulsivos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/estatinas');
        }
    }

    //Regla 5
    public function anticonvulsivos_show(){
        return view('criterios/medicinas/anticonvulsivos');
    }
    public function anticonvulsivos_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $anticonvulsivo=Medicinfluyente::where('name','=',"anticonvulsivos")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $anticonvulsivo->estado="si";
            $anticonvulsivo->save();

            $mareos=Sintoma::where('name','=',"Mareos")->where('ele_id','=',$this->elementos()[13])->first();
            $dolor=Sintoma::where('name','=',"Dolores")->where('ele_id','=',$this->elementos()[7])->first();
            $sensdebil=Sintoma::where('name','=',"Sensacion_Debilidad")->where('ele_id','=',$this->elementos()[8])->first();
            

            $mareos->habilitado="no";
            $dolor->habilitado="no";
            $sensdebil->habilitado="no";

            $mareos->save();
            $dolor->save();
            $sensdebil->save();
            
            return redirect()->route('reglas.antihipertensivos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $anticonvulsivo->estado="no";
            $anticonvulsivo->save();

           return redirect()->route('reglas.antihipertensivos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/anticonvulsivos');
        }
    }

    //Regla 6
    public function antihipertensivos_show(){
        return view('criterios/medicinas/antihipertensivos');
    }
    public function antihipertensivos_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $antihipertensivo=Medicinfluyente::where('name','=',"antihipertensivos")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $antihipertensivo->estado="si";
            $antihipertensivo->save();

            $mareos=Sintoma::where('name','=',"Mareos")->where('ele_id','=',$this->elementos()[13])->first();
            $nauseas=Sintoma::where('name','=',"Nauseas")->where('ele_id','=',$this->elementos()[11])->first();
            $estreñi=Sintoma::where('name','=',"Estrenimiento")->where('ele_id','=',$this->elementos()[11])->first();
            $vomitos=Sintoma::where('name','=',"Vomito")->where('ele_id','=',$this->elementos()[11])->first();
            $impot=Sintoma::where('name','=',"Impotencia")->where('ele_id','=',$this->elementos()[12])->first();
            $temblor=Sintoma::where('name','=',"Temblor")->where('ele_id','=',$this->elementos()[2])->first();
            $inquietud=Sintoma::where('name','=',"Inquietud")->where('ele_id','=',$this->elementos()[2])->first();
            $sensdebil=Sintoma::where('name','=',"Sensacion_Debilidad")->where('ele_id','=',$this->elementos()[8])->first();
            $dolor=Sintoma::where('name','=',"Dolores")->where('ele_id','=',$this->elementos()[7])->first();

            $mareos->habilitado="no";
            $nauseas->habilitado="no";
            $estreñi->habilitado="no";
            $vomitos->habilitado="no";
            $impot->habilitado="no";
            $temblor->habilitado="no";
            $inquietud->habilitado="no";
            $sensdebil->habilitado="no";
            $dolor->habilitado="no";


            $mareos->save();
            $nauseas->save();
            $estreñi->save();
            $vomitos->save();
            $impot->save();
            $temblor->save();
            $inquietud->save();
            $sensdebil->save();
            $dolor->save();
            
            return redirect()->route('reglas.benzodiazepinas.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $antihipertensivo->estado="no";
            $antihipertensivo->save();

           return redirect()->route('reglas.benzodiazepinas.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/antihipertensivos');
        }
    }

    //Regla 7
    public function benzodiazepinas_show(){
        return view('criterios/medicinas/benzodiazepinas');
    }
    public function benzodiazepinas_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $benzodiazepina=Medicinfluyente::where('name','=',"benzodiazepinas")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $benzodiazepina->estado="si";
            $benzodiazepina->save();

            $memred=Sintoma::where('name','=',"Memoria_Reducida")->where('ele_id','=',$this->elementos()[5])->first();
            $difdormir=Sintoma::where('name','=',"Dificultad_Dormir")->where('ele_id','=',$this->elementos()[4])->first();
            $pesadi=Sintoma::where('name','=',"Pesadillas")->where('ele_id','=',$this->elementos()[4])->first();
            $temblor=Sintoma::where('name','=',"Temblor")->where('ele_id','=',$this->elementos()[2])->first();
            $inquietud=Sintoma::where('name','=',"Inquietud")->where('ele_id','=',$this->elementos()[2])->first();
            $irrita=Sintoma::where('name','=',"Irritabilidad")->where('ele_id','=',$this->elementos()[1])->first();

            $memred->habilitado="no";
            $difdormir->habilitado="no";
            $pesadi->habilitado="no";
            $temblor->habilitado="no";
            $inquietud->habilitado="no";
            $irrita->habilitado="no";


            $memred->save();
            $difdormir->save();
            $pesadi->save();
            $temblor->save();
            $inquietud->save();
            $irrita->save();

            return redirect()->route('reglas.antiinfeccpara.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $benzodiazepina->estado="no";
            $benzodiazepina->save();

           return redirect()->route('reglas.antiinfeccpara.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/benzodiazepinas');
        }
    }

    //Regla 8
    public function antiinfeccpara_show(){
        return view('criterios/medicinas/antiinfeccpara');
    }
    public function antiinfeccpara_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $antiinfeccioso=Medicinfluyente::where('name','=',"antiinfecciosos")->where('cri_id','=',$this->elementos()[0])->first();
        $antiparasitario=Medicinfluyente::where('name','=',"antiparasitarios")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $antiinfeccioso->estado="si";
            $antiinfeccioso->save();
            $antiparasitario->estado="si";
            $antiparasitario->save();

            $mareos=Sintoma::where('name','=',"Mareos")->where('ele_id','=',$this->elementos()[13])->first();
            $dolor=Sintoma::where('name','=',"Dolores")->where('ele_id','=',$this->elementos()[7])->first();
            $nauseas=Sintoma::where('name','=',"Nauseas")->where('ele_id','=',$this->elementos()[11])->first();
            $vomitos=Sintoma::where('name','=',"Vomito")->where('ele_id','=',$this->elementos()[11])->first();
            $tinnitus=Sintoma::where('name','=',"Tinnitus")->where('ele_id','=',$this->elementos()[8])->first();
            

            $mareos->habilitado="no";
            $dolor->habilitado="no";
            $nauseas->habilitado="no";
            $vomitos->habilitado="no";
            $tinnitus->habilitado="no";

            $mareos->save();
            $dolor->save();
            $nauseas->save();
            $vomitos->save();
            $tinnitus->save();
            
            return redirect()->route('reglas.analgesicos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $antiinfeccioso->estado="si";
            $antiinfeccioso->save();
            $antiparasitario->estado="si";
            $antiparasitario->save();

           return redirect()->route('reglas.analgesicos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/antiinfeccpara');
        }
    }

    //Regla 9
    public function analgesicos_show(){
        return view('criterios/medicinas/analgesicos');
    }
    public function analgesicos_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $analgesico=Medicinfluyente::where('name','=',"analgesicos")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $analgesico->estado="si";
            $analgesico->save();

            
            $sensdebil=Sintoma::where('name','=',"Sensacion_Debilidad")->where('ele_id','=',$this->elementos()[8])->first();
            $difdormir=Sintoma::where('name','=',"Dificultad_Dormir")->where('ele_id','=',$this->elementos()[4])->first();
            $pesadi=Sintoma::where('name','=',"Pesadillas")->where('ele_id','=',$this->elementos()[4])->first();

            $difdormir->habilitado="no";
            $pesadi->habilitado="no";
            $sensdebil->habilitado="no";

            $difdormir->save();
            $pesadi->save();
            $sensdebil->save();
            
            return redirect()->route('reglas.antimicoticos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $analgesico->estado="no";
            $analgesico->save();

           return redirect()->route('reglas.antimicoticos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/analgesicos');
        }
    }

    //Regla 10
    public function antimicoticos_show(){
        return view('criterios/medicinas/antimicoticos');
    }
    public function antimicoticos_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $antimicotico=Medicinfluyente::where('name','=',"antimicoticos")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $antimicotico->estado="si";
            $antimicotico->save();

            $nauseas=Sintoma::where('name','=',"Nauseas")->where('ele_id','=',$this->elementos()[11])->first();
            $vomitos=Sintoma::where('name','=',"Vomito")->where('ele_id','=',$this->elementos()[11])->first();
            $temblor=Sintoma::where('name','=',"Temblor")->where('ele_id','=',$this->elementos()[2])->first();
            $dolor=Sintoma::where('name','=',"Dolores")->where('ele_id','=',$this->elementos()[7])->first();

            $nauseas->habilitado="no";
            $vomitos->habilitado="no";
            $temblor->habilitado="no";
            $dolor->habilitado="no";

            $nauseas->save();
            $vomitos->save();
            $temblor->save();
            $dolor->save();
            
            return redirect()->route('reglas.antipsicoticos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $antimicotico->estado="no";
            $antimicotico->save();

           return redirect()->route('reglas.antipsicoticos.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/antimicoticos');
        }
    }

    //Regla 11
    public function antipsicoticos_show(){
        return view('criterios/medicinas/antipsicoticos');
    }
    public function antipsicoticos_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $antipsicoticos=Medicinfluyente::where('name','=',"antipsicoticos")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $antipsicoticos->estado="si";
            $antipsicoticos->save();

            $sensdebil=Sintoma::where('name','=',"Sensacion_Debilidad")->where('ele_id','=',$this->elementos()[8])->first();
            $taqui=Sintoma::where('name','=',"Taquicardia")->where('ele_id','=',$this->elementos()[9])->first();
            $pulso=Sintoma::where('name','=',"Pulso_Fuerte")->where('ele_id','=',$this->elementos()[9])->first();
            $rigidez=Sintoma::where('name','=',"Rigidez")->where('ele_id','=',$this->elementos()[7])->first();
            $sudor=Sintoma::where('name','=',"Tendencia_Sudor")->where('ele_id','=',$this->elementos()[13])->first();

            $sensdebil->habilitado="no";
            $taqui->habilitado="no";
            $pulso->habilitado="no";
            $rigidez->habilitado="no";
            $sudor->habilitado="no";

            $sensdebil->save();
            $taqui->save();
            $pulso->save();
            $rigidez->save();
            $sudor->save();
            
            return redirect()->route('reglas.antihistacata.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $antipsicoticos->estado="no";
            $antipsicoticos->save();

           return redirect()->route('reglas.antihistacata.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/antipsicoticos');
        }
    }

     //Regla 12
    public function antihistacata_show(){
        return view('criterios/medicinas/antihistacata');
    }
    public function antihistacata_update(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $antihistaminico=Medicinfluyente::where('name','=',"antihistaminicos")->where('cri_id','=',$this->elementos()[0])->first();
        $anticatarrales=Medicinfluyente::where('name','=',"anticatarrales")->where('cri_id','=',$this->elementos()[0])->first();
        if($sichecked==true){
            $antihistaminico->estado="si";
            $antihistaminico->save();
            $anticatarrales->estado="si";
            $anticatarrales->save();

            $sensdebil=Sintoma::where('name','=',"Sensacion_Debilidad")->where('ele_id','=',$this->elementos()[8])->first();
            $estreñi=Sintoma::where('name','=',"Estrenimiento")->where('ele_id','=',$this->elementos()[11])->first();
            $taqui=Sintoma::where('name','=',"Taquicardia")->where('ele_id','=',$this->elementos()[9])->first();
            $irrita=Sintoma::where('name','=',"Irritabilidad")->where('ele_id','=',$this->elementos()[1])->first();
            $temblor=Sintoma::where('name','=',"Temblor")->where('ele_id','=',$this->elementos()[2])->first();
            $inquietud=Sintoma::where('name','=',"Inquietud")->where('ele_id','=',$this->elementos()[2])->first();
            $dolor=Sintoma::where('name','=',"Dolores")->where('ele_id','=',$this->elementos()[7])->first();

            $sensdebil->habilitado="no";
            $taqui->habilitado="no";
            $estreñi->habilitado="no";
            $irrita->habilitado="no";
            $temblor->habilitado="no";
            $inquietud->habilitado="no";
            $dolor->habilitado="no";

            $sensdebil->save();
            $taqui->save();
            $estreñi->save();
            $irrita->save();
            $temblor->save();
            $inquietud->save();
            $dolor->save();
            
            return redirect()->route('reglas.preocupaciones.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($nochecked==true){
            $antihistaminico->estado="no";
            $antihistaminico->save();
            $anticatarrales->estado="no";
            $anticatarrales->save();

           return redirect()->route('reglas.preocupaciones.show');//cambiar cuando se tenga un metodo de busqueda
        }
        if($sichecked==true && $nochecked==true){
            return view('criterios/medicinas/antihistacata');
        }
    }

    //Sintomas

    //Elemento Ansioso
    //Reglas 13-20
    public function preocupaciones_show(){
        if($this->sintomas()[0]->habilitado=="si"){
            return view('criterios/sintomas/preocupaciones');
        }else{
            return redirect()->route('reglas.anticipaciones.show');
        }
    }
    public function preocupaciones_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[0];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.anticipaciones.show');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.anticipaciones.show');
        }
    } 

    public function anticipaciones_show(){
        if($this->sintomas()[1]->habilitado=="si"){
            return view('criterios/sintomas/anticipaciones');
        }else{
            return redirect()->route('reglas.irritabilidad.show');
        }
    }

     public function anticipaciones_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[1];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.irritabilidad.show');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.irritabilidad.show');
        }
    } 

    public function irritabilidad_show(){
        if($this->sintomas()[2]->habilitado=="si"){
            return view('criterios/sintomas/irritabilidad');
        }else{
            return redirect()->route('reglas.ele_ansioso');
        }
    }

     public function irritabilidad_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[2];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.ele_ansioso');
            //dd($sintoma);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.ele_ansioso');
        }
    }

    public function ele_ansioso(){
        $eleansioso=Elemento::where('id','=',$this->elementos()[1])->where('name','=','E_Ansioso')->first();
        $sintoma1=$this->sintomas()[0];
        $sintoma2=$this->sintomas()[1];
        $sintoma3=$this->sintomas()[2];
        if($sintoma1->estado=='si' && $sintoma2->estado=='si' && $sintoma3->estado=='si'){
            $eleansioso->estado="4";
            $eleansioso->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="si" && $sintoma3->estado==="no"){
            $eleansioso->estado="3";
            $eleansioso->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="no"){
            $eleansioso->estado="1";
            $eleansioso->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="no"){
            $eleansioso->estado="0";
            $eleansioso->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="si"){
            $eleansioso->estado="3";
            $eleansioso->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="no"){
            $eleansioso->estado="1";
            $eleansioso->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="si"){
            $eleansioso->estado="1";
            $eleansioso->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="si"){
            $eleansioso->estado="3";
            $eleansioso->save();
        }

        return redirect()->route('reglas.tension.show');
    }

    //Elemento Tensión
    //Reglas 21-36
    public function tension_show(){
        if($this->sintomas()[3]->habilitado=="si"){
            return view('criterios/sintomas/tension');
        }else{
            return redirect()->route('reglas.fatiga.show');
        }
    }
    public function tension_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[3];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.fatiga.show');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.fatiga.show');
        }
    } 

    public function fatiga_show(){
        if($this->sintomas()[4]->habilitado=="si"){
            return view('criterios/sintomas/fatiga');
        }else{
            return redirect()->route('reglas.inquietud.show');
        }
    }
    public function fatiga_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[4];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.inquietud.show');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.inquietud.show');
        }
    } 

    public function inquietud_show(){
        if($this->sintomas()[5]->habilitado=="si"){
            return view('criterios/sintomas/inquietud');
        }else{
            return redirect()->route('reglas.temblor.show');
        }
    }
    public function inquietud_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[5];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.temblor.show');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.temblor.show');
        }
    } 

    public function temblor_show(){
        if($this->sintomas()[6]->habilitado=="si"){
            return view('criterios/sintomas/temblor');
        }else{
            return redirect()->route('reglas.ele_tension');
        }
    }
    public function temblor_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[6];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.ele_tension');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.ele_tension');
        }
    } 

    public function ele_tension(){
        $eletension=Elemento::where('id','=',$this->elementos()[2])->where('name','=','E_Tension')->first();
        $sintoma1=$this->sintomas()[3];
        $sintoma2=$this->sintomas()[4];
        $sintoma3=$this->sintomas()[5];
        $sintoma4=$this->sintomas()[6];
        if($sintoma1->estado=='si' && $sintoma2->estado=='si' && $sintoma3->estado=='si' && $sintoma4->estado=='si'){
            $eletension->estado="4";
            $eletension->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="si" && $sintoma3->estado==="si" && $sintoma4->estado==="no"){
            $eletension->estado="3";
            $eletension->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="si" && $sintoma3->estado==="no" && $sintoma4->estado==="si"){
            $eletension->estado="3";
            $eletension->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="si" && $sintoma3->estado==="no" && $sintoma4->estado==="no"){
            $eletension->estado="2";
            $eletension->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="si" && $sintoma4->estado==="si"){
            $eletension->estado="3";
            $eletension->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="si" && $sintoma4->estado==="no"){
            $eletension->estado="2";
            $eletension->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="no" && $sintoma4->estado==="si"){
            $eletension->estado="2";
            $eletension->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="no" && $sintoma4->estado==="no"){
            $eletension->estado="1";
            $eletension->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="si" && $sintoma4->estado==="si"){
            $eletension->estado="3";
            $eletension->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="si" && $sintoma4->estado==="no"){
            $eletension->estado="2";
            $eletension->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="no" && $sintoma4->estado==="si"){
            $eletension->estado="2";
            $eletension->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="no" && $sintoma4->estado==="no"){
            $eletension->estado="1";
            $eletension->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="si" && $sintoma4->estado==="si"){
            $eletension->estado="2";
            $eletension->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="si" && $sintoma4->estado==="no"){
            $eletension->estado="1";
            $eletension->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="no" && $sintoma4->estado==="si"){
            $eletension->estado="1";
            $eletension->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="no" && $sintoma4->estado==="no"){
            $eletension->estado="0";
            $eletension->save();
        }

        return redirect()->route('reglas.miedoscuridad.show');
    }

    //Elemento Miedo
    //Reglas 37-53
    public function miedoscuridad_show(){
        if($this->sintomas()[7]->habilitado=="si"){
            return view('criterios/sintomas/miedoscuridad');
        }else{
            return redirect()->route('reglas.miedoextraños.show');
        }
    }
    public function miedoscuridad_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[7];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.miedoextraños.show');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.miedoextraños.show');
        }
    } 

    public function miedoextraños_show(){
        if($this->sintomas()[8]->habilitado=="si"){
            return view('criterios/sintomas/miedoextraños');
        }else{
            return redirect()->route('reglas.miedosoledad.show');
        }
    }
    public function miedoextraños_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[8];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.miedosoledad.show');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.miedosoledad.show');
        }
    } 

    public function miedosoledad_show(){
        if($this->sintomas()[9]->habilitado=="si"){
            return view('criterios/sintomas/miedosoledad');
        }else{
            return redirect()->route('reglas.miedomultitud.show');
        }
    }
    public function miedosoledad_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[9];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.miedomultitud.show');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.miedomultitud.show');
        }
    } 

    public function miedomultitud_show(){
        if($this->sintomas()[10]->habilitado=="si"){
            return view('criterios/sintomas/miedomultitud');
        }else{
            return redirect()->route('reglas.ele_miedo');
        }
    }
    public function miedomultitud_upd(Request $request){
        $sichecked=Input::has('si');
        $nochecked=Input::has('no');
        $sintoma=$this->sintomas()[10];
        if($sichecked==true){
            $sintoma->estado="si";
            $sintoma->save();
            return redirect()->route('reglas.ele_miedo');
            //dd($sintoma->estado);
        }else if($nochecked==true){
            $sintoma->estado="no";
            $sintoma->save();
            return redirect()->route('reglas.ele_miedo');
        }
    } 

    public function ele_miedo(){
        $elemiedos=Elemento::where('id','=',$this->elementos()[3])->where('name','=','E_Miedos')->first();
        $sintoma1=$this->sintomas()[7];
        $sintoma2=$this->sintomas()[8];
        $sintoma3=$this->sintomas()[9];
        $sintoma4=$this->sintomas()[10];
        if($sintoma1->estado=='si' && $sintoma2->estado=='si' && $sintoma3->estado=='si' && $sintoma4->estado=='si'){
            $elemiedos->estado="4";
            $elemiedos->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="si" && $sintoma3->estado==="si" && $sintoma4->estado==="no"){
            $elemiedos->estado="3";
            $elemiedos->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="si" && $sintoma3->estado==="no" && $sintoma4->estado==="si"){
            $elemiedos->estado="3";
            $elemiedos->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="si" && $sintoma3->estado==="no" && $sintoma4->estado==="no"){
            $elemiedos->estado="2";
            $elemiedos->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="si" && $sintoma4->estado==="si"){
            $elemiedos->estado="3";
            $elemiedos->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="si" && $sintoma4->estado==="no"){
            $elemiedos->estado="2";
            $elemiedos->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="no" && $sintoma4->estado==="si"){
            $elemiedos->estado="2";
            $elemiedos->save();
        }else if($sintoma1->estado==="si" && $sintoma2->estado==="no" && $sintoma3->estado==="no" && $sintoma4->estado==="no"){
            $elemiedos->estado="1";
            $elemiedos->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="si" && $sintoma4->estado==="si"){
            $elemiedos->estado="3";
            $elemiedos->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="si" && $sintoma4->estado==="no"){
            $elemiedos->estado="2";
            $elemiedos->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="no" && $sintoma4->estado==="si"){
            $elemiedos->estado="2";
            $elemiedos->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="si" && $sintoma3->estado==="no" && $sintoma4->estado==="no"){
            $elemiedos->estado="1";
            $elemiedos->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="si" && $sintoma4->estado==="si"){
            $elemiedos->estado="2";
            $elemiedos->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="si" && $sintoma4->estado==="no"){
            $elemiedos->estado="1";
            $elemiedos->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="no" && $sintoma4->estado==="si"){
            $elemiedos->estado="1";
            $elemiedos->save();
        }else if($sintoma1->estado==="no" && $sintoma2->estado==="no" && $sintoma3->estado==="no" && $sintoma4->estado==="no"){
            $elemiedos->estado="0";
            $elemiedos->save();
        }

       // return redirect()->route('reglas.miedoscuridad.show');
    }

}
