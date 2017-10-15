<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table="diagnosticos";

    protected $fillable=["resultado","tipotrastorno","fecha","hora","user_id","pers_id"];

    public function personal(){
    	return $this->belongsTo("App\Personal","pers_id");
    }
    public function user(){
    	return $this->belongsTo("App\User","user_id");
    }
    public function criterios(){
        return $this->hasMany("App\Criterio","diag_id");
    }

}
