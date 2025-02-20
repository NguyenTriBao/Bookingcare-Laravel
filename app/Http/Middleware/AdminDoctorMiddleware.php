<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminDoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
                // Kiểm tra xem người dùng đã đăng nhập và có roleId = 'R1' (admin) hay chưa
                if (Auth::check() && Auth::user()->roleId === 'R1' || Auth::check() && Auth::user()->roleId === 'R2') {
                    return $next($request);
                }
                // Chuyển hướng về trang login nếu không đủ quyền
                return redirect('/dashboard')->with('error', 'Bạn Không có quyền truy cập');
    }
}
