@extends('clients.layouts.master')
@section('title')
<title>Klinik - Clinic Website </title>
@endsection
@section('content')
<!-- Header Start -->
<div class="container-fluid header bg-primary p-0 mb-5">
    <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
            <h1 class="display-4 text-white mb-5">Sức Khoẻ Tốt Là Nền Tảng Của Mọi Hạnh Phúc</h1>
            <div class="row g-4">
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">123</h2>
                        <p class="text-light mb-0">Bác Sĩ Chuyên Môn</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">1234</h2>
                        <p class="text-light mb-0">Chất Liệu Y Tế</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">12345</h2>
                        <p class="text-light mb-0">Tổng Số Bệnh Nhân</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('/fontend/img/carousel-1.jpg') }}" alt="">
                    <div class="owl-carousel-text">
                        <h1 class="display-1 text-white mb-0">Tim mạch</h1>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('/fontend/img/carousel-2.jpg') }}" alt="">
                    <div class="owl-carousel-text">
                        <h1 class="display-1 text-white mb-0">Thần kinh</h1>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('/fontend/img/carousel-3.jpg') }}" alt="">
                    <div class="owl-carousel-text">
                        <h1 class="display-1 text-white mb-0">Phổi</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid rounded w-75 align-self-end" src="{{ asset('/fontend/img/carousel-1.jpg') }}"
                        alt="">
                    <img class="img-fluid rounded w-50 bg-white pt-3 pe-3"
                        src="{{ asset('/fontend/img/carousel-2.jpg') }}" alt="" style="margin-top: -25%;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="d-inline-block border rounded-pill py-1 px-4">Về Chúng Tôi</p>
                <h1 class="mb-4">Tại Sao Bạn Nên Tin Tưởng Chúng Tôi? Tìm Hiểu Về Chúng Tôi Ngay!</h1>
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


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Dịch vụ</p>
            <h1>Danh Sách Chuyên Khoa</h1>
        </div>
        <div class="row g-4">
            @foreach($specialties as $specialty)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-light rounded h-100 p-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                        style="width: 65px; height: 65px;">
                        <i class="fa fa-heartbeat text-primary fs-4"></i>
                    </div>
                    <h4 class="mb-3">{{$specialty->name}}</h4>
                    <p class="mb-4">{{mb_substr($specialty['description'], 0, 150)}}</p>
                    <a class="btn" href="/detail-specialty/{{$specialty->id}}"><i
                            class="fa fa-plus text-primary me-3"></i>Xem Thêm</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
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
            <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
            <h1>Danh sách bác sĩ</h1>
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
                                href="/detail-doctor/{{$doctor['doctorId']}}">{{$doctor->user['lastName']}}
                                {{$doctor->user['firstName']}} Doctor</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Đánh Giá</p>
            <h1>Khách Hàng Nói Gì Về Chúng Tôi?</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4"
                    src="{{ asset('/fontend/img/testimonial-1.jpg')}}" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Dịch vụ ở đây thực sự tuyệt vời! Đội ngũ bác sĩ tận tâm, cơ sở vật chất hiện đại giúp tôi cảm thấy yên tâm trong quá trình điều trị.</p>
                    <h5 class="mb-1">Trần Thị A</h5>
                    <span class="fst-italic">Doanh Nhân</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4"
                    src="{{ asset('/fontend/img/testimonial-2.jpg')}}" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Tôi rất hài lòng với dịch vụ chăm sóc sức khỏe tại đây. Bác sĩ tư vấn tận tình, thái độ phục vụ chuyên nghiệp và chu đáo.</p>
                    <h5 class="mb-1">Nguyễn Văn B</h5>
                    <span class="fst-italic">Nhân Viên Văn Phòng</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4"
                    src="{{ asset('/fontend/img/testimonial-3.jpg')}}" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Một địa chỉ đáng tin cậy để khám chữa bệnh. Tôi đã có trải nghiệm tốt và sẽ giới thiệu cho bạn bè, người thân.</p>
                    <h5 class="mb-1">Lê Văn C</h5>
                    <span class="fst-italic">Kỹ Sư</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial End -->
@endsection