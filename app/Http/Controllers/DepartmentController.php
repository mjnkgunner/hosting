<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
   public function getDanhsach(){
   	$departments= Department::all();
   	return view('admin.bophan.danhsach',compact('departments'));
   }
    public function getThem(){
    	return view('admin.bophan.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100|unique:departments,name',
        

    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            'name.unique'=>'Ten bi trung, nhap lai',
           
    	]);

    	$department = new Department;
    	$department->name=$req->name ;
    	$department->email=$req->email;
        $department->phone=$req->phone;
        $department->address=$req->address;
        $department->description=$req->description;
    	$department->save();
    	return redirect('admin/bophan/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$department = Department::find($id);
    	return view('admin.bophan.sua',compact('department'));
    }

    public function postSua(Request $req,$id){
    	$department = Department::find($id);
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100',
    



    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
           
    		
    	]);

        $department->name=$req->name ;
        $department->email=$req->email;
        $department->phone=$req->phone;
        $department->address=$req->address;
        $department->description=$req->description;
    	$department->save();
    	return redirect('admin/bophan/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getXoa($id){
    	$department= Department::find($id);
    	$department->delete();
    	return redirect('admin/bophan/danhsach')->with('thongbao','Xoá thành công');
    }
}
