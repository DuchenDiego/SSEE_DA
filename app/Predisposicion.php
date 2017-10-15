<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predisposicion extends Model
{
    protected $table="predisposiciones";

    protected $fillable=["name","estado","cri_id"];

    public function criterio(){
    	return $this->belongsTo("App\Criterio","cri_id");
    }
}
