@extends('clients.layouts.master')
@section('title')
    <title>Team</title>
@endsection
@section('content')
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
                <h1>Our Doctors</h1>
            </div>
            <div class="row g-4">
                @foreach($doctors as $doctor)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                        <img class="img-fluid img-fixed" src="{{ asset('storage/' . $doctor->image) }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5 ><a class="text-dark" href="/detail-doctor/{{$doctor['doctorId']}}">{{$doctor->user['lastName']}} {{$doctor->user['firstName']}} Doctor</a></h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection