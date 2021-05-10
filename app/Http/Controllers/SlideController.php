<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;


class SlideController extends Controller
{
    public function getDanhsach(){
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',compact('slide'));
    }

    public function getThem(){
    	return view('admin.slide.them');
    }

    public function postThem(Request $req){
    	$slide = new Slide;
    	if($req->has('link'))
        $slide->link=$req->link;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/slide/them')->with('thongbao','Chỉ chọn file có đuôi jpg,png,jpeg');
    			}
    			$name = $file->getClientOriginalName();
    			$hinh = str_random(4)."_".$name;
    			While(file_exists("source/image/slide/".$hinh))
    			{
    					$hinh = str_random(4)."_".$name;
    			}
    			$file->move("source/image/slide",$hinh); //lua hinh vao file uoload
    			$slide->image=$hinh;
    	}
    	else{
    		$slide->image="";
    	}
    	$slide->save();
    	return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$slide= Slide::find($id);
    	return view('admin.slide.sua', compact('slide'));
    }

    public function postSua(Request $req,$id){
    	$this->validate($req,[
   			'name'=>'required'

    	],[
    		'name.required'=>'Ban chua nhap ten'

    	]);
    	$slide= Slide::find($id);
    	if($req->has('link'))
        $slide->link=$req->link;
    	if($req->hasFile('Hinh'))
    	{
    			$file = $req->file('Hinh');
    			$duoi=$file->getClientOriginalExtension();
    			if($duoi != 'jpg'&& $duoi!='png' && $duoi!='jpeg' )
    			{
    				return redirect('admin/slide/them')->with('thongbao','chi chon file co duoi jpg,png,jpeg');
    			}
    			 $name = $file->getClientOriginalName();
                $hinh = str_random(4)."_".$name;
                While(file_exists("upload/slide/".$hinh))
                {
                        $hinh = str_random(4)."_".$name;
                }
                
                $file->move("source/image/slide",$hinh); //lua hinh vao file uoload
                $slide->Hinh=$hinh;
    	}
        else{
            $slide->image=$slide->image;
        }
  
    	$slide->save();
    	return redirect('admin/slide/sua/'.$id)->with('thongbao','Sua thanh cong');
    }
    

    public function getXoa($id){
    	$slide= Slide::find($id);
    	$slide->delete();
    	return redirect('admin/slide/danhsach')->with('thongbao','Xoá thành công');
    }
}
