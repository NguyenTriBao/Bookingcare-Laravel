<?php

namespace App\Http\Controllers;
use App\Models\Specialty;
use App\Models\Doctor;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        $specialties = Specialty::get();
        $doctors = Doctor::get();
        return view ('clients.index', compact('specialties','doctors'));
    }
}
