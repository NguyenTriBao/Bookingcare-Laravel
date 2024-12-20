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

    public function getAllUsers(){
        $users = $this->user->all();
        return view('admin.user.userManagement')->with('users', $users);
    }
}
