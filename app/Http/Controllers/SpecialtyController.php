<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Requests\SpecialtyRequest;
use App\Http\Requests\EditSpecialtyRequest;
class SpecialtyController extends Controller
{
    private $specialty;

    public function __construct(Specialty $specialty){
        $this->specialty = $specialty;
    }

    //Get 1 Specialty
    public function detail ($id){
        $detailSpecialty = Specialty::get()->where('id', $id)->first();
        return view('clients.detail-specialty')->with('specialty', $detailSpecialty);
    }
    //Get all Specialties
    public function getAllSpecialty(){
        $specialties = Specialty::get();
        return view('admin.specialty.specialtyManagement')->with('specialties', $specialties);
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