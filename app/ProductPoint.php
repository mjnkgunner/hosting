<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPoint extends Model
{
    protected $table = "product_points";

     public function product(){
    	return $this->belongsTo('App\Product','id_product','id');
    }

}
