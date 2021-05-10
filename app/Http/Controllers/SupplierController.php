<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
   public function getDanhsach(){
   	$suppliers= Supplier::all();
   	return view('admin.nhacungcap.danhsach',compact('suppliers'));
   }
    public function getThem(){
    	return view('admin.nhacungcap.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100|unique:suppliers,name',
            'email'=>'required|email',

    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            'email.required'=>'Vui lòng nhập mật khẩu',
            'email.email'=>'Email không đúng định dạng',
    	]);

    	$supplier = new Supplier;
    	$supplier->name=$req->name ;
    	$supplier->email=$req->email;
        $supplier->website=$req->website;
        $supplier->phone=$req->phone;
        $supplier->address=$req->address;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/nhacungcap/them')->with('thongbao','Chỉ chọn file có đuôi jpg,png');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/supplier/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/supplier",$hinh); //lua hinh vao file uoload
    			$supplier->image=$hinh;
    	}
    	else{
    		$supplier->image="";
    	}
    	$supplier->save();
    	return redirect('admin/nhacungcap/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$supplier = Supplier::find($id);
    	return view('admin.nhacungcap.sua',compact('supplier'));
    }

    public function postSua(Request $req,$id){
    	$supplier = Supplier::find($id);
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100',
            'email'=>'required|email',



    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            'email.required'=>'Vui lòng nhập mật khẩu',
            'email.email'=>'Email không đúng định dạng',
    		
    	]);

    	$supplier->name=$req->name ;
        $supplier->email=$req->email;
        $supplier->website=$req->website;
        $supplier->phone=$req->phone;
        $supplier->address=$req->address;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/nhacungcap/sua/{{$supplier->id}}')->with('thongbao','Chỉ chọn file có đuôi jpg,png');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/supplier/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/supplier",$hinh); //lua hinh vao file uoload
    			$supplier->image=$hinh;
    	}
    	else{
    		$supplier->image=$supplier->image;
    	}
    	$supplier->save();
    	return redirect('admin/nhacungcap/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getXoa($id){
    	$supplier= Supplier::find($id);
    	$supplier->delete();
    	return redirect('admin/nhacungcap/danhsach')->with('thongbao','Xoá thành công');
    }
}
