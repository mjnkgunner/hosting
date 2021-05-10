<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;
use Auth;
use App\SessionCart;

class CartController extends Controller
{
     public function getAddToCart(Request $req,$id){
    	$product = Product::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->add($product,$id);
    	$req->session()->put('cart',$cart);
        $sessioncart = new SessionCart;
        if(Auth::check()){
          $sessioncart->id_user = Auth::user()->id;
        }
        else{
          $sessioncart->id_user = 0;
        }
        $sessioncart->id_product = $id;
        $sessioncart->save();
    	return redirect()->back();
    }
    public function getDelItemCart($id){
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	if(count($cart->items)>0){
    		Session::put('cart',$cart);
    	}
    	else{
    		Session::forget('cart');
    	}
    	return redirect()->back();
    }

    public function getDanhsach(){
        $carts = SessionCart::all();
        return view('admin/giohang/danhsach', compact('carts'));
    }
}
