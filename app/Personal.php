<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Personal extends Authenticatable
{
    use Notifiable;

    //Se debe especificar el guarda con el que trabajará el modelo
    protected $guard = 'personalguard';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password','Su'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*public function diagnosticos(){
        return $this->hasMany("App\Diagnostico","pers_id");
    }*/
    
}
