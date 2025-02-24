
    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Đường 123, Thành Phố Hồ Chí Minh, Việt Nam</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Thứ 2 - Thứ 6 : 08.00 AM - 08.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+012 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Klinik</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Trang chủ</a>
        <a href="/about" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">Về chúng tôi</a>
        <a href="/service" class="nav-item nav-link {{ Request::is('service') ? 'active' : '' }}">Dịch vụ</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Trang khác</a>
            <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                <a href="/team" class="dropdown-item {{ Request::is('team') ? 'active' : '' }}">Đội ngũ bác sĩ</a>
                <a href="/testimonial" class="dropdown-item {{ Request::is('testimonial') ? 'active' : '' }}">Đánh giá</a>
                <a href="/404" class="dropdown-item {{ Request::is('404') ? 'active' : '' }}">Lỗi 404</a>
            </div>
        </div>
        <a href="/news" class="nav-item nav-link {{ Request::is('posts') ? 'active' : '' }}">Tin tức</a>
        <a href="/contact" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Liên hệ</a>
    </div>
    <!-- <a href="/appointment" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Appointment<i class="fa fa-arrow-right ms-3"></i></a> -->
</div>

    </nav>
    <!-- Navbar End -->


