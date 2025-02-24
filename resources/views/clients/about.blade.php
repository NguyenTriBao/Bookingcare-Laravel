@extends('clients.layouts.master')
@section('title')
<title>About-us</title>
@endsection
@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid rounded w-75 align-self-end" src="{{asset('/fontend/img/about-1.jpg')}}"
                        alt="">
                    <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{asset('/fontend/img/about-2.jpg')}}"
                        alt="" style="margin-top: -25%;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="d-inline-block border rounded-pill py-1 px-4">Về Chúng Tôi</p>
                <h1 class="mb-4">Tại Sao Bạn Nên Tin Tưởng Chúng Tôi?</h1>
                <h1 class="mb-4">Tìm Hiểu Về Chúng Tôi Ngay!</h1>
                <p>Chúng tôi cam kết mang đến dịch vụ y tế chất lượng cao với đội ngũ chuyên gia giàu kinh nghiệm. Sự
                    hài lòng và sức khỏe của bạn là ưu tiên hàng đầu của chúng tôi.</p>
                <p class="mb-4">Với hệ thống trang thiết bị hiện đại và phương pháp điều trị tiên tiến, chúng tôi không
                    ngừng nỗ lực để mang lại sự chăm sóc tốt nhất, giúp bạn an tâm trong mỗi lần thăm khám.</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Dịch vụ chăm sóc sức khỏe chất lượng</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Chỉ có Bác Sĩ Đủ Chuyên Môn</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Các Chuyên Gia Nghiên Cứu Y Khoa</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Feature Start -->
<div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
    <div class="container feature px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="p-lg-5 ps-lg-0">
                    <p class="d-inline-block border rounded-pill text-light py-1 px-4">Đặc trưng</p>
                    <h1 class="text-white mb-4">Tại sao nên chọn chúng tôi</h1>
                    <p class="text-white mb-4 pb-2">Chúng tôi cam kết cung cấp dịch vụ chất lượng cao với đội ngũ chuyên gia tận tâm. Với công nghệ tiên tiến và phương pháp điều trị hiện đại, chúng tôi luôn đặt sức khỏe của bạn lên hàng đầu.</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light"
                                    style="width: 55px; height: 55px;">
                                    <i class="fa fa-user-md text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Kinh nghiệm</p>
                                    <h5 class="text-white mb-0">Bác sĩ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light"
                                    style="width: 55px; height: 55px;">
                                    <i class="fa fa-check text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Chất lượng</p>
                                    <h5 class="text-white mb-0">Dịch vụ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light"
                                    style="width: 55px; height: 55px;">
                                    <i class="fa fa-comment-medical text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Tích cực</p>
                                    <h5 class="text-white mb-0">Tư vấn</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light"
                                    style="width: 55px; height: 55px;">
                                    <i class="fa fa-headphones text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">24 Giờ</p>
                                    <h5 class="text-white mb-0">Hỗ trợ</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('/fontend/img/feature.jpg') }}"
                        style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Bác sĩ</p>
            <h1>Đội Ngũ Y Tế</h1>
        </div>
        <div class="row g-4">
            @foreach($doctors as $doctor)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid img-fixed" src="{{ asset('storage/' . $doctor->image) }}" alt="#">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5><a class="text-dark"
                                href="/detail-doctor/{{$doctor['doctorId']}}">Bác Sĩ {{$doctor->user['firstName']}}
                                {{$doctor->user['lastName']}}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->


@endsection