<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    public function getProduct_type($id_categories) {
    	$product_type = DB::table('product_type')->where('id_categories', $id_categories)->get();
    	foreach($product_type as $key => $value) {
    		echo "<option value='".$value->id."'>".$value->name."</opttion>";
    	}
    }
}
