<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Handbook;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;


class AdminController extends Controller
{

    private $user;
    private $handbook;
    private $history;

    public function __construct(User $user, Handbook $handbook, History $history){
        $this->user = $user;
        $this->handbook = $handbook;
        $this->history = $history;
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
    //Get data on page dashboard
    public function getAllPostAdmin()
    {
        if (Auth::user() == null) {
            return redirect('/admin');
        }
        else{
            //Lấy 5 bài viết mới nhất
            $posts = $this->handbook->latest()->take(5)->get();
    
            // Lấy doanh thu theo tháng
            $data = History::selectRaw('MONTHNAME(created_at) as month, SUM(price) as total')
                ->groupBy('month')
                ->orderByRaw('MONTH(created_at)') // Đảm bảo thứ tự theo tháng
                ->get();
        
            // Chuyển thành mảng để gửi qua frontend
            $months = $data->pluck('month')->toArray();
            $totals = $data->pluck('total')->toArray();

            //Lấy số lượng bác sĩ
            $doctorCount = $this->user->where('roleId','R2')->count();

            //Lấy số lượng bệnh nhân
            $patientCount = $this->user->where('roleId','R3')->count();

            //Lấy số lượng hoá đơn trong tháng
            $totalBill = $this->history
            ->selectRaw('COALESCE(MONTH(created_at), 0) as month') // Trả về 0 nếu không có dữ liệu
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->groupBy('month')
            ->orderByRaw('MONTH(created_at) DESC')
            ->pluck('month') // Lấy giá trị trực tiếp thay vì object
            ->first();  // Nếu không có dữ liệu, trả về 0
            if (!$totalBill) {
                $totalBill = (object) ['month' => 0]; // Gán giá trị mặc định nếu không có dữ liệu
            } else {
                $totalBill->month = $totalBill->month ?? 0; // Đảm bảo month không bị null
            }
            return view('admin.index', compact('posts', 'months', 'totals','doctorCount','patientCount','totalBill'));
        }
    }
    
    
    //logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

    //Recover Password
    public function recover(Request $request){
        $doctor = $this->user
        ->where('email', $request->email)
        ->where(function ($query) {
            $query->where('roleId', 'R1')->orWhere('roleId', 'R2');
        })
        ->first();
        if($doctor){
            if($doctor->email == $request->email){
                return view('admin.change-password',compact('doctor'));
            }
        }
        else{
            return back()->with('error','Vai trò không hợp lệ');
        }
    }

    //Change Password
    public function changePassword(Request $request){
        if($request->newPassword === $request->confirmPassword){
            $doctor = $this->user
            ->where('email', $request->email)->first();
            $doctor->update([
                'password' =>  Hash::make($request->newPassword)
            ]);
            return redirect()->route('login');
        }
        else{
            return back()->with('error','Mật khẩu nhập lại không trùng khớp');
        }
    }

    //Recover Password
    public function recoverPassword(Request $request){
        if(!Hash::check($request->oldPassword, Auth::user()->password)){
            return back()->with('error', 'Mật khẩu cũ không đúng');
        }
        if($request->newPassword !== $request->passwordConfirmation){
            return back()->with('error', 'Nhập lại mật khẩu mới không đúng, vui lòng nhập lại!');
        }
        else{
            $user = Auth::user();
            $user->update([
                'password' => Hash::make($request->newPassword)
            ]);
        }
        return $this->logout();
    }
}