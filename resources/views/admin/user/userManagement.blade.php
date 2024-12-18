@extends('admin.layouts.master')
@section('title')
<title>Specialties Management</title>
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
                <h4 class="page-title">Users</h4>
                
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
                        <h4 class="card-title mb-0">List Users</h4>
                    </div>
                    <div class="comment-widgets scrollable">
                        <!-- Comment Row -->
                        @foreach($users as $user)
                        <div class="d-flex flex-row comment-row mt-0">
                            <div class="p-2">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">{{$user['email']}}</h6>
                                <span class="mb-3 d-block">{{$user['lastName']}} {{$user['firstName']}}
                                </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-end">{{$user['create_at']}}</span>
                                    <a href="#">
                                        <button type="button" class="btn btn-cyan btn-sm text-white">
                                            Edit
                                        </button>
                                    </a>
                                    <a href="#" data-id="{{$user['id']}}" onclick="deleteUser(this)">
                                        <button type="button" class="btn btn-danger btn-sm text-white">
                                            Delete
                                        </button>
                                    </a>
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


    <script>
    function deleteUser(element) {
        let id = element.getAttribute('data-id'); // Lấy giá trị từ thuộc tính data-id;
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: '/users/delete-user/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Nếu muốn xóa ngay khỏi giao diện mà không reload:
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error deleting User');
                }
            });
        } else {
            // If user cancels the action
            alert('Delete action has been canceled.');
        }
    }
    </script>
    @endsection