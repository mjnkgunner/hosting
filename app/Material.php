<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
   protected $table = "materials";

    public function material_type(){
    	return $this->belongsTo('App\MaterialType','id_type','id');
    }

     public function supplier(){
    	return $this->belongsTo('App\Supplier','id_supplier','id');
    }

    public function eximport(){
    	return $this->hasMany('App\Eximport','id_material','id');
    }
}
