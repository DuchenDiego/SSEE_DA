<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premisa extends Model
{
    protected $table="premisas";

    protected $fillable=["operadorlogico","regla_id"];

    public function regla(){
    	return $this->belongsTo("App\Regla","regla_id");
    }

    public function criterios(){
        return $this->hasMany("App\Criterio","premis_id");
    }
}
