<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

     public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }

     public function customer(){
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
    public function promotion(){
    	return $this->belongsTo('App\Promotion','id_promotion','id');
    }
    public function payment(){
        return $this->hasOne('App\Payment','id_bill','id');
    }
}
