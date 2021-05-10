<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = "positions";
    public function department(){
    	return $this->belongsTo('App\Department','id_department','id');
    }

    public function user(){
    	return $this->hasMany('App\User','id_position','id');
    }
}
