<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\User;

class AdminLoginMiddleware
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
            
            if(Auth::user()->position->department->name != "Normal")
            return $next($request);
        // if (Auth::user()->position->department->name== "Sale") {
        //     return $next($request);
        // }
        else
             return redirect('admin/dangnhap');

        }
        else
            return redirect('admin/dangnhap');
    }
}
