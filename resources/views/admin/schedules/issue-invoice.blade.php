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
    <form id="create-schedule-form" role="form" action='sendEmailToPatient' method='POST'>
        @csrf
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-6 bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin cá nhân</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-5 text-end control-label col-form-label">Họ và tên bệnh
                                    nhân: </label>
                                <div class="col-sm-7">
                                    <input type="hidden" class="form-control" name="patientId"
                                        value="{{$patient['patientId']}}" />
                                    <input type="hidden" class="form-control" name="doctorId"
                                        value="{{$patient['doctorId']}}" />
                                        <input type="text" class="form-control" name="time"
                                        value="{{$patient['time']}}" />
                                    <input type="text" class="form-control" id="fname" readonly name="fullName"
                                        value="{{$patient['fullName']}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-5 text-end control-label col-form-label">Email bệnh
                                    nhân: </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="email" readonly name="email"
                                        value="{{$patient['email']}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-5 text-end control-label col-form-label">Địa chỉ:
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="address" readonly name="address"
                                        value="{{$patient['address']}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-5 text-end control-label col-form-label">Giới tính:
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="gender" readonly name="gender"
                                        value="{{$patient['sex']}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-5 text-end control-label col-form-label">Số điện thoại:
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="phoneNumber" readonly name="phoneNumber"
                                        value="{{$patient['phoneNumber']}}" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lý do khám bệnh</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Lý do:
                                </label>
                                <div class="col-sm-9">
                                    <textarea contenteditable="true" style="
                                    width: 100%;
                                    height: 100px"
                                    name="note" id="note" readonly>{{$patient['reason']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Kết quả sau khám:
                                </label>
                                <div class="col-sm-9">
                                    <textarea contenteditable="true" style="
                                    width: 100%;
                                    height: 100px"
                                    name="result" id="result"></textarea>
                                </div>
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
                <button type="submit" class="btn btn-primary" id="btn-create">
                    Xuất hoá đơn
                </button>
            </div>
        </div>
    </form>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    @endsection