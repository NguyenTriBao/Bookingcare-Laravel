@extends('clients.layouts.master')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="specialty-name">
            {{$specialty['image']}}
            <h1>{{$specialty['name']}}</h1>
        </div>
        <div class="specialty-content">
            {{ $specialty['description']}}
        </div>

    </div>
</div>

@endsection