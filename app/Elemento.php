<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table="elementos";

    protected $fillable=["name"];

    public function sintomas(){
        return $this->hasMany("App\Sintoma","elem_id");
    }

    /*public function users(){
        return $this->belongsToMany("App\User","p_hechos");
    }*/

    public function hechos(){
        return $this->hasMany("App\Hecho","elem_id");
    }

    public function criterios(){
    	return $this->hasMany("App\Criterio","elem_id");
    }
}
