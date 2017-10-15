<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    protected $table="criterios";

    protected $fillable=["indicador","user_id","diag_id"];

    public function diagnostico(){
    	return $this->belongsTo("App\Diagnostico","diag_id");
    }
    public function user(){
    	return $this->belongsTo("App\User","user_id");
    }
    public function predisposiciones(){
        return $this->hasMany("App\Predisposicion","cri_id");
    }
    public function medicinfluyentes(){
        return $this->hasMany("App\Medicinfluyente","cri_id");
    }
    public function elementos(){
        return $this->hasMany("App\Elemento","cri_id");
    }
}
