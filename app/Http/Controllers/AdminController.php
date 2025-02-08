<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function adminIndex()
    {
        if (Auth::check()) {
            if (Auth::user()->roleId === 'R1' || Auth::user()->roleId === 'R2') {
                // Người dùng là admin
                return view('admin.index');
            } else {
                // Người dùng có roleId khác
                return redirect('/')->with('error', 'You do not have permission to access this page.');
            }
        } else {
            // Người dùng chưa đăng nhập
            return redirect('/login')->with('error', 'Please log in to continue.');
        }
     
    }
    //login
    public function login(Request $request) {
        $user = $this->user->where('email', $request->email)->first();
        if($user->roleId === 'R3'){
            return back()->with('error', 'Email hoặc mật khẩu không chính xác');
        }
        else{
            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                // Chuyển hướng tùy theo vai trò
                switch ($user->roleId) {
                    case 'R1': // Admin
                        return redirect()->to('/dashboard');
                    case 'R2': // Doctor
                        return redirect()->to('/dashboard');
                    default:
                        Auth::logout();
                        return back()->with('error', 'Vai trò không hợp lệ.');
                }
            }
        }
        return back()->with('error', 'Email hoặc mật khẩu không chính xác');
    }
    
    
    //logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
}