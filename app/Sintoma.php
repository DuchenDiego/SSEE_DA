<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $table="sintomas";

    protected $fillable=["name","elem_id"];

    public function elemento(){
    	return $this->belongsTo("App\Elemento","elem_id");
    }

    /*public function users(){
        return $this->belongsToMany("App\User","p_hechos");
    }*/

    public function hechos(){
        return $this->hasMany("App\Hecho","sinto_id");
    }

    public function criterios(){
    	return $this->hasMany("App\Criterio","sinto_id");
    }

    /*public function aplicados(){
    	return $this->hasmany("App\Aplicado","sinto_id");
    }*/
}
