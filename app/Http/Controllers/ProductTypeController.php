<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;
use Session;

class ProductTypeController extends Controller
{
   public function getDanhsach(){
   	$loaisp= ProductType::all();
   	return view('admin.loaisanpham.danhsach',compact('loaisp'));
   }
    public function getThem(){
    	return view('admin.loaisanpham.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,[
    		'tenlsp'=>'required|min:3|max:100|unique:type_products,name'

    	],
    	[
    		'tenlsp.required'=>'Bạn chưa nhập tên loại sản phẩm',
    		'tenlsp.min'=>'Tên lớn hơn 3 kí tự', 
    		'tenlsp.max'=>'Ít hơn 100 kí tự'
    	]);

    	$loaisp = new ProductType;
    	$loaisp->name=$req->tenlsp ;
    	$loaisp->description=$req->mieuta;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/loaisanpham/them')->with('thongbao','Chỉ chọn file có đuôi jpg,png');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/product/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/product",$hinh); //lua hinh vao file uoload
    			$loaisp->image=$hinh;
    	}
    	else{
    		$loaisp->image="";
    	}
    	$loaisp->save();
    	return redirect('admin/loaisanpham/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$loaisp = ProductType::find($id);
    	return view('admin.loaisanpham.sua',compact('loaisp'));
    }

    public function postSua(Request $req,$id){
    	$loaisp = ProductType::find($id);
    	$this->validate($req,[
    		'tenlsp'=>'required|min:3|max:100'

    	],
    	[
    		'tenlsp.required'=>'Bạn chưa nhập tên loại sản phẩm',
    		'tenlsp.min'=>'Tên lớn hơn 3 kí tự', 
    		'tenlsp.max'=>'Ít hơn 100 kí tự',
    		
    	]);

    	$loaisp->name=$req->tenlsp ;
    	$loaisp->description=$req->mieuta;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/loaisanpham/sua/{{$loaisp->id}}')->with('thongbao','Chỉ chọn file có đuôi jpg,png');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/product/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/product",$hinh); //lua hinh vao file uoload
    			$loaisp->image=$hinh;
    	}
    	else{
    		$loaisp->image=$loaisp->image;
    	}
    	$loaisp->save();
    	return redirect('admin/loaisanpham/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getXoa($id){
    	$loaisp= ProductType::find($id);
        $sp = Product::where('id_type',$id)->get();
        if($sp) {
            return redirect('admin/loaisanpham/danhsach')->with('thongbao', 'Khong the xoa do co san pham con');
        }
        else{
            $loaisp->delete();
            return redirect('admin/loaisanpham/danhsach')->with('thongbao','Xoá thành công');
        }
    	
    }
}
