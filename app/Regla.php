<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regla extends Model
{
    protected $table="reglas";

    protected $fillable=["codigo","prioridad"];

    public function premisas(){
        return $this->hasMany("App\Premisa","regla_id");
    }
}
