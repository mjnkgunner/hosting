<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use App\ProductPoint;
use App\User;
use Auth;


class CommentController extends Controller
{
   public function post($id, Request $req){
   	 $comment = new Comment;
   	 $comment->id_product = $id;
   	 $comment->id_user = Auth::user()->id;
   	 $comment->content= $req->content;
   	 $comment->points = $req->points;
   	 $comment->is_active =1;
   	 $comment->save();

   	 return redirect()->back();
   }

   public function notActive($id){
   	$comment = Comment::find($id);
   	$comment->is_active=0;
   	$comment->save();

   	return redirect()->back();

   }

   public function getDanhsach(){
   	$comments = Comment::all();
   	return view('admin.comment.danhsach',compact('comments'));
   }

   public function getActive($id){
   	$comment = Comment::find($id);
   	$comment->is_active=1;
   	$comment->save();

   	return redirect()->back();
   }

}
