<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function getlist() {
    	$order = DB::table('order')->get();
    	return view('admin.order.list', compact('order'));
    }

    public function getedit($id) {
    	$order = DB::table('order')->where('id', $id)->first();
    	if(is_null($order)) {
    		abort('404');
    	}
    	return view('admin.order.edit', compact('order'));
    }

    public function postedit(Request $request,$id) {
    	$this->validate($request,
    		[
    			'type' => 'required|boolean'
    		],
    		[
    			'type.required' => 'Trạng thái thanh toán không được để trống.',
    			'type.Boolean' => 'Trạng thái thanh toán không hợp lệ'
    		]);
    	$order = DB::table('order')->where('id', $id);
    	if(is_null($order->first())) {
    		abort('404');
    	}
    	$data = [
    		'type' => $request->type
    	];
    	$order->update($data);
    	return redirect()->back()->with('thongbao', 'Thanh toán đơn hàng thành công.');
    }
}
