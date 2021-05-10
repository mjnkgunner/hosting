<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public function product_type(){
    	return $this->belongsTo('App\ProductType','id_type','id');
    }

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
    public function comment(){
    	return $this->hasMany('App\Comment','id_product','id');
    }
    public function product_point(){
        return $this->hasOne('App\ProductPoint','id_product','id');
    }
    public function sessioncart(){
        return $this->hasMany('App\SessionCart','id_product','id');
    }
}
