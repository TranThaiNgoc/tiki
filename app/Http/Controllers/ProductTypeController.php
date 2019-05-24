<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\product_type;
use DB;
use Auth;

class ProductTypeController extends Controller
{
    public function getlist(){
    	$product_type = product_type::all();
    	return view('admin.producttype.list', compact('product_type', 'role'));
    }

    public function getadd(){
    	$categories = DB::table('categories')->get();
        if(is_null($categories)){
            abort('404');
        }
    	return view('admin.producttype.add', compact('categories'));
    }

    public function postadd(Request $request){
    	$this->validate($request,
    		[
    			'name' => 'required'
    		],
    		[
    			'name.required' => 'Tên loại sản phẩm không được để trống.',
    		]);
    	$categories = DB::table('categories')->where('id',$request->id_categories)->first();
            if(is_null($categories)) {
                abort('404');
            }

        $data = [
            'name' => $request->name,
            'id_categories' => $request->id_categories,
            'slug' => str_slug(trim($request->name)),
            'created_at' => date('Y-m-d H:m:s'),
        ];
    	DB::table('product_type')->insert($data);

    	return redirect()->back()->with('thongbao','Thêm loại sản phẩm thành công.');
    }

    public function getedit($id) {
        $product_type = DB::table('product_type')->where('id', $id)->first();
        if(is_null($product_type)) {
            abort('404');
        }
        $categories = DB::table('categories')->get();
        return view('admin.producttype.edit', compact('product_type', 'categories'));
    }

    public function postedit(Request $request, $id) {
        $this->validate($request,
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Tên loại sản phẩm không được để trống.',
            ]);

        $categories = DB::table('categories')->where('id',$request->id_categories)->first();
        $product_type = DB::table('product_type')->where('id', $id);

        if(is_null($categories)) {
            abort('404');
        }
        if(is_null($product_type->first())) {
            abort('404');
        }

        $data = [
            'name' => $request->name,
            'id_categories' => $request->id_categories,
            'slug' => str_slug(trim($request->name)),
            'created_at' => date('Y-m-d H:m:s'),
        ];

        $product_type->update($data);
        return back()->with('thongbao', 'Sửa loại sản phẩm thành công.');
    }

    public function getdelete($id) {
        $product_type = DB::table('product_type')->where('id',$id);
        if(is_null($product_type->first()))
        {
            // abort('404');
            return redirect()->back()->with('thongbaoloi', 'Xóa loại sản phẩm không thành công.');
        }
        $product_type->delete();

        return redirect()->back()->with('thongbao', 'Xóa loại sản phẩm thành công.');
    }
}
