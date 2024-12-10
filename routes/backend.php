<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;

Route::get('/admin', function () {
    return view('admin.login');
});
Route::get('/dashboard', function () {
    return view('admin.index');
});
Route::get('/widgets', function () {
    return view('admin.widgets');
});
Route::get('/charts', function () {
    return view('admin.charts');
});
Route::get('/form-wizard', function () {
    return view('admin.form-wizard');
});
Route::get('/form-basic', function () {
    return view('admin.form-basic');
});
Route::get('/pages-invoice', function () {
    return view('admin.pages-invoice');
});
Route::get('pages-calendar', function () {
    return view('admin.pages-calendar');
});

//DOCTORS
Route::prefix('doctors')->group(function (){
    Route::get('/', [DoctorController::class, 'getAllDoctor'])->name('get_all_doctor');
    Route::get('/create-doctor',[DoctorController::class, 'addNewDoctor']);
    Route::post('/create', [DoctorController::class, 'store'])->name('create');
    Route::get('/edit-doctor/{id}',[DoctorController::class,'editDoctor'])->name('edit_doctor');
    Route::put('/update',[DoctorController::class,'update'])->name('update');
});

//SPECIALTIES
Route::prefix('specialties')->group(function () {
    //Get all Specialties
    Route::get('/', [SpecialtyController::class, 'getAllSpecialty'])->name('get_all_specialty');
    Route::get('/edit-specialty/{id}', [SpecialtyController::class, 'editSpecialty'])->name('edit_specialty');
    Route::delete('/delete-specialty/{id}', [SpecialtyController::class, 'delete'])->name('delete');
    Route::get('/add-new-specialty', function () {
        return view('admin.specialty.addSpecialty');
    });
    Route::post('/create', [SpecialtyController::class, 'store'])->name('create');
    Route::put('/update', [SpecialtyController::class, 'update'])->name('update');
});

//USERS
Route::prefix('users')->group(function () {
    //Get all Specialties
    Route::get('/', [UserController::class, 'getAllUsers'])->name('get_all_users');
   
});