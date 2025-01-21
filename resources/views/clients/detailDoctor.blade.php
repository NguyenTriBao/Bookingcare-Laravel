@extends('clients.layouts.master')
@section('title')
<title>Detail-Doctor</title>
@endsection
@section('content')
<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
            <h1>Detail Doctor</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid img-fixed" src="{{ asset('storage/' . $doctor->image) }}" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>{{$doctor->user['lastName']}} {{$doctor->user['firstName']}} Doctor</h5>
                        <p class="text-primary">Department</p>
                        <div class="team-social text-center">
                            <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6 wow fadeInUp py-3" data-wow-delay="0.3s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class=" bg-light ">
                        {!! $doctor->note !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="description-Doctor border-top border-dark my-4 wow fadeInUp " data-wow-delay="0.5s">
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
            <h5>GIÁ KHÁM: 500.000đ <a href="#">Xem chi tiết</a></h5>
        </div>
        </div>
    </div>
</div>
<!-- Team End -->
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