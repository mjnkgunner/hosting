<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaterialType;
use App\Material;

class MaterialTypeController extends Controller
{
   public function getDanhsach(){
   	$types= MaterialType::all();
   	return view('admin.loainguyenlieu.danhsach',compact('types'));
   }
    public function getThem(){
    	return view('admin.loainguyenlieu.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100|unique:type_materials,name',

    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            'name.unique'=>'Tên bị trùng',

    	]);

    	$type = new MaterialType;
    	$type->name=$req->name ;
    	$type->description=$req->description;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/loainguyenlieu/them')->with('thongbao','Chỉ chọn file có đuôi jpg,png');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/materialtype/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/materialtype",$hinh); //lua hinh vao file uoload
    			$type->image=$hinh;
    	}
    	else{
    		$type->image="";
    	}
    	$type->save();
    	return redirect('admin/loainguyenlieu/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$type = MaterialType::find($id);
    	return view('admin.loainguyenlieu.sua',compact('type'));
    }

    public function postSua(Request $req,$id){
    	$type = MaterialType::find($id);
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100',

    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            
    	]);

    	$type->name=$req->name ;
        $type->description=$req->description;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/loainguyenlieu/sua/{{$type->id}}')->with('thongbao','Chỉ chọn file có đuôi jpg,png');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/materialtype/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/materialtype",$hinh); //lua hinh vao file uoload
    			$type->image=$hinh;
    	}
    	else{
    		$type->image=$type->image;
    	}
    	$type->save();
    	return redirect('admin/loainguyenlieu/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getXoa($id){
    	$type= MaterialType::find($id);
        $m = Material::where('id_type',$id)->get();
        if($m){
            return redirect('admin/loainguyenlieu/danhsach')->with('thongbao','Khong the xoa do co nguyen lieu con');
        }
    	$type->delete();
    	return redirect('admin/loainguyenlieu/danhsach')->with('thongbao','Xoá thành công');
    }
}
