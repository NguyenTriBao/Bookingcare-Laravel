@extends('clients.layouts.master')
@section('title')
    <title>Testimanial</title>
@endsection
@section('content')
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