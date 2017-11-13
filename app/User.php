<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'idcredencial', 'password','appaterno','apmaterno','carrera','semestre','fechanac'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function diagnosticos(){
        return $this->hasMany("App\Diagnostico","user_id");
    }

    public function predisposiciones(){
        return $this->belongsToMany("App\Predisposicion","p_hechos");
    }

    public function elementos(){
        return $this->belongsToMany("App\Elemento","p_hechos");
    }

    public function sintomas(){
        return $this->belongsToMany("App\Sintoma","p_hechos");
    }

    public function medicinfluyentes(){
        return $this->belongsToMany("App\Medicinfluyente","p_hechos");
    }
}
