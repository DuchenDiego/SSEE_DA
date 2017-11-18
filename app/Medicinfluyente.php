<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicinfluyente extends Model
{
    protected $table="medicinfluyentes";

    protected $fillable=["name"];

    /*public function users(){
        return $this->belongsToMany("App\User","p_hechos");
    }*/

    public function hechos(){
        return $this->hasMany("App\Hecho","medic_id");
    }

    public function criterios(){
    	return $this->hasMany("App\Criterio","medic_id");
    }

    /*public function aplicados(){
    	return $this->hasmany("App\Aplicado","medic_id");
    }*/
}
