<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";
    public function position(){
    	return $this->hasMany('App\Position','id_department','id');
    }
    public function user(){
    	return $this->hasManyThrough('App\User','App\Position','id_department','id_position','id');
    }
}
