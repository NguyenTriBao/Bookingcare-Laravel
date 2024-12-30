@extends('clients.layouts.master')
@section('title')
<title>Detail-Doctor</title>
@endsection
@section('content')
<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">News</p>
            <h1>{{$post->title}}</h1>
        </div>
        <div class="description-Doctor border-top border-dark my-4 wow fadeInUp " data-wow-delay="0.5s">
            {!! $content !!}
        </div>
    </div>
</div>
<!-- Team End -->
<div class="news-meta">
    <span class="author">Bởi {{$post->user->firstName}} {{$post->user->lastName}}</span>
    <span class="date">Cập nhật
        {{ $post->updated_at ? $post->updated_at->format('d/m/Y') : 'Không rõ' }}</span>
</div>
@endsection