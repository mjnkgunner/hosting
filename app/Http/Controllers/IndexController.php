<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use App\Position;
use App\Department;
use App\Material;
use App\Eximport;
use App\Bill;
use App\Promotion;
use App\Staff;

class IndexController extends Controller{
	 public function getHome(){
	 	$exporttotal =0;
	 	$importtotal =0;
	 	$moneytotal = 0;
	 	$month = date('y-m-d h:i:s');
	 	$materials = Material::where('total','<',10)->get();
	 	$exports = Eximport::where('role',1)->get();
	 	$imports = Eximport::where('role',0)->get();
	 	$bills = Bill::all();
	 	$countuser = User::count();
	 	$countbill = Bill::count();
	 	foreach($imports as $import){
	 		$importtotal +=$import->quantity*$import->unit_price;
	 	}
	 	foreach($exports as $export){
	 		foreach($imports as $import){
	 			if($export->id_material==$import->id_material){
	 				$exporttotal += $export->quantity*$import->unit_price;
	 			}
	 			
	 		}
	 		
	 	}
	 	foreach($bills as $bill){
	 		$moneytotal+=$bill->total;
	 	}
	 	$promotions = Promotion::where('isActive',1)->get();
	 	$users = User::where('points','>',5000)->orderBy('points','asc')->get();
	 	$totalsalary = Staff::where('is_active',1)->sum('salary');
	 	$totalstaff = Staff::count();
      return view('admin.layout.home',compact('materials','exporttotal','importtotal','moneytotal','users','countuser','promotions','countbill','totalsalary','totalstaff'));
    }
    
    public function postThongke(Request $req){
    	$fromDate = $req->fromDate;
    	$toDate = $req->toDate;
    	$exporttotal =0;
	 	$importtotal =0;
	 	$moneytotal = 0;
	 	$date = date('y-m-d h:i:s');
	 	$exports = Eximport::where('role',1)->where('created_at','<=',$toDate)->where('created_at','>=',$fromDate)->get();
	 	$imports = Eximport::where('role',0)->where('created_at','<=',$toDate)->where('created_at','>=',$fromDate)->get();
	 	$bills = Bill::where('created_at','<=',$toDate)->where('created_at','>=',$fromDate)->get();
	 	$countuser = User::where('created_at','<=',$toDate)->where('created_at','>=',$fromDate)->count();
	 	$countbill = Bill::where('created_at','<=',$toDate)->where('created_at','>=',$fromDate)->count();
	 	foreach($imports as $import){
	 		$importtotal +=$import->quantity*$import->unit_price;
	 	}
	 	foreach($exports as $export){
	 		foreach($imports as $import){
	 			if($export->id_material==$import->id_material){
	 				$exporttotal += $export->quantity*$import->unit_price;
	 			}
	 			
	 		}
	 		
	 	}
	 	foreach($bills as $bill){
	 		$moneytotal+=$bill->total;
	 	}
	 	$promotions = Promotion::where('isActive',1)->where('toDate','<=',$toDate)->where('fromDate','>=',$fromDate)->get();
	 	$users = User::where('points','>',5000)->where('created_at','<=',$toDate)->where('created_at','>=',$fromDate)->orderBy('points','asc')->get();
	 	$totalsalary = Staff::where('is_active',1)->where('created_at','<=',$toDate)->where('created_at','>=',$fromDate)->sum('salary');
	 	$totalstaff = Staff::where('created_at','<=',$toDate)->where('created_at','>=',$fromDate)->count();
      return view('admin.layout.thongke',compact('exporttotal','importtotal','moneytotal','users','countuser','promotions','countbill','totalsalary','totalstaff'));
    }
}