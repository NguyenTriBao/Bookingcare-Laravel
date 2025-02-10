<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }
    //Get user
    public function getAllUsers(){
        $users = $this->user->paginate(10);
        return view('admin.user.userManagement')->with('users', $users);
    }
    //Delete User
    public function delete($id){
        $user = $this->user->find(id);
        if(!$user){
            return response()->json(['error' => 'User not found'], 404);
        }
        else{
            $user->doctor->delete();
            $user->delete();
            return response()->json(['success' => 'User deleted successfully']);
        }
    }
}
