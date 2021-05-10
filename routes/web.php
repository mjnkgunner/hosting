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

Route::get('/', function () {
    return view('welcome');
});
// Route::group(['prefix'=>'habi'],function(){

Route::get('trangchu','PageController@getIndex')->name('home');
Route::get('loaisanpham/{type}','PageController@getLoaiSP');
Route::get('chitietsanpham/{id}','PageController@getChitietSP');
Route::get('lienhe','PageController@getLienhe');
Route::get('khaosat','PageController@getKhaosat');
Route::get('gioithieu','PageController@getGioithieu');
Route::get('themgiohang/{id}','CartController@getAddToCart');
Route::get('xoagiohang/{id}','CartController@getDelItemCart');
Route::get('dathang','PageController@getDathang');
Route::post('dathang','PageController@postDathang');
Route::get('dangnhap','PageController@getDangnhap');
Route::post('dangnhap','PageController@postDangnhap');
Route::get('dangki','PageController@getDangki');
Route::post('dangki','PageController@postDangki');
Route::get('dangxuat','PageController@postDangxuat');
// Route::get('quenmatkhau','PageController@getQuenmk');
Route::get('timkiem','PageController@getTimkiem');
Route::get('nguoidung','PageController@getNguoidung');
Route::post('nguoidung','PageController@postNguoidung');
Route::get('donhang','PageController@getDonhang');
Route::get('donhangchitiet/{id_bill}','PageController@getDonhangchitiet');
Route::get('huydonhang/{id_bill}','PageController@getHuydonhang');
Route::post('comment/{id}','CommentController@post');
Route::get('notactivecomment/{id}', 'CommentController@notActive');
Route::post('vote','PageController@postKhaosat');
Route::get('return-vnpay','PageController@return');
// });


Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/dangxuat','UserController@getDangxuatAdmin');
Route::get('admin/layout/home','IndexController@getHome');
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	Route::group(['prefix'=>'loaisanpham','middleware'=>'productlogin'],function(){
		Route::get('danhsach','ProductTypeController@getDanhsach');

		Route::get('them','ProductTypeController@getThem');
		Route::post('them','ProductTypeController@postThem');

		Route::get('sua/{id}','ProductTypeController@getSua');
		Route::post('sua/{id}','ProductTypeController@postSua');

		Route::get('xoa/{id}','ProductTypeController@getXoa');
		
	});

	Route::group(['prefix'=>'sanpham','middleware'=>'productlogin'],function(){
		Route::get('danhsach','ProductController@getDanhsach');

		Route::get('them','ProductController@getThem');
		Route::post('them','ProductController@postThem');

		Route::get('sua/{id}','ProductController@getSua');
		Route::post('sua/{id}','ProductController@postSua');

		Route::get('xoa/{id}','ProductController@getXoa');
		
	});

	Route::group(['prefix'=>'slide','middleware'=>'productlogin'],function(){
		Route::get('danhsach','SlideController@getDanhsach');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('xoa/{id}','SlideController@getXoa');
		
	});

	Route::group(['prefix'=>'nguoidung'],function(){
		Route::get('danhsach','UserController@getDanhsach');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('xoa/{id}','UserController@getXoa');
		
	});

	Route::group(['prefix'=>'khachhang','middleware'=>'salelogin'],function(){
		Route::get('danhsach','CustomerController@getDanhsach');

		Route::get('them','CustomerController@getThem');
		Route::post('them','CustomerController@postThem');

		Route::get('sua/{id}','CustomerController@getSua');
		Route::post('sua/{id}','CustomerController@postSua');

		
	});

	Route::group(['prefix'=>'dathang','middleware'=>'salelogin'],function(){
		Route::get('danhsach','OrderController@getDanhsach');

		// Route::get('them','OrderController@getThem');
		// Route::post('them','OrderController@postThem');

		// Route::get('sua/{id}','OrderController@getSua');
		// Route::post('sua/{id}','OrderController@postSua');
		Route::get('danhsachchitiet/{id_bill}','OrderController@getDanhsachchitiet');
		Route::get('xacnhanthanhtoan/{id}','OrderController@xacnhanthanhtoan');

		// Route::get('themchitiet','OrderController@getThemchitiet');
		// Route::post('themchitiet','OrderController@postThemchitiet');

		// Route::get('suachitiet/{id}','OrderController@getSuachitiet');
		// Route::post('suachitiet/{id}','OrderController@postSuachitiet');
		
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('sanpham/{id_type}','AjaxController@getSanpham');
		Route::get('nguyenlieu/{id_supplier}','AjaxController@getNguyenlieu');
		Route::get('vitri/{id_department}','AjaxController@getVitri');
	});


	Route::group(['prefix'=>'nguyenlieu','middleware'=>'inventorylogin'],function(){
		Route::get('danhsach','MaterialController@getDanhsach');

		Route::get('them','MaterialController@getThem');
		Route::post('them','MaterialController@postThem');

		Route::get('sua/{id}','MaterialController@getSua');
		Route::post('sua/{id}','MaterialController@postSua');
		Route::get('xoa/{id}','MaterialController@getXoa');
		
	});

	Route::group(['prefix'=>'loainguyenlieu','middleware'=>'inventorylogin'],function(){
		Route::get('danhsach','MaterialTypeController@getDanhsach');

		Route::get('them','MaterialTypeController@getThem');
		Route::post('them','MaterialTypeController@postThem');

		Route::get('sua/{id}','MaterialTypeController@getSua');
		Route::post('sua/{id}','MaterialTypeController@postSua');
		Route::get('xoa/{id}','MaterialTypeController@getXoa');
		
	});

	Route::group(['prefix'=>'nhacungcap','middleware'=>'inventorylogin'],function(){
		Route::get('danhsach','SupplierController@getDanhsach');

		Route::get('them','SupplierController@getThem');
		Route::post('them','SupplierController@postThem');

		Route::get('sua/{id}','SupplierController@getSua');
		Route::post('sua/{id}','SupplierController@postSua');
		Route::get('xoa/{id}','SupplierController@getXoa');
		
	});


	Route::group(['prefix'=>'xuatnhap','middleware'=>'inventorylogin'],function(){
		Route::get('danhsachxuat','EximportController@getDanhsachXuat');
		Route::get('danhsachnhap','EximportController@getDanhsachNhap');

		Route::get('xuat','ExImportController@getXuat');
		Route::post('xuat','ExImportController@postXuat');

		Route::get('nhap','ExImportController@getNhap');
		Route::post('nhap','ExImportController@postNhap');

		
	});

	Route::group(['prefix'=>'bophan','middleware'=>'hrlogin'],function(){
		Route::get('danhsach','DepartmentController@getDanhsach');

		Route::get('them','DepartmentController@getThem');
		Route::post('them','DepartmentController@postThem');

		Route::get('sua/{id}','DepartmentController@getSua');
		Route::post('sua/{id}','DepartmentController@postSua');

		Route::get('xoa/{id}','DepartmentController@getXoa');
		
	});


	Route::group(['prefix'=>'vitri','middleware'=>'hrlogin'],function(){
		Route::get('danhsach','PositionController@getDanhsach');

		Route::get('them','PositionController@getThem');
		Route::post('them','PositionController@postThem');

		Route::get('sua/{id}','PositionController@getSua');
		Route::post('sua/{id}','PositionController@postSua');

		Route::get('xoa/{id}','PositionController@getXoa');
		
	});

	Route::group(['prefix'=>'khuyenmai','middleware'=>'salelogin'],function(){
		Route::get('danhsach','PromotionController@getDanhsach');

		Route::get('them','PromotionController@getThem');
		Route::post('them','PromotionController@postThem');

		Route::get('sua/{id}','PromotionController@getSua');
		Route::post('sua/{id}','PromotionController@postSua');

		Route::get('xoa/{id}','PromotionController@getXoa');
		
	});
	Route::group(['prefix'=>'comment','middleware'=>'salelogin'],function(){
		Route::get('danhsach','CommentController@getDanhsach');


		Route::get('an/{id}','CommentController@notActive');

		Route::get('hien/{id}','CommentController@getActive');
		
	});
	Route::group(['prefix'=>'polls','middleware'=>'salelogin'],function(){
		Route::get('_list', ['uses' => 'PollManagerController@index', 'as' => 'poll.index']);
        Route::get('create', ['uses' => 'PollManagerController@create', 'as' => 'poll.create']);
        Route::get('edit/{id}', ['uses' => 'PollManagerController@edit', 'as' => 'poll.edit']);
        Route::patch('update/{id}', ['uses' => 'PollManagerController@update', 'as' => 'poll.update']);
        Route::delete('remove/{id}', ['uses' => 'PollManagerController@remove', 'as' => 'poll.remove']);
        Route::patch('lock/{id}', ['uses' => 'PollManagerController@lock', 'as' => 'poll.lock']);
        Route::patch('unlock/{id}', ['uses' => 'PollManagerController@unlock', 'as' => 'poll.unlock']);
        Route::post('store', ['uses' => 'PollManagerController@store', 'as' => 'poll.store']);
        Route::get('options/push/{id}', ['uses' => 'OptionManagerController@push', 'as' => 'poll.options.push']);
        Route::post('options/add/{id}', ['uses' => 'OptionManagerController@add', 'as' => 'poll.options.add']);
        Route::get('options/remove/{id}', ['uses' => 'OptionManagerController@delete', 'as' => 'poll.options.remove']);
        Route::delete('options/remove/{id}', ['uses' => 'OptionManagerController@remove', 'as' => 'poll.options.remove']);
        Route::get('result/{id}', ['uses' => 'PollManagerController@result', 'as' => 'polls.result']);

        });

	Route::get('thongke','IndexController@getThonngke');
	Route::post('thongke','IndexController@postThongke');


	Route::group(['prefix'=>'nhanvien','middleware'=>'hrlogin'],function(){
		Route::get('danhsach','StaffController@getDanhsach');

		Route::get('them','StaffController@getThem');
		Route::post('them','StaffController@postThem');

		Route::get('sua/{id}','StaffController@getSua');
		Route::post('sua/{id}','StaffController@postSua');

		Route::get('xoa/{id}','StaffController@getXoa');
		
	});

	Route::group(['prefix'=>'giohang','middleware'=>'salelogin'],function(){
		Route::get('danhsach','CartController@getDanhsach');
	});
});
        
Auth::routes();
Route::get('quenmatkhau','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('quenmatkhau','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('doimatkhau','Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('doimatkhau','Auth\ResetPasswordController@reset')->name('password.update');
// Route::get('/trangchu', 'PageController@getIndex')->name('home');
