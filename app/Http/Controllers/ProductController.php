<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Comment;

class ProductController extends Controller
{
    public function getDanhsach(){
    	$sanpham=Product::all();
    	return view('admin.sanpham.danhsach',compact('sanpham'));
    }

    public function getThem(){
    	$loaisanpham =ProductType::all();
    	return view('admin.sanpham.them',compact('loaisanpham'));
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'tensp'=>'required|min:3|max:100|unique:products,name',
    			'gia'=>'required|numeric',
    			'donvi'=>'required',
    			'loaisanpham'=>'required',
    			'giakm'=>'numeric'


    		],
    		[
    			'tensp.required'=>'Nhập tên sản phẩm ',
    			'tensp.min'=>'Ít nhất 3 kí tự',
    			'tensp.max'=>'Ít hơn 100 kí tự',
    			'tensp.unique'=>'Tên sản phẩm bị trùng',
    			'gia.required'=>'Nhập giá sản phẩm',
    			'gia.numeric'=>'Phải là số',
    			'donvi.required'=>'Nhập đơn vị',
    			'loaisanpham.required'=>'Bạn chưa chọn loại sản phẩm',
    			'giakm.numeric'=>'Giá phải là số'
    		]);

    	$sanpham = new Product;
    	$sanpham->name= $req->tensp;
    	$sanpham->description=$req->mieuta;
    	$sanpham->unit_price=$req->gia;
    	$sanpham->promotion_price=$req->giakm;
    	$sanpham->unit=$req->donvi;
    	$sanpham->new=$req->tinhtrang;
    	$sanpham->id_type=$req->loaisanpham;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/sanpham/them')->with('thongbao','Chỉ chọn file có đuôi jpg,png,jpeg');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/product/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/product",$hinh); //lua hinh vao file uoload
    			$sanpham->image=$hinh;
    	}
    	else{
    		$sanpham->image="";
    	}
    	$sanpham->save();
    	return redirect('admin/sanpham/them')->with('thongbao','Thêm sản phẩm thành công');
    }

    public function getSua($id){
    	$loaisp=ProductType::all();
    	$sanpham= Product::find($id);
    	return view('admin.sanpham.sua',compact(['loaisp','sanpham']));
    }

    public function postSua(Request $req,$id){
    	$this->validate($req,
    		[
    			'tensp'=>'required|min:3|max:100',
    			'gia'=>'required|numeric',
    			'donvi'=>'required',
    			'loaisanpham'=>'required',
    			'giakm'=>'numeric'


    		],
    		[
    			'tensp.required'=>'Nhập tên sản phẩm',
    			'tensp.min'=>'Ít nhất 3 kí tự',
    			'tensp.max'=>'Ít hơn 100 kí tự',
    			'gia.required'=>'Nhập giá sản phẩm',
    			'gia.numeric'=>'Phải là số',
    			'donvi.required'=>'Nhập đơn vị',
    			'loaisanpham.required'=>'Bạn chưa chọn loại sản phẩm',
    			'giakm.numeric'=>'Giá phải là số'
    		]);

    	$sanpham = Product::find($id);
    	$sanpham->name= $req->tensp;
    	$sanpham->description=$req->mieuta;
    	$sanpham->unit_price=$req->gia;
    	$sanpham->promotion_price=$req->giakm;
    	$sanpham->unit=$req->donvi;
    	$sanpham->new=$req->tinhtrang;
    	$sanpham->id_type=$req->loaisanpham;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/sanpham/them')->with('thongbao','Chỉ chọn file có đuôi jpg,png,jpeg');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/product/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/product",$hinh); //lua hinh vao file uoload
    			$sanpham->image=$hinh;
    	}
    	else{
    		$sanpham->image=$sanpham->image;
    	}
    	$sanpham->save();

    	return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$sanpham= Product::find($id);
    	$sanpham->delete();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Xoá thành công');

    }
}
