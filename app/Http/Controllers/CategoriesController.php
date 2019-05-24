<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CategoriesController extends Controller
{
    public function getlist(){
        $categories = DB::table('categories')->get();
    	return view('admin.categories.list',compact('categories', 'role'));
    }

    public function getadd(){
    	return view('admin.categories.add');
    }

    public function postadd(Request $request){
    	$this->validate($request,
    		[
    			'name' => 'required'
    		],
    		[
    			'name.required' => 'Tên thể loại không được để trống',
    		]);
    	if(DB::table('categories')->where('name',$request->name)->first())
    	{
    		return redirect()->back()->with('thongbaoloi','Đã có tên thể loại.');
    	}
    	$data = [
    		'name' => $request->name,
    		'slug' =>str_slug(trim($request->name)),
    		'created_at' => date('Y-m-d H:i:s'),
    	];
    	DB::table('categories')->insert($data);
    	return redirect()->back()->with('thongbao','Thêm thể loại thành công.');
    }

    public function getedit($id){
        $categories = DB::table('categories')->where('id',$id)->first();
        if(is_null($categories)){
            abort('404');
        }
        return view('admin.categories.edit', compact('categories'));
    }

    public function postedit(Request $request, $id){
        $categories = DB::table('categories')->where('id',$id);
        if(is_null($categories->first())){
            return redirect()->back();
        }
        $this->validate($request,
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Tên thể loại không được để trống.',
            ]);
        $data = [
            'name' => $request->name,
            'slug' =>str_slug(trim($request->name)),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $categories->update($data);
        
        return redirect()->back()->with('thongbao','Sửa thể loại thành công.');
    }

    public function getdelete($id){
        $categories = DB::table('categories')->where('id',$id);
        if(is_null($categories->first())){
            abort('404');
        }
        $categories->delete();

        return redirect()->back()->with('thongbao','Xóa thể loại thành công.');
    }
}
