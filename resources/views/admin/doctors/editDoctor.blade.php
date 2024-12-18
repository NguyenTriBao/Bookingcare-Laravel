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
                <h4 class="page-title">Create new Doctor</h4>
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
    <form action="/doctors/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-6 bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Personal Info</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">First
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="id"
                                        value="{{$doctor->user['id']}}" />
                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here"
                                        name="fname" value="{{$doctor->user['firstName']}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name Here"
                                        name="lname" value="{{$doctor->user['lastName']}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-end control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email1" placeholder="Email Here"
                                        name="email" value="{{$doctor->user['email']}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                    class="col-sm-3 text-end control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password Here" value="{{$doctor->user['password']}}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Phone
                                    Number
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phoneNumber"
                                        placeholder="PhoneNumber Here" value="{{$doctor->user['phoneNumber']}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1"
                                    class="col-sm-3 text-end control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="address"
                                        name="address">{{$doctor->user['address']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    @foreach($genders as $index => $gender)
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="gender"
                                            value="{{$gender['keyMap']}}" @if($doctor->user['gender'] ==
                                        $gender['keyMap']) checked @endif />
                                        <label class="form-check-label mb-0"
                                            for="customControlValidation1">{{$gender['value']}}</label>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Personal Info</h5>
                            <div class="form-group row">
                                <label class="col-md-3 mt-3">Doctor</label>
                                <div class="col-md-9">
                                    <select name="specialtyId" class="select2 form-select shadow-none"
                                        style="width: 100%; height: 36px">
                                        @foreach($specialties as $specialty)
                                        <option value="{{ $specialty['id'] }}" @if(isset($doctor) &&
                                            $specialty['id']==$doctor['specialtyId']) selected @endif>
                                            {{ $specialty['name'] }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 mt-3">Province</label>
                                <div class="col-md-9">
                                    <select name="province" class="select2 form-select shadow-none"
                                        style="height: 36px; width: 100%">
                                        @foreach($provinces as $province)
                                        <option value="{{ $province['name'] }}"
                                            @if($province['name']==$doctor['province']) selected @endif>
                                            {{ $province['name'] }}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Image</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile"
                                            name="image" onchange="previewImage(event)" />
                                        <img id="preview" src="{{ asset('storage/' . $doctor->image) }}"
                                            alt="{{ $doctor->image }}" width="100" class="rounded-circle mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-md-3 control-label col-form-label">Note</label>
                                <div class="col-md-9">
                                    <textarea id="markdown-editor" name="note"
                                        class="form-control">{{$doctor['note']}}</textarea>
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

    <script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    const easyMDE = new EasyMDE({
        element: document.getElementById('markdown-editor'),
        placeholder: "Viết nội dung Markdown tại đây...",
    });
    </script>
    @endsection