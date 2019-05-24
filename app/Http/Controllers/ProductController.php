<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\categories;
use App\product_type;
use App\product;
use Storage;
use Auth;

class ProductController extends Controller
{
    public function getlist() {
    	$product = product::all();
    	return view('admin.product.list', compact('product'));
    }

    public function getadd() {
    	$categories = categories::all();
    	$product_type = product_type::all();
    	return view('admin.product.add', compact('categories', 'product_type'));
    }

    public function postadd(Request $request) {
    	$categories = DB::table('categories')->select('id')->get();
    	$product_type = DB::table('product_type')->select('id')->get();
    	$cate = [];
    	$pro = [];
    	foreach($categories as $value) {
    		$cate[$value->id] = $value;
    	}
    		if(!array_key_exists($request->id_categories,$cate)) {
    			return redirect()->back()->with('thongbaoloi', 'Tên thể loại không hợp lệ.');
    		}
    	
    	foreach ($product_type as $key => $value) {
    		$pro[$value->id] = $value;
    	}
    		if(!array_key_exists($request->id_product_type,$pro)) {
	    		return redirect()->back()->with('thongbaoloi', 'Tên loại sản phẩm không hợp lệ.');
	    	}

    	$this->validate($request, 
    		[
    			'name' => 'required|max:255|min:6|name',
    			'price' => 'required',
    			'content' => 'required',
    			'number' => 'required',
    			'image1' => 'required|image',
    			'image2' => 'required|image',
    			'image3' => 'image',
    			'image4' => 'image',
    			'status' => 'required'
    		],
    		[
    			'name.required' => 'Tên sản phẩm không được để trống.',
    			'name.name' => 'Tên sản phẩm không hợp lệ.',
    			'name.max' => 'Tên sản phẩm có độ dài từ 6 đến 255 ký tự.',
    			'name.min' => 'Tên sản phẩm có độ dài từ 6 đến 255 ký tự.',
    			'price.required' => 'Tóm tắt sản phẩm không được để trống.',
    			'content.required' => 'Nội dung sản phẩm không được để trống.',
    			'number.required' => 'Số lượng không được để trống.',
    			'image1.required' => 'Hình sản phẩm không được để trống',
    			'image1.image' => 'Hình ảnh không hợp lệ.',
    			'image2.required' => 'Hình sản phẩm không được để trống',
    			'image2.image' => 'Hình ảnh không hợp lệ.',
    			'image3.image' => 'Hình ảnh không hợp lệ.',
    			'image4.image' => 'Hình ảnh không hợp lệ.',
    			'status.required' => 'Trạng thái sản phẩm không được để trống',
    		]);
    	$data = [
    		'id_categories' => $request->id_categories,
    		'id_product_type' => $request->id_product_type,
    		'name' => $request->name,
            'slug' => str_slug(trim($request->name)),
			'price' => $request->price,
			'content' => $request->content,
			'number' => $request->number,
			'status' => $request->status,
			'sale' => $request->sale,
			'created_at' => date('Y-m-d H:i:s')
    	];
        if(!is_null($request->sale)) {
            $data['sale_price'] = ((100 - $request->sale)/100) * $request->price;
        }
        if($request->hasFile('image1'))
        {
            $file = $request->file('image1');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image1'] = $image;
        }
        // dd($data);
        if($request->hasFile('image2'))
        {
            $file = $request->file('image2');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image2'] = $image;
        }
        if($request->hasFile('image3'))
        {
            $file = $request->file('image3');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image3'] = $image;
        }
        if($request->hasFile('image4'))
        {
            $file = $request->file('image4');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image4'] = $image;
        }
    	DB::table('product')->insert($data);

    	return redirect()->back()->with('thongbao','Thêm sản phẩm thành công.');
    }

    public function getedit($id) {
    	$categories = categories::all();
    	$product_type = product_type::all();
    	$product = product::find($id);
    	return view('admin.product.edit', compact('categories','product_type' ,'product'));
    }

