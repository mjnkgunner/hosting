<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialType extends Model
{
    protected $table = "type_materials";
    public function material(){
    	return $this->hasMany('App\Material','id_type','id');
    }
}
