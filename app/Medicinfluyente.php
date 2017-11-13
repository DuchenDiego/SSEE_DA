<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicinfluyente extends Model
{
    protected $table="medicinfluyentes";

    protected $fillable=["name"];

    public function users(){
        return $this->belongsToMany("App\User","p_hechos");
    }
}
