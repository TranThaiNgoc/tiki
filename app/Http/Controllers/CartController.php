<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;

class CartController extends Controller
{
    public function getAdd($slug) {
    	// $product = product::where('slug', $slug)->first();
    	// dd($product);
     //    Cart::add(['slug' => $slug, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['number' => $product->number, 'image' => $product->image1]]);
    	$data = Cart::content();
    	dd($data);
        return back();
    }
}
