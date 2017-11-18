<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predisposicion extends Model
{
    protected $table="predisposiciones";

    protected $fillable=["name"];

    /*public function users(){
        return $this->belongsToMany("App\User","p_hechos");
    }*/

    public function hechos(){
        return $this->hasMany("App\Hecho","predis_id");
    }

    public function criterios(){
    	return $this->hasMany("App\Criterio","predis_id");
    }

    /*public function aplicados(){
    	return $this->hasmany("App\Aplicado","predis_id");
    }*/

}
