<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";

     public function material(){
    	return $this->hasMany('App\Material','id_supplier','id');
    }

}
