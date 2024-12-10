@extends('admin.layouts.master')
@section('title')
<title>List Doctors</title>
@endsection
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
                <h4 class="page-title">Doctors</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <a href="{{ URL::to('/doctors/create-doctor') }}">
                                <button type="button" class="btn btn-success margin-5 text-white" data-toggle="modal"
                                    data-target="#Modal1">
                                    Create New
                                </button>
                            </a>
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
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">List Doctors</h4>
                    </div>
                    <div class="comment-widgets scrollable">
                        <!-- Comment Row -->
                        @foreach($doctors as $doctor)
                        <div class="d-flex flex-row comment-row mt-0">
                            <div class="p-2">
                            <img src="{{ asset('storage/' . $doctor->image) }}" alt="$doctor->image"
                            width="50" class="rounded-circle" />
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">{{$doctor->user['lastName']}} {{$doctor->user['firstName']}}</h6>
                                <span class="mb-3 d-block">{{$doctor['note']}}
                                </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-end">{{$doctor['create_at']}}</span>
                                    <a href="{{ URL::to('/doctors/edit-doctor/'. $doctor->doctorId) }}">
                                        <button type="button" class="btn btn-cyan btn-sm text-white">
                                            Edit
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm text-white">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Comment Row -->
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    @endsection