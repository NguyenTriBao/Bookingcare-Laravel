<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    //
    private $doctor, $schedule;

    public function __construct(Doctor $doctor, Schedule $schedule){
        $this->doctor = $doctor;
        $this->schedule = $schedule;
    }
    public function index(){
        $doctors = $this->doctor->get();
        return view('admin.schedules.manageSchedules', compact('doctors'));
    }
    public function edit($id){
        $doctor = Doctor::with('user')
        ->whereHas('user', function($query) use ($id) {
            $query->where('doctorId', $id); // Lọc theo id của user
        })->first();;
        $schedules = $this->schedule->where('doctorId', $id)->get();
       return view('admin.schedules.editSchedules', compact('doctor','schedules'));
    }
    public function create(Request $request){
        $date = $request->input('date');
        $doctorId = $request->input('doctorId');
        if(!$date || !$doctorId){
            return response()->json(['error' => 'Thiếu thông tin!'], 400);
        }
        $this->schedule->create([
            'date' => $date,
            'doctorId' => $doctorId
        ]);
        return response()->json(['message' => 'Tạo lịch khám thành công!']);
    }
}