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
                <h4 class="page-title">Create new Post</h4>
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
    <form action="/posts/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12 bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Information Post</h5>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 control-label col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here"
                                        name="title" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Image</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile"
                                    name="image" onchange="previewImage(event)" />
                                        <img id="preview" src=""
                                            alt="" width="100" height="100" class="rounded-circle mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-md-3 control-label col-form-label">Content
                                    (Markdown):</label>
                                <div class="col-md-12">
                                    <textarea id="markdown-editor" name="content" class="form-control"></textarea>
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
        autosave: {
            enabled: true,
            uniqueId: "markdown_editor"
        },
    });
    </script>
    @endsection