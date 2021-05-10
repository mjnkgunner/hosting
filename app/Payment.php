<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $table = "payments";

    public function bill(){
        return $this->belongsTo('App\Bill','id_bill','id');
    }

}
