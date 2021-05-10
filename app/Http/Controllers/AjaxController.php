<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Supplier;
use App\Material;
use App\Position;
use App\Department;

class AjaxController extends Controller
{
    //
    public function getSanPham($id_type)
    {
    	$sanpham=Product::where('id_type',$id_type)->get();
    	foreach ($sanpham as $sp) 
    	{
    		echo "<option value='".$sp->id."'>".$sp->name."</option>" ;
    	}
    }

    public function getNguyenlieu($id_supplier)
    {
    	$materials=Material::where('id_supplier',$id_supplier)->get();
    	foreach ($materials as $material)
    	{
    		echo "<option value='".$material->id."'>".$material->name."</option>" ;
    	}
    }

    public function getVitri($id_department)
    {
        $positions=Position::where('id_department',$id_department)->get();
        foreach ($positions as $position)
        {
            echo "<option value='".$position->id."'>".$position->name."</option>" ;
        }
    }
}