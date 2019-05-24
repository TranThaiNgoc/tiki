<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_type extends Model
{
    protected $table = "product_type";
    public $timestamps = false;

    public function categories()
    {
      return $this->belongsTo('App\categories','id_categories','id');
    }

    public function product()
    {
    	return $this->hasMany('App\product','id_product_type','id');
    }
}
