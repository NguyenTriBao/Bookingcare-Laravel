<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Requests\SpecialtyRequest;
use App\Http\Requests\EditSpecialtyRequest;
use App\Models\Doctor;
class SpecialtyController extends Controller
{
    private $specialty;
    private $doctor;

    public function __construct(Specialty $specialty, Doctor $doctor){
        $this->specialty = $specialty;
        $this->doctor = $doctor;
    }

    //Get 1 Specialty
    public function detail ($id){
        $specialty = Specialty::with(['doctors.user', 'doctors.schedules'])->find($id);
        return view('clients.detail-specialty', compact('specialty'));
    }
    //Get all Specialties
    public function getAllSpecialties($view){
        $specialties = Specialty::get();
        return view($view)->with('specialties', $specialties);
    }
    public function getAllSpecialty(){
        return $this->getAllSpecialties('admin.specialty.specialtyManagement');
    }
    public function service(){
        return $this->getAllSpecialties('clients.service');
    }
    //Get 1 Specialty
    public function editSpecialty($id){
        $detailSpecialty = Specialty::get()->where('id', $id)->first();
        return view('admin.specialty.editSpecialty')->with('specialty', $detailSpecialty);
    }
    
    //Create New Specialty
    public function store(SpecialtyRequest $request){
    $imagePath = $request->file('image')->store('images', 'public');
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath
        ];
        
        $this->specialty->create($data);
        return redirect()->route('get_all_specialty');
    }


    //delete
    public function delete ($id){
        $specialty = Specialty::find($id);
        if (!$specialty) {
            return response()->json(['error' => 'Specialty not found'], 404);
        }
        $specialty->delete();
        return response()->json(['success' => 'Specialty deleted successfully']);
    }

    //update
    public function update(EditSpecialtyRequest $request){
        $imagePath = $request->file('image')->store('images', 'public');
       
        $this->specialty->find($request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' =>  $imagePath
        ]);
        return redirect()->route('get_all_specialty');
    }
}