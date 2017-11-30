<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hecho extends Model
{
    protected $table="p_hechos";

    protected $fillable=["numPremisa","estado","user_id","diag_id","predis_id","elem_id","sinto_id","medic_id","sinttras_id"];

    public function predisposicion(){
    	return $this->belongsTo("App\Predisposicion","predis_id");
    }

    public function elemento(){
    	return $this->belongsTo("App\Elemento","elem_id");
    }

    public function sintoma(){
    	return $this->belongsTo("App\Sintoma","sinto_id");
    }

    public function sintomatrastorno(){
        return $this->belongsTo("App\SintomaTrastorno","sinttras_id");
    }

    public function medicinfluyente(){
    	return $this->belongsTo("App\Medicinfluyente","medic_id");
    }

    public function diagnostico(){
    	return $this->belongsTo("App\Diagnostico","diag_id");
    }

    public function user(){
    	return $this->belongsTo("App\User","user_id");
    }

}
