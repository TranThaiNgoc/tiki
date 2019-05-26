<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\categories;
use App\product_type;
use App\product;
use DB;

class CartController extends Controller
{
	public function __construct(){
		$categories = categories::all();
		$product_type = product_type::all();
		view()->share('categories',$categories);
		view()->share('product_type',$product_type);
	}

    public function getAdd($id) {	
    	$product = product::find($id);
    	// dd($product);
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'image' => $product->image1, 'options' => ['image' => $product->image1]]);
        // $data = Cart::content();
        // dd($data);
        return redirect()->route('show');
    }

    public function getShow() {
    	$data['item'] = Cart::content();
    	return view('themes.cart', $data, compact('total'));
    }

    public function getDelete($id) {
    	Cart::remove($id);
    	return redirect()->back();
    }

    public function getUpdate(Request $request) {
    	Cart::update($request->rowId, $request->qty);
    }
}
