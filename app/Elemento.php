<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
	protected $table="elementos";

    protected $fillable=["name","estado","cri_id"];

    public function criterio(){
    	return $this->belongsTo("App\Criterio","cri_id");
    }

    public function sintomas(){
        return $this->hasMany("App\Sintoma","ele_id");
    }
}
