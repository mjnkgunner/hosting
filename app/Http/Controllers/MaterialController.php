<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\MaterialType;
use App\Supplier;

class MaterialController extends Controller
{
    public function getDanhsach(){
    	$materials=Material::all();
    	return view('admin.nguyenlieu.danhsach',compact('materials'));
    }

    public function getThem(){
    	$types =MaterialType::all();
        $suppliers = Supplier::all();
    	return view('admin.nguyenlieu.them',compact('types', 'suppliers'));
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'name'=>'required|min:3|max:100|unique:materials,name',
    			'type'=>'required',
    			'supplier'=>'required',
    		],
    		[
    			'name.required'=>'Nhập tên ',
    			'name.min'=>'Ít nhất 3 kí tự',
    			'name.max'=>'Ít hơn 100 kí tự',
    			'name.unique'=>'Tên bị trùng',
    			'type.required'=>'Bạn chưa chọn loại',
    			'supplier.required'=>'Bạn chưa chọn nha cung cap'
    		]);

    	$material = new Material;
    	$material->name= $req->name;
    	$material->description=$req->description;
    	$material->id_type=$req->type;
        $material->id_supplier=$req->supplier;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/nguyenlieu/them')->with('thongbao','Chỉ chọn file có đuôi jpg,png,jpeg');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/material/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/material",$hinh); //lua hinh vao file uoload
    			$material->image=$hinh;
    	}
    	else{
    		$material->image="";
    	}
    	$material->save();
    	return redirect('admin/nguyenlieu/them')->with('thongbao','Thêm sản phẩm thành công');
    }

    public function getSua($id){
    	$types=MaterialType::all();
        $suppliers = Supplier::all();
    	$material= Material::find($id);
    	return view('admin.nguyenlieu.sua',compact(['types','suppliers','material']));
    }

    public function postSua(Request $req,$id){
    	$this->validate($req,
    		[
    			'name'=>'required|min:3|max:100|',
                'type'=>'required',
                'supplier'=>'required',


    		],
    		[
    			'name.required'=>'Nhập tên ',
                'name.min'=>'Ít nhất 3 kí tự',
                'name.max'=>'Ít hơn 100 kí tự',
                'type.required'=>'Bạn chưa chọn loại',
                'supplier.required'=>'Bạn chưa chọn nha cung cap'
    		]);

    	$material = Material::find($id);
    	$material->name= $req->name;
        $material->description=$req->description;
        $material->id_type=$req->type;
        $material->id_supplier=$req->supplier;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/nguyenlieu/them')->with('thongbao','Chỉ chọn file có đuôi jpg,png,jpeg');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/material/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/material",$hinh); //lua hinh vao file uoload
    			$material->image=$hinh;
    	}
    	else{
    		$material->image=$material->image;
    	}
    	$material->save();

    	return redirect('admin/nguyenlieu/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$material= Material::find($id);
    	$material->delete();
    	return redirect('admin/nguyenlieu/danhsach')->with('thongbao','Xoá thành công');

    }
}
