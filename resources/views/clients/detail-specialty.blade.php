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
        <h2> Đội ngũ bác sĩ của chuyên khoa </h2>
    </div>


    @foreach($specialty->doctors as $doctor)
    <div class="doctor-card">
        <div class="doctor-info">
            <img src="{{ asset('storage/' . $doctor->image) }}" alt="{{ $specialty->name }}" width="150"
                class="rounded-circle" />
            <div class="doctor-details">
                <h4><a href="/detail-doctor/{{$doctor['doctorId']}}"> {{$doctor->user['lastName']}}
                        {{$doctor->user['firstName']}} Doctor</a> </h4>
            </div>
        </div>
        <div class="appointment-schedule">
            <h5>LỊCH KHÁM</h5>
            <h6>
                NGÀY: <input type="text" id="booking-date" placeholder="Chọn ngày khám" value= />
            </h6>
            <div class="time-slots">
                @foreach($doctor->schedules as $schedule)
                <button class="date" data-date="{{ $schedule->date }}"><?php print_r (explode(" ",$schedule->date)[1]);?></button>
                @endforeach
            </div>
            <h5>ĐỊA CHỈ KHÁM</h5>
            <p>Phòng khám Spinetech Clinic</p>
            <p>Tòa nhà GP, 257 Giải Phóng, Phương Mai, Đống Đa, Hà Nội</p>
            <h5>GIÁ KHÁM: 150.000đ <a href="/detail-doctor/{{$doctor->doctorId}}">Xem chi tiết</a></h5>
        </div>
    </div>

    @endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lấy ngày hôm nay theo định dạng YYYY-MM-DD
    let today = new Date().toISOString().split('T')[0];

    // Gán giá trị ngày hôm nay vào input #booking-date
    document.getElementById('booking-date').value = today;

    // Gọi hàm lọc lịch khám
    filterSchedules(today);
});

// Lắng nghe sự kiện thay đổi ngày
document.getElementById('booking-date').addEventListener('change', function() {
    let selectedDate = this.value; // Lấy ngày được chọn
    filterSchedules(selectedDate); // Gọi hàm lọc lịch khám
});

// Hàm lọc lịch khám
function filterSchedules(selectedDate) {
    document.querySelectorAll('.date').forEach(button => {
        let buttonDate = button.getAttribute('data-date').split(' ')[0]; // Lấy phần ngày (YYYY-MM-DD)
        if (selectedDate === buttonDate) {
            button.style.display = 'inline-block'; // Hiển thị nếu ngày trùng
        } else {
            button.style.display = 'none'; // Ẩn nếu ngày không trùng
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    flatpickr("#booking-date", {
        dateFormat: "Y-m-d", // Định dạng ngày (ví dụ: 2025-01-15)
        minDate: "today", // Chỉ cho phép chọn ngày từ hôm nay trở đi
        time_24hr: true, // Sử dụng định dạng 24 giờ
    });
});
</script>

@endsection