<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Địa Chỉ</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Đường 123, TP. Hồ Chí Minh, Việt Nam</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+84 123 456 789</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@website.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social rounded-circle" href=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social rounded-circle" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social rounded-circle" href=""><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social rounded-circle" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Chuyên khoa</h5>
                @foreach($specialtiess as $specialty)
                <a class="btn btn-link" href="">{{$specialty->name}}</a>
                @endforeach
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Liên Kết Nhanh</h5>
                <a class="btn btn-link" href="/about">Về Chúng Tôi</a>
                <a class="btn btn-link" href="/testimonial">Đánh giá</a>
                <a class="btn btn-link" href="/service">Dịch Vụ</a>
                <a class="btn btn-link" href="/news">Tin Tức</a>
                <a class="btn btn-link" href="/contact">Liên Hệ</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Bản Tin</h5>
                <p>Đăng ký nhận thông tin mới nhất về dịch vụ và chương trình ưu đãi của chúng tôi.</p>
            </div>
        </div>
    </div>

</div>
<!-- Footer End -->
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>