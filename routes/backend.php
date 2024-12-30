<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HandbookController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;

Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::get('/widgets', function () {
    return view('admin.widgets');
});
Route::get('/charts', function () {
    return view('admin.charts');
});
Route::get('/pages-invoice', function () {
    return view('admin.pages-invoice');
});
Route::get('pages-calendar', function () {
    return view('admin.pages-calendar');
});

//TEST MIDDLEWARE
Route::get('/dashboard', function () {
    if (Auth::check() && (Auth::user()->roleId === 'R1' || Auth::user()->roleId === 'R2')) {
        return view('admin.index');
    }
    return redirect('/admin')->with('error', 'Access Denied!');
});
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        // Nếu chưa đăng nhập, chuyển hướng về trang /admin
        return redirect('/admin');
    });
});

//LOGIN AND LOGOUT
Route::prefix('admin')->group(function (){
    Route::post('/login',[AdminController::class, 'login'])->name('login');
    Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
});

//DOCTORS
Route::prefix('doctors')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/', [DoctorController::class, 'getAllDoctor'])->name('get_all_doctor');
    Route::get('/create-doctor',[DoctorController::class, 'addNewDoctor']);
    Route::post('/create', [DoctorController::class, 'store'])->name('create');
    Route::get('/edit-doctor/{id}',[DoctorController::class,'editDoctor'])->name('edit_doctor');
    Route::put('/update',[DoctorController::class,'update'])->name('update');
    Route::delete('/delete-doctor/{id}', [DoctorController::class, 'delete'])->name('delete');
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
Route::prefix('users')->middleware(['auth', AdminMiddleware::class])->group(function () {
    //Get all Specialties
    Route::get('/', [UserController::class, 'getAllUsers'])->name('get_all_users');
    Route::delete('/delete-user/{id}', [UserController::class, 'delete'])->name('delete');
});

//POSTS
Route::prefix('posts')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/', [HandbookController::class, 'getAllHandbook'])->name('get_all_handbook');
    Route::get('/create-posts',[HandbookController::class, 'addNewPost']);
    Route::post('/create', [HandbookController::class, 'store'])->name('create');
    Route::get('/edit-post/{id}',[HandbookController::class,'editPost'])->name('edit_post');
    Route::put('/update',[HandbookController::class,'update'])->name('update');
    Route::delete('/delete-post/{id}', [HandbookController::class, 'delete'])->name('delete');
});

//Appointments
Route::prefix('appointments')->midđleware(['auth', AdminMiddleware::class])->group(function (){
    Route::get('/', [ScheduleController::class, 'index'])->name('index');
});