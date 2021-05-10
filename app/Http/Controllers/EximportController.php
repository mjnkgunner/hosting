<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Material;
use App\Eximport;
use App\Supplier;
use Auth;

class EximportController extends Controller
{
    public function getDanhsachXuat(){
        $exports=Eximport::all()->where('role',1);
        return view('admin.xuatnhap.danhsachxuat',compact('exports'));
    }
    public function getDanhsachNhap(){
        $imports=Eximport::all()->where('role',0);
        return view('admin.xuatnhap.danhsachnhap',compact('imports'));
    }

    public function getXuat(){
        $suppliers= Supplier::all();
        $materials =Material::all();
        return view('admin.xuatnhap.xuat',compact('materials','suppliers'));
    }
    public function getNhap(){
        $suppliers= Supplier::all();
        $materials =Material::all();
        return view('admin.xuatnhap.nhap',compact('materials','suppliers'));
    }

    public function postXuat(Request $req){
        $this->validate($req,
            [
                'unit'=>'required',
                'material'=>'required',
                'quantity'=>'required|numeric',
                'expire'=>'required',


            ],
            [
                'quantity.numeric'=>'Phải là số',
                'unit.required'=>'Nhập đơn vị',
                'material.required'=>'Bạn chưa chọn nguyen lieu',
                'expire.required'=>'Nhap han su dung'
            ]);

        $export = new Eximport;
        $export->id_user = Auth::user()->id;
        $export->id_material= $req->material;
        $export->unit=$req->unit;
        $export->unit_price=1;
        $export->role=1;
        $export->quantity=$req->quantity;
        $export->expire = $req->expire;
        $material = Material::find($req->material);
        if ($req->quantity >$material->total)
            return redirect('admin/xuatnhap/xuat')->with('loi','Xuat qua gioi han');
        else
            $material->total -=$req->quantity;
            $material->save();
            $export->save();
            return redirect('admin/xuatnhap/xuat')->with('thongbao','Xuat thành công');
    }

    public function postNhap(Request $req){
        $this->validate($req,
            [
                'unit'=>'required',
                'unit_price'=>'required|numeric',
                'material'=>'required',
                'quantity'=>'required|numeric',
                'expire'=>'required',


            ],
            [
                'unit_price.required'=>'Nhập giá ',
                'unit_price.numeric'=>'Phải là số',
                'quantity.numeric'=>'Phải là số',
                'unit.required'=>'Nhập đơn vị',
                'material.required'=>'Bạn chưa chọn nguyen lieu',
                'expire.required'=>'Nhap han su dung'
            ]);

        $import = new Eximport;
        $import->id_user = Auth::user()->id;
        $import->id_material= $req->material;
        $import->unit=$req->unit;
        $import->unit_price=$req->unit_price;
        $import->role=0;
        $import->quantity=$req->quantity;
        $import->expire = $req->expire;
        $material = Material::find($req->material);
        $material->total +=$req->quantity;
        $material->save();
        $import->save();
        return redirect('admin/xuatnhap/nhap')->with('thongbao','Nhap thành công');
    }

}
