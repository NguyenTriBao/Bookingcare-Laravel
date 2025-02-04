<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Appointment;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{
    //
    private $doctor, $schedule,$user,$appointment;

    public function __construct(Doctor $doctor, Schedule $schedule, User $user, Appointment $appointment){
        $this->doctor = $doctor;
        $this->schedule = $schedule;
        $this->user = $user;
        $this->appointment = $appointment;
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
    public function create(ScheduleRequest $request) {
            // Code xử lý tạo lịch khám
            $this->schedule->create([
                'date' => $request->input('date'),
                'doctorId' => $request->input('doctorId'),
            ]);
            return response()->json(['message' => 'Tạo lịch khám thành công!'], 200);
    }
    public function booking(Request $request){
        //Create Patient
        $patient =  $this->user->create([
            'lastName' => $request->name,
            'password' => '1',
            'email' => $request->email,
            'address' => $request->address,
            'phoneNumber' => $request->phonenumber,
            'gender' => $request->gender,
            'roleId' => 'R3'
        ]);
        //Create Schedule
        $this->appointment->create([
            'doctorId' => $request->doctorId,
            'patientId' => $patient->id,
            'price' => '150000',
            'time' => $request->time,
            'note' => $request->reason
        ]);
        return response()->json(['success' => true, 'message' => 'Đăng ký khám bệnh thành công'], 200);
    }
}