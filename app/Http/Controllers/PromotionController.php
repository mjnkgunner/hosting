<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\Bill;

class PromotionController extends Controller
{
   public function getDanhsach(){
   	$promotions= Promotion::all();
   	return view('admin.khuyenmai.danhsach',compact('promotions'));
   }
    public function getThem(){
    	return view('admin.khuyenmai.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100|unique:promotions,name',
            'code'=>'required|unique:promotions,code',
            'rate'=>'numeric',
            'cost'=>'numeric',
    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            'name.unique'=>'Ten bi trung, nhap lai',
            'code.required'=>'Nhap code',
            'code.unique'=>'Ma bi trung',
            'rate.numeric'=>'rate Phai la so',
            'cost.numeric'=>'cost Phai la so'
    	]);

    	$promotion = new Promotion;
    	$promotion->name=$req->name ;
        $promotion->code=$req->code;
        $promotion->rate=$req->rate;
        $promotion->cost=$req->cost;
        $promotion->toDate = $req->toDate;
        $promotion->fromDate =$req->fromDate;
        $promotion->isActive = $req->isActive;
    	$promotion->save();
    	return redirect('admin/khuyenmai/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$promotion = Promotion::find($id);
    	return view('admin.khuyenmai.sua',compact('promotion'));
    }

    public function postSua(Request $req,$id){
    	$promotion = Promotion::find($id);
    	$this->validate($req,[
    		'name'=>'required|min:3|max:100',
            'rate'=>'numeric',
            'cost'=>'numeric',


    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên ',
    		'name.min'=>'Tên lớn hơn 3 kí tự', 
    		'name.max'=>'Ít hơn 100 kí tự',
            'rate.numeric'=>'rate Phai la so',
            'cost.numeric'=>'cost Phai la so',
    		
    	]);
        $promotion->name=$req->name ;
        $promotion->code=$req->code;
        $promotion->rate=$req->rate;
        $promotion->cost=$req->cost;
        $promotion->toDate = $req->toDate;
        $promotion->fromDate =$req->fromDate;
        $promotion->isActive = $req->isActive;
        $promotion->save();
    	return redirect('admin/khuyenmai/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getXoa($id){
    	$promotion= Promotion::find($id);
    	$promotion->delete();
    	return redirect('admin/khuyenmai/danhsach')->with('thongbao','Xoá thành công');
    }
}
