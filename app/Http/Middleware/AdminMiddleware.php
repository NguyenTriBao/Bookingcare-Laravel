<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập và có roleId = 'R1' (admin) hay chưa
        if (Auth::check() && Auth::user()->roleId === 'R1') {
            return $next($request);
        }

        // Chuyển hướng về trang login nếu không đủ quyền
        return redirect('/admin/login')->with('error', 'Access Denied!');
    }
}
