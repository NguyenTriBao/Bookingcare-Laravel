<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Appointment;
use App\Models\History;
use App\Http\Requests\ScheduleRequest;
use Illuminate\Support\Facades\Mail;

class ScheduleController extends Controller
{
    //
    private $doctor, $schedule,$user,$appointment;

    public function __construct(Doctor $doctor, Schedule $schedule, User $user, Appointment $appointment, History $history){
        $this->doctor = $doctor;
        $this->schedule = $schedule;
        $this->user = $user;
        $this->appointment = $appointment;
        $this->history = $history;
    }
    public function index(){
        $doctors = $this->doctor->get();
        return view('admin.schedules.manageSchedules', compact('doctors'));
    }

    // Get Infor 1 Doctor 
    public function edit($id){
        $doctor = Doctor::with('user')
        ->whereHas('user', function($query) use ($id) {
            $query->where('doctorId', $id); // Lọc theo id của user
        })->first();;
        $schedules = $this->schedule->where('doctorId', $id)->get();
        $appointments = $this->appointment->where('doctorId', $id)->get();
       // Lấy danh sách tất cả `patientId` từ các cuộc hẹn
        $patientIds = $appointments->pluck('patientId')->toArray();

        // Lấy thông tin bệnh nhân dựa trên danh sách `patientId`
        $patients = User::whereIn('id', $patientIds)->get();
        return view('admin.schedules.editSchedules', compact('doctor','schedules','appointments','patients'));
    }

    //Create 1 Schedule
    public function create(ScheduleRequest $request) {
            // Code xử lý tạo lịch khám
            $this->schedule->create([
                'date' => $request->input('date'),
                'doctorId' => $request->input('doctorId'),
            ]);
            return response()->json(['message' => 'Tạo lịch khám thành công!'], 200);
    }

    //Patient Booking a appointment
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

    //Store Patient
    public function storePatient(Request $request){
        $_SESSION['patientData'] = $request->all();
        return response()->json(['success' => true]);
    }

    public function issueInvoice(){
        if (!$_SESSION['patientData']) {
            return redirect('/')->with('error', 'Không tìm thấy dữ liệu bệnh nhân.');
        }

        return view('admin.schedules.issue-invoice', ['patient' => $_SESSION['patientData']]);
    }

    //Send Email to Patient and add to history database
    public function sendEmailToPatient(Request $request){
        $dataEmail = $request->all();
       Mail::send('admin.schedules.form-issue-invoice', compact('dataEmail'), function($email) use($dataEmail){
           $email->subject('BookingCare - Hoá đơn khám bênh');
           $email->to($dataEmail['email'], $dataEmail['fullName']);   
       });
       $this->history->create([
            'doctorId' => $dataEmail['doctorId'],
            'patientId' => $dataEmail['patientId'],
            'price' => 150000,
            'result' => $dataEmail['result'],
            'note_patient' => $dataEmail['note']
       ]);
       return redirect()->route('edit-schedules',['id' => $dataEmail['doctorId']]);
    }
}