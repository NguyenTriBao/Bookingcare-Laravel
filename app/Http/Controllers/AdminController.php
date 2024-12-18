<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    //login
    public function login(Request $request) {
        // Tìm admin theo email và roleId
        $admin = $this->user->where('email', $request->email)
            ->where('roleId', 'R1')
            ->first();  // Trả về null nếu không tìm thấy admin
    
        // Kiểm tra nếu admin tồn tại và mật khẩu đúng
        if ($admin && Hash::check($request->password, $admin->password)) {
            session()->put('admin_id', $result->admin_id);
            return redirect()->to('dashboard');
        } else {
            // Nếu không tìm thấy admin hoặc mật khẩu không đúng
            return back()->with('error', 'Email hoặc mật khẩu không chính xác');
        }
    }
    
}
