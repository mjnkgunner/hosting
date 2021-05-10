<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Customer;
use Hash;


class CustomerController extends Controller
{

    public function getDanhsach(){
      $khachhang = Customer::all();
      return view('admin.khachhang.danhsach',compact('khachhang'));
    }

    public function getThem(){
      return view('admin.khachhang.them');
    }

    public function postThem(Request $req){
      $this->validate($req,
        [
          'name'=>'required|min:3',
          'email'=>'required|email',
          'gender'=>'required',
          'address'=>'required', 
          'phone_number'=>'required', 
          'note'=>'required',
          
        ],
        [
          'name.required'=>'Bạn chưa nhập tên người dùng',
          'name.min'=>'Tên người dùng lớn hơn 3 kí tự',
          'email.required'=>'Bạn chưa nhập email',
          'email.email'=>'Bạn chưa nhập đúng định dạng email',
          'gender.required'=>'Bạn chưa  chọn giới tính',
          'address.required'=>'Bạn chưa nhập địa chỉ',
          'phone_number.required'=>'Bạn chưa nhập số điện thoại',
          'note.required'=>'Bạn chưa nhập chú thích',
        ]);

      $customer = new Customer;
      $customer->name= $req->name;
      $customer->gender=$req->gender;
      $customer->email=$req->email;
      $customer->address= $req->address;
      $customer->phone_number= $req->phone_number;
      $customer->note= $req->note;
      $customer->save();

      return redirect('admin/khachhang/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
      $customer = Customer::find($id);
      return view('admin.khachhang.sua',compact('customer'));
    }

    public function postSua(Request $req, $id){
      $this->validate($req,[
          'name'=>'required|min:3',
          'email'=>'required|email',
          'gender'=>'required',
          'address'=>'required', 
          'phone_number'=>'required', 
          'note'=>'required',
      ],[
          'name.required'=>'Bạn chưa nhập tên người dùng',
          'name.min'=>'Tên người dùng lớn hơn 3 kí tự',
          'email.required'=>'Bạn chưa nhập email',
          'email.email'=>'Bạn chưa nhập đúng định dạng email',
          'gender.required'=>'Bạn chưa  chọn giới tính',
          'address.required'=>'Bạn chưa nhập địa chỉ',
          'phone_number.required'=>'Bạn chưa nhập số điện thoại',
          'note.required'=>'Bạn chưa nhập chú thích',
      ]);

      $customer = Customer::find($id);
      $customer->name= $req->name;
      $customer->gender=$req->gender;
      $customer->email=$req->email;
      $customer->address= $req->address;
      $customer->phone_number= $req->phone_number;
      $customer->note= $req->note;
      $customer->save();
      return redirect('admin/khachhang/sua/'.$id)->with('thongbao','Sửa thành công');
    }
}
