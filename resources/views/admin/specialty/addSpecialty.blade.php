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
                <h4 class="page-title">Create New Specialty</h4>
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
    <form action="/specialties/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-6 bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Specialty</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here"
                                        name="name" />
                                </div>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="cono1"
                                    class="col-sm-3 text-end control-label col-form-label">Description</label>

                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="form-group row">
                                <label class="col-md-3">Image</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile"
                                            name="image" />
                                    </div>
                                </div>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


    @endsection