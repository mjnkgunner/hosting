<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Position;
use App\Promotion;
use Hash;
use DateTime;
use Inani\Larapoll\Poll;
use Inani\Larapoll\Vote;
use Inani\Larapoll\Option;
use App\Comment;
use App\Payment;

use Illuminate\Support\Facades\Auth; 

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$new_product = Product::where('new',1)->paginate(4);
    	$spkm = Product::where('promotion_price','<>',0)->paginate(8);
    	return view('page.trangchu',compact('slide','new_product','spkm'));

    }
    public function getChitietSP(Request $req){
      $sanpham = Product::Where('id',$req->id)->first();
      $avg_point = Comment::where('id_product', $req->id)->where('is_active',1)->avg('points');
      $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
      $new_product = Product::where('new',1)->paginate(6);
      return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','new_product','avg_point'));
    }
      public function getLoaiSp($type){
      $sp_theoloai = Product::where('id_type', $type)->get();
      $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
      $loai = ProductType::all();
      $loai_sp = ProductType::where('id',$type)->first();
      return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getKhaosat(){
      $poll = Poll::Where('isClosed',NULL)->first();
      return view('page.khaosat', compact('poll'));
    }
    public function postKhaosat(Request $req){
      $vote = new Vote;
      if (Auth::check()){
         $vote->user_id = Auth::user()->id;

      }
      else $vote->user_id=0;
      $vote->option_id = $req->option;
      $option = Option::find($req->option);
      $option->votes +=1;
      $option->save();
      $vote->save();
      return redirect()->back()->with('thongbao','Cảm ơn bạn đã bình chọn!');
    }
    public function getLienhe(){
    	return view('page.lienhe');
    }
    public function getGioithieu(){
    	return view('page.gioithieu');
    }
   
    public function getDathang(){
    	return view('page.dathang');
    }
    public function postDathang(Request $req){
    	$cart = Session::get('cart');
      if ($req->promotion <>""){
        $promotion = Promotion::all()->where('code',$req->promotion)->first();
        $date = date('Y-m-d H:i');
        if (strtotime($date)>strtotime($promotion->toDate)|| strtotime($date)<strtotime($promotion->fromDate) ||$promotion->isActive==0){
            return redirect()->back()->with('loi','Khuyến mãi chưa đúng hạn');
        }
        $promotion->count +=1;
        $promotion->save();
        $rate = $promotion->rate;
        $cost = $promotion->cost;
        $finalPrice = $cart->totalPrice - $cart->totalPrice*$rate/100 - $cost*1000;
        $id_promotion = $promotion->id;
        
      }
      else{
        $finalPrice = $cart->totalPrice;
        $id_promotion = 0;
      }
      
      if (Auth::check()){
        $user = Auth::user();
        $customer = new Customer;
        $customer->id_user = $user->id;
        $customer->name= $user->full_name;
        $customer->gender=$user->gender;
        $customer->email=$user->email;
        $customer->address= $user->address;
        $customer->phone_number= $user->phone;
        $customer->note= $req->notes;
        $user->points += $finalPrice/100;
        $user->save();
        $customer->save();
      }
      else{
          $customer = new Customer;
          $customer->name= $req->name;
          $customer->gender=$req->gender;
          $customer->email=$req->email;
          $customer->address= $req->address;
          $customer->phone_number= $req->phone;
          $customer->note= $req->notes;
          $customer->save();
      }

    	$bill= new Bill;
      $bill->id_promotion = $id_promotion;
    	$bill->id_customer = $customer->id;
    	$bill->date_order = date('Y-m-d');
    	$bill->total = $finalPrice;
    	// $bill->payment = $req->payment_method;
    	$bill->note = $req->notes;
    	$bill->save();

    foreach ($cart->items as $key => $value) {
    	# code...
    	$bill_detail = new BillDetail;
    	$bill_detail->id_bill = $bill->id;
    	$bill_detail->id_product = $key;
    	$bill_detail->quantity = $value['qty'];
    	$bill_detail->unit_price = $value['price']/$value['qty'];
    	$bill_detail->save();
    }
    if($req->payment_method=="Online"){
        // session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "8OP0M9TG"; //Mã website tại VNPAY 
        $vnp_HashSecret = "BRIHJRDSMDBDNJVGNRVDJOYGWHBDUGSM"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://boiling-reaches-11114.herokuapp.com/return-vnpay";
        $vnp_TxnRef = $bill->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $finalPrice*100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
      }
      else{
        $payment = new Payment;
        $payment->id_bill= $bill->id;
        $payment->method = 'COD';
        $payment->total = $finalPrice;
        $payment->state = 0;
        $payment->save();
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công '); 

      }
    
    }
  public function return(Request $request)
    {
        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
            // $this->apSer->thanhtoanonline(session('cost_id'));
            $payment = new Payment;
            $payment->id_bill= $request->vnp_TxnRef;
            $payment->method = 'Online';
            $payment->total = $request->vnp_Amount;
            $payment->state = 1;
            $payment->save();
            Session::forget('cart');
            return redirect($url)->with('thongbao' ,'Đã thanh toán phí dịch vụ');
        }
        else{
          $id = $request->vnp_TxnRef;
          $order = Bill::find($id);
          $order->delete();
          session()->forget('url_prev');
          return redirect($url)->with('loi' ,'Lỗi trong quá trình thanh toán phí dịch vụ');

        }
        
    }

  public function getDangnhap(){
  	return view('page.dangnhap');
  }

  public function postDangnhap(Request $req){
  	$this->validate($req,
  		[
  			'email'=>'required|email',
  			'password'=>'required|min:6|max:20'
  		],
  		[
  			'email.required'=>'Vui lòng nhập mật khấu',
  			'email.email'=>'email không đúng định dạng',
  			'password.required'=>'Vui lòng nhập khẩu',
  			'password.min'=>'Mật khẩu ít nhất 6 kí tự',
  			'password.max'=>'Mật khẩu không quá 20 kí tự',
  		]
  	);
  	$credentials = array('email'=>$req->email,'password'=>$req->password);
  	if(Auth::attempt($credentials)){
  		return redirect('trangchu')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);

  	}
  	else{
  		return redirect()->back()->with('danger','Sai email hoặc mật khẩu');
  	}

  }

  public function getDangki(){
  	return view('page.dangki');
  }
  public function postDangki(Request $req){
  	$this->validate($req,
  		[
  			'email'=>'required|email|unique:users,email', 
  			'password'=>'required|min:6|max:20',
  			'fullname'=>'required',
  			're_password'=>'required|same:password',
        'phone'=>'required',
        'gender'=>'required',
        'address'=>'required',

  		],
  		[
  			'email.required'=> 'Vui lòng nhập email',
  			'email.email'=>'Email không đúng định dạng',
  			'email.unique'=>'Email đã có người sử dụng',
  			'password.required'=>'Vui lòng nhập mật khẩu',
  			're_password.same'=>'Mật khẩu không giống nhau',
  			'password.min'=>'Mật khẩu ít nhất 6 kí tự',
        'phone.required'=>'Nhap so dien thoai',
        'gender.required'=>'Chon gioi tinh',
        'address.required'=>'Nhap dia chi cua ban',
  		]
  	);
  	$user = new User();
  	$user->full_name = $req->fullname;
  	$user->email = $req->email;
  	$user->password = Hash::make($req->password);
  	$user->phone= $req->phone;
  	$user->address= $req->address;
    $user->gender = $req->gender;
    $user->dob = $req->dob;
    $user->id_position = 1;
    $user->points =0;
  	$user->save();
  	return redirect()->back()->with('thongbao','Tạo tài khoản thành công');
  }

  public function postDangxuat(){
  	Auth::logout();
  	return redirect('trangchu');
  }
  
  public function getTimkiem(Request $req){
  	$product = Product::where('name','like','%'.$req->key.'%')
  						->orWhere('unit_price',$req->key)
  						->get();
  	return view('page.timkiem',compact('product'));
  }

 public function getNguoidung(){
    $nguoidung = Auth::user();
    $date = date('m-d');
    $dob = new DateTime($nguoidung->dob);
    $sn = $dob->format('m-d');
    return view('page.nguoidung',compact('nguoidung','date','sn'));
  }
  public function postNguoidung(Request $req){
    $user=Auth::user();
    $user->full_name = $req->fullname;
    $user->phone= $req->phone;
    $user->address= $req->address;
    $user->role="0";
    $user->gender = $req->gender;
    $user->dob = $req->dob;
    $user->id_position=$user->id_position;
    $user->points = $user->points;
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
              $user->password=Hash::make($req->password);
      }
    $user->save();
    return redirect('nguoidung')->with('thongbao','Thay đổi thành công');

  }
  public function getDonhang(){
    $user = Auth::user();
    $orders =Bill::all();
    $customers = Customer::all()->where('id_user',$user->id);
    return view('page.donhang',compact('orders','customers'));
  }
  public function getDonhangchitiet($id_bill){
        $detail = BillDetail::all()->where('id_bill',$id_bill);
        $product = Product::all();
        return view('page.donhangchitiet', compact('detail','product'));
  }
  public function getHuydonhang($id_bill){
    $user = Auth::user();
    $bill=Bill::find($id_bill);
    $bill->note = "Cancelled";
    $user->points -= $bill->total/100;
    $user->save();
    $bill->save();

    return redirect('donhang')->with('thongbao','Huy thanh cong');
  }

}
