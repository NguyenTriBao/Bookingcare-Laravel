<?php

namespace App\Http\Controllers;
use App\Models\Specialty;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        $specialties = Specialty::get();
        return view ('clients.index', compact('specialties'));
    }
}