    public function postedit(request $request, $id) {
    	$categories = DB::table('categories')->select('id')->get();
    	$product_type = DB::table('product_type')->select('id')->get();
    	$cate = [];
    	$pro = [];
    	foreach($categories as $value) {
    		$cate[$value->id] = $value;
    	}
    		if(!array_key_exists($request->id_categories,$cate)) {
    			return redirect()->back()->with('thongbaoloi', 'Sửa sản phẩm không thành công.');
    		}
    	
    	foreach ($product_type as $key => $value) {
    		$pro[$value->id] = $value;
    	}
    		if(!array_key_exists($request->id_product_type,$pro)) {
	    		return redirect()->back()->with('thongbaoloi', 'Sửa sản phẩm không thành công.');
	    	}

    	$this->validate($request, 
    		[
    			'name' => 'required|max:255|min:6|name',
    			'price' => 'required',
    			'content' => 'required',
    			'number' => 'required',
    			'image1' => 'image',
    			'image2' => 'image',
    			'image3' => 'image',
    			'image4' => 'image',
    			'status' => 'required'
    		],
    		[
    			'name.required' => 'Tên sản phẩm không được để trống.',
    			'name.name' => 'Tên sản phẩm không hợp lệ.',
    			'name.max' => 'Tên sản phẩm có độ dài từ 6 đến 255 ký tự.',
    			'name.min' => 'Tên sản phẩm có độ dài từ 6 đến 255 ký tự.',
    			'price.required' => 'Tóm tắt sản phẩm không được để trống.',
    			'content.required' => 'Nội dung sản phẩm không được để trống.',
    			'number.required' => 'Số lượng không được để trống.',
    			'image1.image' => 'Hình ảnh không hợp lệ.',
    			'image2.image' => 'Hình ảnh không hợp lệ.',
    			'image3.image' => 'Hình ảnh không hợp lệ.',
    			'image4.image' => 'Hình ảnh không hợp lệ.',
    			'status.required' => 'Trạng thái sản phẩm không được để trống',
    		]);
    	$data = [
    		'id_categories' => $request->id_categories,
    		'id_product_type' => $request->id_product_type,
    		'name' => $request->name,
            'slug' => str_slug(trim($request->name)),
			'price' => $request->price,
			'content' => $request->content,
			'number' => $request->number,
			'status' => $request->status,
			'sale' => $request->sale,
			'created_at' => date('Y-m-d H:i:s')
    	];
        if(!is_null($request->sale)) {
            
            $data['sale_price'] = ((100 - $request->sale)/100) * $request->price;
        }
    	$product = DB::table('product')->where('id',$id)->select('image1', 'image2', 'image3', 'image4')->first();
    	if($request->hasFile('image1'))
        {
            $file = $request->file('image1');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image1'] = $image;
            if(!is_null($product->image1)) {
            	$image_delete = str_replace(env('APP_URL').'/storage', 'public', $product->image1);
            	Storage::delete($image_delete);
            }
        }
        if($request->hasFile('image2'))
        {
            $file = $request->file('image2');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image2'] = $image;
            if(!is_null($product->image2)) {
            	$image_delete = str_replace(env('APP_URL').'/storage', 'public', $product->image2);
            	Storage::delete($image_delete);
            }
        }
        if($request->hasFile('image3'))
        {
            $file = $request->file('image3');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image3'] = $image;
            if(!is_null($product->image3)) {
            	$image_delete = str_replace(env('APP_URL').'/storage', 'public', $product->image3);
            	Storage::delete($image_delete);
            }
        }
        if($request->hasFile('image4'))
        {
            $file = $request->file('image4');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image4'] = $image;
            if(!is_null($product->image4)) {
            	$image_delete = str_replace(env('APP_URL').'/storage', 'public', $product->image4);
            	Storage::delete($image_delete);
            }
        }
        DB::table('product')->where('id', $id)->update($data);

        return redirect()->back()->with('thongbao', 'Sửa sản phẩm thành công.');
    }

    public function getdelete($id) {
    	$product = DB::table('product')->where('id', $id);
    	if(is_null($product->first())) {
    		abort('404');
    	}
    	$product->delete();

    	return redirect()->back()->with('thongbao', 'Xóa sản phẩm thành công.');
    }
}
