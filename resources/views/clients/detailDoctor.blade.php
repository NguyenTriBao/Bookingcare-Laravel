@extends('clients.layouts.master')
@section('title')
    <title>Detail-Doctor</title>
@endsection
@section('content')
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
                <h1>Detail Doctor</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid img-fixed" src="{{ asset('storage/' . $doctor->image) }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>{{$doctor->user['lastName']}} {{$doctor->user['firstName']}} Doctor</h5>
                            <p class="text-primary">Department</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 wow fadeInUp py-3" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class=" bg-light text-center ">
                            {{$doctor->note}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="description-Doctor border-top border-dark my-4 wow fadeInUp " data-wow-delay="0.5s">
            <h2>Lịch khám</h2>
            <div class="time-slots">
                <button>09:00 - 09:30</button>
                <button>09:30 - 10:00</button>
                <button>10:00 - 10:30</button>
                <button>10:30 - 11:00</button>
                <button>09:00 - 09:30</button>
                <button>09:30 - 10:00</button>
                <button>10:00 - 10:30</button>
                <button>10:30 - 11:00</button>
                <button>09:00 - 09:30</button>
                <button>09:30 - 10:00</button>
                <button>10:00 - 10:30</button>
                <button>10:30 - 11:00</button>
                <button>09:00 - 09:30</button>
                <button>09:30 - 10:00</button>
                <button>10:00 - 10:30</button>
                <button>10:30 - 11:00</button>
                <button>09:00 - 09:30</button>
                <button>09:30 - 10:00</button>
                <button>10:00 - 10:30</button>
                <button>10:30 - 11:00</button>

            </div>
            <p class="fee-note">Chọn và đặt (Phí đặt lịch 0đ)</p>
            <h5>GIÁ KHÁM: 500.000đ</h5>
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection