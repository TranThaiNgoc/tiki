<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = "categories";

    public function product_type()
    {
    	return $this->hasMany('App\product_type','id_categories','id');
    }
}
