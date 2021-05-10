<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eximport extends Model
{
    protected $table = "ex_imports";
    public function material(){
    	return $this->belongsTo('App\Material','id_material','id');
    }

    
}
