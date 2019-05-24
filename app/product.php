<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "product";

    public function product_type()
    {
    	return $this->belongsTo('App\product_type','id_product_type','id');
    }
}
