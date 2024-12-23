@extends('clients.layouts.master')
@section('title')
<title>Team</title>
@endsection
@section('content')
<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Posts</p>
            <h1>All Posts</h1>
        </div>
        <div class="row g-4 news-container">
            @foreach($posts as $post)
            <div class="news-card">
            <img src="{{ asset('storage/' . $post->image) }}" alt="">
                <h3 class="news-title">{{$post->title}}</h3>
                <p class="news-description">
                    {{$post->description}}
                </p>
                <div class="news-meta">
                    <span class="author">bởi Admin</span>
                    <span class="date">Cập nhật 11-12-2024</span>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
@endsection