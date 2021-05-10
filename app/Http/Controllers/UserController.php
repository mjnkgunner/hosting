<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use App\Position;
use App\Department;

class UserController extends Controller
{
    public function getDangnhapAdmin(){
    	return view('admin.dangnhap');
    }

    public function postDangnhapAdmin(Request $request){
    	$this->validate($request,
  		[
  			'email'=>'required|email',
  			'password'=>'required|min:6|max:20'
  		],
  		[
  			'email.required'=>'Vui lòng nhập mật khẩu',
  			'email.email'=>'Email không đúng định dạng',
  			'password.required'=>'Vui lòng nhập mật khẩu',
  			'password.min'=>'Mật khẩu ít nhất 6 kí tự',
  			'password.max'=>'Mật khẩu không quá 20 kí tự',
  		]
  	);


        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password], $request->input('remember')) && Auth::user()->position->department->name != 'Khach hang')
        {
            return redirect('admin/layout/home');
        }
        else
        {
            return redirect('admin/dangnhap')->with('danger','Đăng nhập không thành công');
        }
    }
   

    public function getDangxuatAdmin(){
    	Auth::logout();
    	return redirect('admin/dangnhap');
    }


    public function getDanhsach(){
      $nguoidung = User::all();
      $user = Auth::user();
      return view('admin.nguoidung.danhsach',compact('nguoidung','user'));
    }

    public function getThem(){
      $positions = Position::where('id_department',1)->orWhere('id_department',2)->get();
      $departments = Department::where('id',1)->orWhere('id',2)->get();
      return view('admin.nguoidung.them',compact('positions','departments'));
    }

    public function postThem(Request $req){
      $this->validate($req,
        [
          'name'=>'required|min:3',
          'email'=>'required|email|unique:users,email', 
          'password'=>'required|min:6|max:20',
          'passwordagain'=>'required|same:password',
          'phone'=>'required',
          'gender'=>'required',
          'address'=>'required',

        ],
        [
          'name.required'=>'Bạn chưa nhập tên người dùng',
          'name.min'=>'Tên người dùng lớn hơn 3 kí tự',
          'email.required'=>'Bạn chưa nhập email',
          'email.email'=>'Bạn chưa nhập đúng định dạng email',
          'email.unique'=>'Email đã tồn tại',
          'password.required'=>'Bạn chưa nhập password',
          'password.min'=>'Mật khẩu ít nhất 6 kí tự',
          'password.max'=>'Mật khẩu tối đa 20 kí tự',
          'passwordagain.required'=>'Bạn chưa nhập lại mật khẩu',
          'passwordagain.same'=>'Mật khẩu nhập lại không trùng khớp',
          'phone.required'=>'Nhap so dien thoai',
          'gender.required'=>'Chon gioi tinh',
          'address.required'=>'Nhap dia chi cua ban',
        ]);

      $nd = new User;
      $nd->full_name=$req->name;
      $nd->email =$req->email;
      $nd->phone = $req->phone;
      $nd->address= $req->address;
      $nd->role = $req->role;
      $nd->gender = $req->gender;
      $nd->dob = $req->dob;
      $nd->id_position = $req->position;
      $nd->points =0;
      $nd->password = Hash::make($req->password);
      $nd->save();
      return redirect('admin/nguoidung/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
      $nd = User::find($id);
      $positions = Position::all();
      $departments = Department::all();
      return view('admin.nguoidung.sua',compact('nd','positions','departments'));
    }

    public function postSua(Request $req, $id){
      $this->validate($req,[
        'name'=>'required'
      ],[
        'name.required'=>'Bạn chưa nhập tên'
      ]);

      $nd = User::find($id);
      $nd->full_name=$req->name;
      $nd->phone = $req->phone;
      $nd->address= $req->address;
      $nd->role = $req->role;
      $nd->gender = $req->gender;
      $nd->dob = $req->dob;
      $nd->id_position=$req->position;;
      $nd->points = $nd->points;
      if($req->changePassword == "on")
      {
        $this->validate($req,
        [
          
          'password'=>'required|min:6|max:20',
          'passwordagain'=>'required|same:password'
        ],
        [
          
          'password.required'=>'Bạn chưa nhập password',
          'password.min'=>'Mật khẩu ít nhất 6 kí tự',
          'password.max'=>'Mật khẩu tối đa 20 kí tự',
          'passwordagain.required'=>'Bạn chưa nhập lại mật khẩu',
          'passwordagain.same'=>'Mật khẩu nhập lại không khớp'
        ]);
              $nd->password=Hash::make($req->password);
      }
      $nd->save();
      return redirect('admin/nguoidung/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
      $user= User::find($id);
      $user->delete();
      return redirect('admin/nguoidung/danhsach')->with('thongbao','Xoá thành công');

    }
}
