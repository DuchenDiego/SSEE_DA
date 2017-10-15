<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicinfluyente extends Model
{
    protected $table="medicinfluyentes";

    protected $fillable=["name","estado","cri_id"];

    public function criterio(){
    	return $this->belongsTo("App\Criterio","cri_id");
    }
}
