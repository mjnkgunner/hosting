<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Position;

class PositionController extends Controller
{
   public function getDanhsach(){
   	$positions= Position::all();
   	return view('admin.vitri.danhsach',compact('positions'));
   }
    public function getThem(){
        $departments = Department::all();
    	return view('admin.vitri.them',compact('departments'));
    }

    public function postThem(Request $req){
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100|unique:positions,name',
            'email'=>'email',

    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            'name.unique'=>'Ten bi trung, nhap lai',
            'email.email'=>'Email không đúng định dạng',
    	]);

    	$position = new Position;
    	$position->name=$req->name ;
        $position->phone=$req->phone;
        $position->description=$req->description;
        $position->id_department=$req->department;
    	$position->save();
    	return redirect('admin/vitri/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$position = Position::find($id);
        $departments = Department::all();
    	return view('admin.vitri.sua',compact('position','departments'));
    }

    public function postSua(Request $req,$id){
    	$position = Position::find($id);
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100',
            'email'=>'email',



    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            'email.email'=>'Email không đúng định dạng',
    		
    	]);

        $position->name=$req->name ;
        $position->phone=$req->phone;
        $position->description=$req->description;
        $position->id_department=$req->department;
    	$position->save();
    	return redirect('admin/vitri/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getXoa($id){
    	$position= Position::find($id);
    	$position->delete();
    	return redirect('admin/vitri/danhsach')->with('thongbao','Xoá thành công');
    }
}
