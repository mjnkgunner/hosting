<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use App\Position;
use App\Department;
use App\Staff;

class StaffController extends Controller
{

    public function getDanhsach(){
      $staffs = Staff::all();
      return view('admin.nhanvien.danhsach',compact('staffs'));
    }

    public function getThem(){
      $positions = Position::where('id_department','<>','1')->where('id_department','<>','2')->get();
      $departments = Department::where('name','<>','Khach Hang')->where('name','<>','Admin')->get();
      return view('admin.nhanvien.them',compact('positions','departments'));
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
      $staff = new Staff;
      $staff->id_user = $nd->id;
      $staff->salary = $req->salary;
      $staff->is_active = 1;
      $staff->save();
      return redirect('admin/nhanvien/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
      $staff = Staff::find($id);
      $nd = User::find($staff->id_user);
      $positions = Position::where('id_department','<>','1')->where('id_department','<>','2')->get();
      $departments = Department::where('name','<>','Khach Hang')->where('name','<>','Admin')->get();
      return view('admin.nhanvien.sua',compact('nd','positions','departments','staff'));
    }

    public function postSua(Request $req, $id){
      $this->validate($req,[
        'name'=>'required'
      ],[
        'name.required'=>'Bạn chưa nhập tên'
      ]);
      $staff = Staff::find($id);
      $nd = User::find($staff->id_user);
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
      $staff->id_user = $staff->id_user;
      $staff->salary = $req->salary;
      $staff->is_active = $req->is_active;
      $staff->save();

      return redirect('admin/nhanvien/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
      $staff= Staff::find($id);
      $staff->delete();
      return redirect('admin/nhanvien/danhsach')->with('thongbao','Xoá thành công');

    }
}
