<?php

namespace App\Http\Controllers;
use App\Models\Specialty;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DoctorController extends Controller
{
    //
    private $user;
    private $specialty;
    private $doctor;
    private $role;

    public function __construct(Specialty $specialty, User $user, Doctor $doctor, Role $role){
        $this->user = $user;
        $this->specialty = $specialty;
        $this->doctor = $doctor;
        $this->role = $role;
    }

    //Get all doctors
    public function getAllDoctor(){
        //$doctors = $this->user->where('roleId','R2')->get();
        $doctors = Doctor::with('user')->whereHas('user', function($query) {
            $query->where('roleId', 'R2'); // Lọc theo roleId của user
        })->get();
        return view('admin.doctors.list-doctors', compact('doctors'));
    }

    //Create a new doctor
    public function addNewDoctor(){
        $url = 'https://provinces.open-api.vn/api/';
        $response = Http::get($url);
        $provinces = null;
        if ($response->successful()) {
            $provinces = $response->json();       
            // Hiển thị dữ liệu (hoặc xử lý theo ý bạn) 
        }
        $genders = $this->role->where('type', 'GENDER')->get();
        $specialties = $this->specialty->all();
        return view('admin.doctors.createDoctor', compact('specialties', 'provinces','genders'));
    }
    //store
    public function store(Request $request){
        $this->user->create([
            'email' => $request->email,
            'password' => $request->password,
            'firstName' => $request->fname,
            'lastName' => $request->lname,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'gender' => $request->gender,
            'roleId' => 'R2'
        ]);
        $userId = $this->user->where('email',$request->email)->first();
        if($userId){
            $imagePath = $request->file('image')->store('imageDoctors', 'public');
            $doctorId = $userId['id'];
            $this->doctor->create([
                'doctorId' => $doctorId,
                'specialtyId' => $request->specialtyId,
                'province' => $request->province,
                'note' => $request->note,
                'image' => $imagePath,
            ]);
        }
        return redirect()->route('get_all_doctor');
    }

    //Get 1 Doctor
    public function editDoctor($id){
        $doctor = Doctor::with('user')
        ->whereHas('user', function($query) use ($id) {
            $query->where('doctorId', $id); // Lọc theo id của user
        })
        ->first();
        $url = 'https://provinces.open-api.vn/api/';
        $response = Http::get($url);
        $provinces = null;
        if ($response->successful()) {
            $provinces = $response->json();       
            // Hiển thị dữ liệu (hoặc xử lý theo ý bạn) 
        }
        $genders = $this->role->where('type', 'GENDER')->get();
        $specialties = $this->specialty->all();
        return view('admin.doctors.editDoctor', compact('doctor', 'specialties', 'provinces','genders'));
    }
    public function update(Request $request){
        $doctor = $this->doctor->where('doctorId',$request->id)->first();
        // Kiểm tra người dùng có cập nhật ảnh mới hay không
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imageDoctors', 'public');
            $doctor->image = $imagePath; // Cập nhật ảnh mới
        }
        $doctor->update([
            'specialtyId' => $request->specialtyId,
            'province' => $request->province,
            'note' => $request->note,
        ]);
        $user = $this->user->find($request->id)->update([
            'password' => $request->password,
            'firstName' => $request->fname,
            'lastName' => $request->lname,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'gender' => $request->gender,
        ]);
        return redirect()->route('get_all_doctor');
    }
}