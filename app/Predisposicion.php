<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predisposicion extends Model
{
    protected $table="predisposiciones";

    protected $fillable=["name"];

    public function users(){
        return $this->belongsToMany("App\User","p_hechos");
    }

}
