<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintomaTrastorno extends Model
{
    protected $table="sintomastrastorno";

    protected $fillable=["name","tipotras","nivel"];

    public function hechos(){
        return $this->hasMany("App\Hecho","sinttras_id");
    }

}
