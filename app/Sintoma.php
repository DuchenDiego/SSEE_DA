<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $table="sintomas";

    protected $fillable=["name","estado","habilitado","ele_id"];

    public function elemento(){
    	return $this->belongsTo("App\Elemento","ele_id");
    }

}
