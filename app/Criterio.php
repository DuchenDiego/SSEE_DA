<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    protected $table="p_criterios";

    protected $fillable=["premis_id","tipo","conclusion","predis_id","elem_id","sinto_id","medic_id","comparador","valor"];

    public function premisa(){
    	return $this->belongsTo("App\Premisa","premis_id");
    }

    public function predisposicion(){
    	return $this->belongsTo("App\Predisposicion","predis_id");
    }

    public function elemento(){
    	return $this->belongsTo("App\Elemento","elem_id");
    }

    public function sintoma(){
    	return $this->belongsTo("App\Sintoma","sinto_id");
    }

    public function medicinfluyente(){
    	return $this->belongsTo("App\Medicinfluyente","medic_id");
    }

}
