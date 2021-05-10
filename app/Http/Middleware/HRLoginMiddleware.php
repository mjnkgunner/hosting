<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\User;

class HRLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            
            if(Auth::user()->position->department->name == "HRS" || Auth::user()->position->department->name == "Admin")
            return $next($request);
        else
             return redirect('admin/dangnhap')->with('danger','Bạn không có quyền truy cập!');

        }
        else
            return redirect('admin/dangnhap');
    }
}
