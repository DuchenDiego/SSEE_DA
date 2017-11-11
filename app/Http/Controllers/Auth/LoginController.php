<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
/*Para login personalizado se debe llamar a Request:*/
use Illuminate\Http\Request;

class LoginController extends Controller
{

    


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'inicio/estudiante';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*Codigo extra para login custom, sobreescritura de metodos*/
    public function username()
    {
        return 'idcredencial';
    }
    protected function credentials(Request $request)
    {
        $usernameInput = trim($request->{$this->username()});
        $usernameColumn = filter_var($usernameInput, FILTER_VALIDATE_EMAIL) ? 'email' : $this->username();

        return [$usernameColumn => $usernameInput, 'password' => $request->password];
    }
}
