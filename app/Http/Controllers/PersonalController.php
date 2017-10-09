<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /*Controlador creado a base de una duplicacion del archivo "HomeController"*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*Para que llame al guardia respectivo*/
        $this->middleware('auth:personalguard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personal/index');
    }
}
