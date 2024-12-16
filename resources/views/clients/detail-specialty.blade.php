@extends('clients.layouts.master')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="specialty-name">
            <img src="{{ asset('storage/' . $specialty->image) }}" alt="{{ $specialty->name }}" width="50"
                class="rounded-circle" />
            <h1>{{$specialty['name']}}</h1>
        </div>
        <div class="specialty-content">
            {{ $specialty['description']}}
        </div>

    </div>
</div>
<div class="bg-light" style="width: 100%; height: 50px;"></div>
<div class="container-xxl  py-5">
    <div style="margin: 0 0;">
        <h2> Bác sĩ </h2>
    </div>


    @foreach($specialty->doctors as $doctor)
    <div class="doctor-card">
        <div class="doctor-info">
        <img src="{{ asset('storage/' . $doctor->image) }}" alt="{{ $specialty->name }}"
        width="150" class="rounded-circle" />
            <div class="doctor-details">
                <h4><a href="/detail-doctor/{{$doctor['doctorId']}}"> {{$doctor->user['lastName']}} {{$doctor->user['firstName']}} Doctor</a> </h4>
                <p>{{$doctor['note']}}</p>
            </div>
        </div>
        <div class="appointment-schedule">
            <h5>LỊCH KHÁM</h5>
            <div class="time-slots">
                <button>09:00 - 09:30</button>
                <button>09:30 - 10:00</button>
                <button>10:00 - 10:30</button>
                <button>10:30 - 11:00</button>
            </div>
            <p class="fee-note">Chọn và đặt (Phí đặt lịch 0đ)</p>
            <h5>ĐỊA CHỈ KHÁM</h5>
            <p>Phòng khám Spinetech Clinic</p>
            <p>Tòa nhà GP, 257 Giải Phóng, Phương Mai, Đống Đa, Hà Nội</p>
            <h5>GIÁ KHÁM: 500.000đ <a href="#">Xem chi tiết</a></h5>
        </div>
    </div>

    @endforeach
</div>

@endsection