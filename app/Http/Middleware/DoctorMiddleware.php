<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->roleId === 'R2') {
            return $next($request);
        }
        // Nếu không đúng, chuyển hướng hoặc báo lỗi
        return redirect('/')->with('error', 'Bạn không có quyền chỉnh sửa thông tin này.');
    }
}
