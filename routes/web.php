<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['verify' => true]);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'role:supperadmin']],function(){
	Route::get('/','HomeController@getAdmin')->name('admin');
	Route::group(['prefix' => 'categories'],function(){
		Route::get('/', 'CategoriesController@getlist')->name('admin.categories');
		Route::get('add', 'CategoriesController@getadd')->name('admin.categories.add');
		Route::post('add', 'CategoriesController@postadd');
		Route::get('edit/{id}', 'CategoriesController@getedit')->name('admin.categories.edit');
		Route::post('edit/{id}', 'CategoriesController@postedit');
		Route::get('delete/{id}', 'CategoriesController@getdelete')->name('admin.categories.delete');
		Route::get('Listcontact', 'CategoriesController@getcontact')->name('admin.contact');
		Route::get('contactEdit/{id}', 'CategoriesController@geteditcontact')->name('admin.contact.edit');
		Route::post('contactEdit/{id}', 'CategoriesController@posteditcontact');
		Route::get('DeleteContact/{id}', 'CategoriesController@getdeletecontact')->name('admin.contact.delete');
	});

	Route::group(['prefix' => 'producttype'],function(){
		Route::get('/', 'ProductTypeController@getlist')->name('admin.product_type');
		Route::get('add', 'ProductTypeController@getadd')->name('admin.product_type.add');
		Route::post('add', 'ProductTypeController@postadd');
		Route::get('edit/{id}', 'ProductTypeController@getedit')->name('admin.product_type.edit');
		Route::post('edit/{id}', 'ProductTypeController@postedit');
		Route::get('delete/{id}', 'ProductTypeController@getdelete')->name('admin.product_type.delete');
	});

	Route::group(['prefix' => 'product'],function(){
		Route::get('/', 'ProductController@getlist')->name('admin.product');
		Route::get('add', 'ProductController@getadd')->name('admin.product.add');
		Route::post('add', 'ProductController@postadd');
		Route::get('edit/{id}', 'ProductController@getedit')->name('admin.product.edit');
		Route::post('edit/{id}', 'ProductController@postedit');
		Route::get('delete/{id}', 'ProductController@getdelete')->name('admin.product.delete');
	});

	Route::group(['prefix' => 'order'],function(){
		Route::get('/', 'OrderController@getlist')->name('admin.order');
		Route::get('edit/{id}', 'OrderController@getedit')->name('admin.order.edit');
		Route::post('edit/{id}', 'OrderController@postedit');
		Route::get('delete/{id}', 'OrderController@getdelete')->name('admin.order.delete');
	});

	Route::group(['prefix' => 'user'],function(){
		Route::get('/', 'UserController@getlist')->name('admin.user');
		Route::get('add', 'UserController@getadd')->name('admin.user.add');
		Route::post('add', 'UserController@postadd');
		Route::get('edit/{id}', 'UserController@getedit')->name('admin.user.edit');
		Route::post('edit/{id}', 'UserController@postedit');
		Route::get('delete/{id}', 'UserController@getdelete')->name('admin.user.delete');
	});

	Route::group(['prefix' => 'ajax'], function(){
		Route::get('product_type/{id_categories}','AjaxController@getProduct_type');
	});
});
Route::get('/', 'IndexController@getIndex')->name('index');
Route::get('loai-san-pham/{slug}', 'IndexController@getProduct_type')->name('product_type');
Route::get('san-pham/{slug}', 'IndexController@getProduct')->name('product');
Route::get('gioi-thieu', 'IndexController@getAbout')->name('about');
Route::get('lien-he', 'IndexController@getContact')->name('contact');
Route::get('dang-ky-tai-khoan', 'IndexController@getRegistert')->name('register_customer');
Route::post('dang-ky-tai-khoan', 'IndexController@postRegistert');
Route::get('dang-nhap', 'IndexController@getLogin')->name('login_customer');
Route::post('dang-nhap', 'IndexController@postLogin');
Route::group(['middleware' => 'auth'], function() {
	Route::get('thong-tin-tai-khoan', 'IndexController@getProfile')->name('profile');
	Route::post('thong-tin-tai-khoan', 'IndexController@postProfile');
	Route::get('sua-tai-khoan', 'IndexController@getEditProfile')->name('edit_profile');
	Route::post('sua-tai-khoan', 'IndexController@postEditProfile');
	Route::group(['perfix' => 'gio-hang'], function() {
		Route::get('add/{id}', 'CartController@getAdd')->name('add');
		Route::get('show', 'CartController@getShow')->name('show');
		Route::get('delete/{id}', 'CartController@getDelete')->name('delete');
		Route::get('update', 'CartController@getUpdate')->name('update');
	});
	route::get('thong-tin-don-hang', 'IndexController@getOrder')->name('order');
	route::post('thong-tin-don-hang', 'IndexController@postOrder');
});
