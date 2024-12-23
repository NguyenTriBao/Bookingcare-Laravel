<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HandbookController;

Route::get('/',[HomeController::class, 'show']);
Route::get('/service', function () {
    return view('clients.service');
});
Route::get('/contact', function () {
    return view('clients.contact');
});
Route::get('/appointment', function () {
    return view('clients.appointment');
});
Route::get('/feature', function () {
    return view('clients.feature');
});
Route::get('/team', function () {
    return view('clients.team');
});
Route::get('/testimonial', function () {
    return view('clients.testimonial');
});
Route::get('/404', function () {
    return view('clients.404');
});

//Specialty
Route::get('/detail-specialty/{id}',[SpecialtyController::class, 'detail'])->name('detail_specialty');

//Doctor
Route::get('/detail-doctor/{id}', [DoctorController::class, 'detail'])->name('detail_doctor');
Route::get('/team',[DoctorController::class, 'getAllDoctorClients']);

//About
Route::get('/about',[DoctorController::class,'getAllDOctorAbout']);

//News
Route::get('/news',[HandbookController::class, 'getallPosts']);