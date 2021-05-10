<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Customer;
use App\Product;
use App\BillDetail;
use App\ProductType;
use App\Payment;

class OrderController extends Controller
{
    public function getDanhsach(){
    	$order=Bill::all();
        $customer=Customer::all();
    	return view('admin.dathang.danhsach',compact('order','customer'));
    }

    public function getDanhsachchitiet($id_bill){
        $detail = BillDetail::all()->where('id_bill',$id_bill);
        $product = Product::all();
        return view('admin.dathang.danhsachchitiet', compact('detail','product'));
    }

    public function getThem(){
    	$loaisanpham =ProductType::all();
        $sanpham = Product::all();
    	return view('admin.dathang.them', compact('loaisanpham','sanpham'));
    }
    public function xacnhanthanhtoan($id){
        $payment = Payment::all()->where('id_bill',$id)->first();
        if($payment->state == 1)
          return redirect()->back()->with('thongbao','order đã được thanh toán');
        else
          $payment->state = 1;
          $payment->save();
          return redirect()->back()->with('thongbao','xác nhận thanh toán thành công');
  }

}
