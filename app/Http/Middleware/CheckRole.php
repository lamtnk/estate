<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Kiểm tra nếu người dùng đã đăng nhập và có quyền truy cập
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'editor') {
                return $next($request);
            }   
        }

        return redirect('/')->with('error',403);
    }
}
