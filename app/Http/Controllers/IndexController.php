<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\categories;
use App\product_type;
use App\product;
use DB;
use Auth;

class IndexController extends Controller
{
	public function __construct(){
		$categories = categories::all();
		$product_type = product_type::all();
		view()->share('categories',$categories);
		view()->share('product_type',$product_type);
	}

    public function getIndex() {
    	$product_view = product::where('status', 1)->orderBy('view', 'desc')->limit(8)->get();
    	return view('themes.index', compact('categories', 'product_type', 'product_view'));
    }

    public function getProduct_type($slug) {
    	$product_type = DB::table('product_type')->where('slug', $slug)->first();
    	$product = DB::table('product')->where('id_product_type', $product_type->id)->paginate(8);
    	return view('themes.producttype', compact('product_type', 'product'));
    }

    public function getProduct($slug) {
    	$product = product::where('slug', $slug)->first();
    	$product_relate = product::where('id_product_type', $product->id_product_type)->where('id_categories', $product->id_categories)->where('slug','!=',$product->slug)->where('status',1)->limit(2)->get();
    	return view('themes.product', compact('categories', 'product_type', 'product', 'product_relate'));
    }

    public function getAbout() {
    	return view('themes.about');
    }

    public function getContact() {
    	return view('themes.contact');
    }

    public function getRegistert() {
        return view('themes.register');
    }

    public function postRegistert(Request $request) {
        $this->validate($request,
            [
                'name' => 'required|name|min:2|max:32',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
                'password' => 'required|min:6|max:32|confirmed',
            ],
            [
                'name.required' => 'Tên không được để trống.',
                'name.name' => 'Tên không hợp lệ.',
                'name.min' => 'Tên có độ dài từ 2 đến 32 ký tự.',
                'name.max' => 'Tên có độ dài từ 2 đến 32 ký tự.',
                'email.required' => 'Email không được để trống.',
                'email.email' => 'Email không hộp lệ.',
                'email.unique' => 'Email đã được đăng ký.',
                'phone.required' => 'Số điện thoại không được để trống.',
                'phone.regex' => 'Số điện thoại không hợp lệ.',
                'phone.min' => 'Số điện thoại có độ dài từ 10 đến 11 số',
                'phone.max' => 'Số điện thoại có độ dài từ 10 đến 11 số',
                'password.required' => 'Mật khẩu không được để trống.',
                'password.confirmed' => 'Nhập lại mật khẩu không chính xác',
                'password.min' => 'Mật khẩu có độ dài từ 6 đến 32 ký tự',
                'password.max' => 'Mật khẩu có độ dài từ 6 đến 32 ký tự',
            ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // dd($data);
        DB::table('users')->insert($data);
        return redirect()->back()->with('thongbao', 'Đăng ký tài khoản thành công.');
    }

    public function getLogin() {
        return view('themes.login_customer');
    }

    public function postLogin(Request $request) {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email không được để trống.',
                'email.email' => 'Email không hợp lệ.',
                'password.required' => 'Mật khẩu không được để trống.',
            ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => 0])) {
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('thongbaoloi', 'Đăng nhập không thành công.');
        }
    }

    public function getProfile() {
        return view('themes.profile');
    }

    public function getEditProfile() {
        return view('themes.editprofile');
    }

    public function postEditProfile(Request $request) {
        $this->validate($request,
            [
                'name' => 'required|min:2|max:32',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
                'address' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống.',
                'name.name' => 'Tên không hợp lệ.',
                'name.min' => 'Tên có độ dài từ 2 đến 32 ký tự.',
                'name.max' => 'Tên có độ dài từ 2 đến 32 ký tự.',
                'phone.required' => 'Số điện thoại không được để trống.',
                'phone.regex' => 'Số điện thoại không hợp lệ.',
                'phone.min' => 'Số điện thoại có độ dài từ 10 đến 11 số',
                'phone.max' => 'Số điện thoại có độ dài từ 10 đến 11 số',
                'address.required' => 'Địa chỉ không được bỏ trống.',
            ]);
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        DB::table('users')->where('id', Auth::id())->update($data);

        return redirect()->back()->with('thongbao', 'Sửa Thông tin thành công.');
    }
}
