@extends('admin.layouts.master')
@section('content')
session_start();
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Schedules for Doctor</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Library
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <form id="create-schedule-form" role="form">
        @csrf
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12 bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Personal Info</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Full
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="doctorId" id="doctorId"
                                        value="{{$doctor->user['id']}}" />
                                    <label id="fname" class="col-sm-3 text-end control-label col-form-label"
                                        name="fname">{{$doctor->user['firstName']}} {{$doctor->user['lastName']}}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appointment_datetime">Chọn ngày giờ khám:</label>
                                <input type="text" id="appointment_datetime" name="appointment_datetime"
                                    placeholder="Chọn ngày giờ" required>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <div class="border-top">
            <div class="card-body text-end">
                <button type="button" class="btn btn-primary" id="btn-create" onclick="createSchedule(this)">
                    Tạo Lịch Khám
                </button>
            </div>
        </div>
    </form>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb container-fluid">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Schedules List</h4>
            </div>
            <div class="list-schedules">
                <?php   $groupedData = []; // Mảng lưu các giá trị đã xuất?>
                @foreach($schedules as $schedule)
                <?php
                    $datetime = explode(' ', $schedule->date);
                    $date = $datetime[0];
                    $time = $datetime[1];
                    if (!isset($groupedData[$date])) {
                        $groupedData[$date] = []; // Tạo mảng mới cho ngày chưa có
                    }
                    $groupedData[$date][] = $time; // Thêm giờ vào ngày tương ứng
                    ?>
                @endforeach

                @foreach($groupedData as $date => $times)
                <?php
                // Định dạng ngày sang d-m-Y
                $formattedDate = DateTime::createFromFormat('Y-m-d', $date)->format('d-m-Y');
                // chuyển định dạng date sang INT
                $today = strtotime(date("Y-m-d"));
                $timestamp = strtotime($formattedDate);
                if($timestamp >= $today){
                    echo "<strong>Ngày: $formattedDate</strong><br>";
                    Giờ:
                    foreach($times as $time){
                        $checked = false;
                        foreach($appointments as $appointment){
                            $dateAppointments = explode(' ', $appointment->time);
                            $appointmentDate = $dateAppointments[0];
                            $appointmentTime = $dateAppointments[1];
                            //echo $date . ' and ' . $appointmentDate;
                            if($date == $dateAppointments[0] && $dateAppointments[1] == $time){
                                $checked = true;
                                $reason = $appointment->note;
                                break;

                            }

                        }
                        if($checked == true){
                            foreach($patients as $patient){
                                if($appointment->patientId == $patient->id){
                                    echo "<button 
                                        data-patientId='$patient->id'
                                        data-doctorId='{$doctor->user['id']}'
                                        data-name='$patient->lastName'
                                        data-email='$patient->email'
                                        data-address='$patient->address'
                                        data-phoneNumber='$patient->phoneNumber'
                                        data-gender='$patient->gender'
                                        data-reason='$reason'
                                        data-date='$appointment' style='background: green;' class='btn-schedule btn-checked'> $time </button>
                                    ";
                                }
                            }
                        }
                        else{
                           echo "<button class='btn-schedule'> $time </button>";
                        }
                    }
                    echo "<br><br>";
                }?>

                @endforeach
            </div>
        </div>
    </div>

    <script>
    function createSchedule(element) {
        let date = $('#appointment_datetime').val();
        let doctorId = $('#doctorId').val();
        let _commentUrl = "/schedules/create";
        if (!date || !doctorId) {
            alert('Vui lòng nhập đầy đủ thông tin!');
            return;
        }
        $.ajax({
            url: _commentUrl,
            method: 'POST',
            data: {
                date: date,
                doctorId: doctorId,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Hiển thị thông báo thành công hoặc cập nhật giao diện
                alert('Tạo lịch khám thành công!');
                location.reload();
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    alert('Lỗi: ' + xhr.responseJSON.error); // Hiển thị lỗi từ $e->getMessage()
                }
                console.error(xhr.responseText);
                alert('Đã xảy ra lỗi khi tạo lịch khám. Vui lòng thử lại.');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#appointment_datetime", {
            enableTime: true, // Bật chọn giờ
            dateFormat: "Y-m-d H:i", // Định dạng ngày giờ
            time_24hr: true, // Định dạng 24 giờ
            minDate: "today", // Chỉ cho phép chọn ngày từ hôm nay
            maxDate: new Date().fp_incr(14), // Giới hạn tối đa 14 ngày
            minuteIncrement: 30 // Chỉ cho phép chọn phút 00 hoặc 30

        });
    });

    document.querySelectorAll('.btn-checked').forEach(button => {
        button.addEventListener('click', () => {
            const time = button.getAttribute('data-date');
            let patientId = button.getAttribute('data-patientId');
            let doctorId = button.getAttribute('data-doctorId');
            let fullName = button.getAttribute('data-name');
            let email = button.getAttribute('data-email');
            let address = button.getAttribute('data-address');
            let phoneNumber = button.getAttribute('data-phoneNumber');
            let gender = button.getAttribute('data-gender');
            let sex;
            switch (gender) {
                case 'M':
                    sex = 'Male';
                    break;
                case 'F':
                    sex = 'Female';
                    break;
                default:
                    sex = 'Other';
                    break;
            }
            let reason = button.getAttribute('data-reason');

            const patientData = {
                time : time,
                patientId: patientId,
                doctorId: doctorId,
                fullName: fullName,
                email: email,
                address: address,
                phoneNumber: phoneNumber,
                sex: sex,
                reason: reason
            };
            Swal.fire({
                title: 'Thông tin bệnh nhân',
                html: `
            <div class="form-container">
                    <div class="form-group">
                        <label for="name">Họ và Tên:</label>
                        <label for="name">${fullName}</label>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <label for="email">${email}</label>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <label for="name">${address}</label>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Số điện thoại:</label>
                        <label for="name">${phoneNumber}</label>
                    </div>
                    <div class="form-group">
                        <label>Giới tính:</label>
                        <label for="name">${sex}</label>
                    </div>
                     <div class="form-group">
                        <label>Lý do khám:</label>
                        <textarea name="reason" id="reason" readonly>${reason}</textarea>
                    </div>
            </div>
            `,
                showCancelButton: true,
                confirmButtonText: 'In hoá đơn',
                cancelButtonText: 'Hủy',
            }).then(result => {
                if (result.isConfirmed) {
                    // Gửi thông tin qua AJAX (nếu cần)
                    fetch('/schedules/storePatient', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify(
                                patientData
                            )
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                window.location.href = '/schedules/issue-invoice';
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
    </script>
    @endsection