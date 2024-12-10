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
                            <img class="img-fluid" src="{{ asset('/fontend/img/team-1.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Doctor Name</h5>
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
                           Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam voluptatum optio quam voluptate culpa quisquam accusantium ullam aspernatur. Voluptatem ex excepturi error distinctio, inventore quasi esse vel! Tempore, aperiam! Iure. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati suscipit corrupti voluptatum commodi eaque vitae ab dolores. Officiis quia sapiente laboriosam nobis, aliquid, eos nesciunt similique, perferendis iure error sed? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero, officiis architecto ipsum, iure perferendis nemo doloribus officia modi sint veritatis qui, blanditiis explicabo ipsa tempora facere recusandae cumque tempore corporis.
                        </div>
                    </div>
                </div>
            </div>
            <div class="description-Doctor border-top border-dark my-4 wow fadeInUp " data-wow-delay="0.5s">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam voluptatum optio quam voluptate culpa quisquam accusantium ullam aspernatur. Voluptatem ex excepturi error distinctio, inventore quasi esse vel! Tempore, aperiam! Iure. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati suscipit corrupti voluptatum commodi eaque vitae ab dolores. Officiis quia sapiente laboriosam nobis, aliquid, eos nesciunt similique, perferendis iure error sed? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero, officiis architecto ipsum, iure perferendis nemo doloribus officia modi sint veritatis qui, blanditiis explicabo ipsa tempora facere recusandae cumque tempore corporis.
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection