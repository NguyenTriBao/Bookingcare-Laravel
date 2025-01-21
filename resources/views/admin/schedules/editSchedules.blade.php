@extends('admin.layouts.master')
@section('content')
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
                $today = date("Y-m-d");
                if($formattedDate > $today){
                    echo "<strong>Ngày: $formattedDate</strong><br>";
                    Giờ:
                    foreach($times as $time){
                    echo "<button class='btn-schedule'> $time </button>  <br><br>";
                    }
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
    </script>
    @endsection