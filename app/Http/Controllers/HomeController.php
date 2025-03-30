<?php

namespace App\Http\Controllers;
use App\Models\Specialty;
use App\Models\Doctor;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        $specialties = Specialty::get();
        $doctors = Doctor::with('user')->whereHas('user', function($query) {
            $query->where('roleId', 'R2'); // Lọc theo roleId của user
        })->get();
        return view ('clients.index', compact('specialties','doctors'));
    }
}
