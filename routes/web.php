<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;


Route::group([], function () {
    require __DIR__ . '/frontend.php';
    require __DIR__ . '/backend.php';
});


// Định nghĩa route để Laravel hỗ trợ WebSockets
Broadcast::routes(["middleware" => ["auth:sanctum"]]);

// Định nghĩa channel "group-chat"
Broadcast::channel('group-chat', function ($user) {
    return $user; // Cho phép tất cả người dùng đăng nhập tham gia
});