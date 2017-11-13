<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table="elementos";

    protected $fillable=["name"];

    public function sintomas(){
        return $this->hasMany("App\Sintoma","ele_id");
    }

    public function users(){
        return $this->belongsToMany("App\User","p_hechos");
    }
}
