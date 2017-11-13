<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table="diagnosticos";

    protected $fillable=["resultado","indicador","tipotrastorno","fecha","hora","user_id"];

    public function user(){
    	return $this->belongsTo("App\User","user_id");
    }

    public function personals(){
    	return $this->belongsToMany("App\Personal","p_personal");
    }
}
