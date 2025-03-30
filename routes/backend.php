<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HandbookController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatController;
use App\Http\Controller\ChatbotController;

use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\AdminDoctorMiddleware;


Route::get('/admin', function () {
    return view('admin.login');
});
Route::get('/charts', function () {
    return view('admin.charts');
});
Route::get('pages-calendar', function () {
    return view('admin.pages-calendar');
});
Route::get('change-password', function () {
    return view('admin.recover-password');
});
Route::post('change-password', [AdminController::class, 'recoverPassword']);

//TEST MIDDLEWARE
Route::get('/dashboard', [AdminController::class, 'getAllPostAdmin']);

//LOGIN AND LOGOUT
Route::prefix('admin')->group(function (){
    Route::post('/',[AdminController::class, 'login'])->name('login');
    Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    Route::post('/recoverPassword',[AdminController::class, 'recover'])->name('recover');
    Route::post('/change-password',[AdminController::class, 'changePassword'])->name('changePassword');
});

//DOCTORS
Route::prefix('doctors')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/', [DoctorController::class, 'getAllDoctor'])->name('get_all_doctor');
    Route::get('/create-doctor',[DoctorController::class, 'addNewDoctor']);
    Route::post('/create', [DoctorController::class, 'store'])->name('create');
    Route::delete('/delete-doctor/{id}', [DoctorController::class, 'delete'])->name('delete');
});
Route::prefix('doctors')->middleware(['auth', AdminDoctorMiddleware::class])->group(function () {
    Route::get('/edit-doctor/{id}',[DoctorController::class,'editDoctor'])->name('edit_doctor');
    Route::put('/update',[DoctorController::class,'update'])->name('update');
});

//SPECIALTIES
Route::prefix('specialties')->middleware(['auth', AdminMiddleware::class])->group(function () {
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
Route::prefix('posts')->middleware(['auth'])->group(function () {
    // Admin có quyền quản lý toàn bộ bài viết
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/', [HandbookController::class, 'getAllHandbook'])->name('get_all_handbook');
    });

    // Doctor chỉ có thể xem bài viết của họ
    Route::middleware(DoctorMiddleware::class)->group(function () {
        Route::get('/{id}', [HandbookController::class, 'getPostsByAuthor']);
    });

    // Cả Admin và Doctor đều có quyền tạo, sửa, xóa bài viết
    Route::middleware(AdminDoctorMiddleware::class)->group(function () {
        Route::get('/posts/create-post', [HandbookController::class, 'addNewPost'])->name('create_post');
        Route::post('/create', [HandbookController::class, 'store'])->name('create');
        Route::get('/edit-post/{id}', [HandbookController::class, 'editPost'])->name('edit_post');
        Route::put('/update', [HandbookController::class, 'update'])->name('update');
        Route::delete('/delete-post/{id}', [HandbookController::class, 'delete'])->name('delete');
        Route::get('/change-status/{id}',[HandbookController::class, 'changeStatus']);
    });
});



//Schedules
Route::prefix('schedules')->middleware(['auth', AdminMiddleware::class])->group(function (){
    Route::get('/', [ScheduleController::class, 'index'])->name('index');

});
Route::prefix('schedules')->middleware(['auth', AdminDoctorMiddleware::class])->group(function (){
    Route::get('/edit-schedules/{id}',[ScheduleController::class, 'edit'])->name('edit-schedules');
    Route::post('/create',[ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/storePatient', [ScheduleController::class, 'storePatient']);
    Route::get('/issue-invoice', [ScheduleController::class, 'issueInvoice']);
    Route::post('/sendEmailToPatient', [ScheduleController::class, 'sendEmailToPatient']);
    Route::get('/form-issue-invoice', function(){
        return view ('admin.schedules.form-issue-invoice');
    });
});

//Contacts
Route::prefix('contacts')->middleware(['auth', AdminDoctorMiddleware::class])->group(function (){
    Route::get('/',[ContactController::class, 'index']);
   // Route::get('view-contact/{id}',[ContactController::class, 'viewOneContact']);
});

Route::post('send-message', [ChatController::class, 'sendMessage']);
Route::get('get-messages', [ChatController::class, 'getMessages']);

//Chatbot
Route::post('/chatbot',[ChatbotController::class, 'talkToBot']);