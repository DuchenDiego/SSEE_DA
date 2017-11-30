<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Agregar
use Auth;

class PersonalLoginController extends Controller
{
    //Controlador creado para logearse como Personal

	public function __construct(){//constructor para definir el middleware y el guard respectivo
		$this->middleware('guest:personalguard');//para aquellos que no estan logeados
	}

    public function showLoginForm(){
    	return view('auth/personal-login');
    }

    public function login(Request $request){
    	//Validar los datos del formulario
    	$this->validate($request, [
    		'name' => 'required',
    		'password'=>'required|min:6'
    	]);
    	//tratar de logear al usuario
    	if(Auth::guard('personalguard')->attempt(['name'=>$request->name,'password'=>$request->password],$request->remember))// attempt automaticamente lo hashea la password 

    	//si lo logra redireccionar a la debida ruta
    	{
    		return redirect()->route('personal.dashboard');
    	}else{
            return redirect()->route('personal.login');
        }
    	//si no lo logra se redirecciona al login respectivo
    	//return redirect()->back()->withInput($request->only('name','remember'));
    	//return true;
    }
}
