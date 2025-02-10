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
                        <h5 id="doctor" data-id="{{$doctor->user->id}}">
                            {{$doctor->user['lastName']}} {{$doctor->user['firstName']}} Doctor
                        </h5>
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
                    <button class="date btn-schedule"
                        data-date="{{ $schedule->date }}"><?php print_r (explode(" ",$schedule->date)[1]);?></button>
                    @endforeach
                </div>
                <h5>GIÁ KHÁM: 150.000 đồng</h5>
                <h5>ĐỊA CHỈ KHÁM</h5>
                <p>Phòng khám Spinetech Clinic</p>
                <p>Tòa nhà GP, 257 Giải Phóng, Phương Mai, Đống Đa, Hà Nội</p>

            </div>
        </div>
    </div>
</div>
<!-- Team End -->







<script>
// Lấy thời gian từ nút và hiển thị form khi nhấn
document.querySelectorAll('.btn-schedule').forEach(button => {
    button.addEventListener('click', () => {
        const time = button.getAttribute('data-date');
        const doctorId = document.getElementById('doctor').getAttribute('data-id');
        Swal.fire({
            title: 'Đặt lịch khám',
            html: `
            <div class="form-container">
                <h4>Thời gian: ${time} </h4>
                <h2>Thông Tin Bệnh Nhân</h2>
                    <div class="form-group">
                        <label for="name">Họ và Tên:</label>
                        <input type="text" id="name" name="name" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Nhập email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" id="address" name="address" placeholder="Nhập địa chỉ" required>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Số điện thoại:</label>
                        <input type="tel" id="phonenumber" name="phonenumber" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <label>Giới tính:</label>
                        <div class="gender-options">
                            <label><input type="radio" name="gender" value="M" required> Nam</label>
                            <label><input type="radio" name="gender" value="F"> Nữ</label>
                            <label><input type="radio" name="gender" value="O"> Khác</label>
                        </div>
                    </div>
                     <div class="form-group">
                        <label>Lý do khám:</label>
                        <textarea name="reason" id="reason"></textarea>
                    </div>
            </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy',
            preConfirm: () => {
                let name = document.getElementById('name').value.trim();
                let email = document.getElementById('email').value.trim();
                let address = document.getElementById('address').value.trim();
                let phonenumber = document.getElementById('phonenumber').value.trim();
                let reason = document.getElementById('reason').value.trim();
                let gender = document.querySelector('input[name="gender"]:checked')?.value;
                if (!name || !email || !address || !phonenumber || !reason || !gender) {
                    Swal.showValidationMessage('Vui lòng điền đầy đủ thông tin!');
                }
                return {
                    time,
                    name,
                    email,
                    address,
                    phonenumber,
                    gender,
                    reason,
                    doctorId
                };
            }
        }).then(result => {
            if (result.isConfirmed) {
                const {
                    time,
                    name,
                    email,
                    address,
                    phonenumber,
                    gender,
                    reason,
                    doctorId
                } = result.value;
                // Gửi thông tin qua AJAX (nếu cần)
                fetch('/bookingschedule', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            time,
                            name,
                            email,
                            address,
                            phonenumber,
                            gender,
                            reason,
                            doctorId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Thành công', 'Lịch hẹn đã được đặt!', 'success');
                            const selectedButton = document.querySelector(
                                `.btn-schedule[data-date="${time}"]`);
                            if (selectedButton) {
                                selectedButton.style.display = "none"; // Ẩn nút
                            }

                        } else {
                            Swal.fire('Lỗi', data.error || 'Có lỗi xảy ra.', 'error');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Lỗi', 'Không thể kết nối tới server.', 'error');
                    });
            }
        });
    });
});



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