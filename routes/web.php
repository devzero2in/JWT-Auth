<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//api routes
Route::post('/register', [UserRegisterController::class, 'register']);
Route::post('/login', [UserLoginController::class, 'login']);
Route::post('/logout', [UserLoginController::class, 'logout'])->middleware('TokenVerifyMiddleware')->name('logout');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOTP']);
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOTP']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->middleware('TokenVerifyMiddleware');
Route::put('/update-profile', [ProfileController::class, 'userProfileUpadate'])->middleware('TokenVerifyMiddleware');
Route::put('/update-password', [ProfileController::class, 'userChangePassword'])->middleware('TokenVerifyMiddleware');


//web routes
// Guest routes (redirect to dashboard if authenticated)
Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::get('/forgot-password', [HomeController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('/verify-otp', [HomeController::class, 'verifyOTP'])->name('verify-otp');
});

Route::get('/reset-password', [HomeController::class, 'resetPassword'])->middleware('TokenVerifyMiddleware')->name('reset-password');

//Authenticated routes
Route::middleware('TokenVerifyMiddleware')->group(function () {
    //Get User Details
    Route::get('/user-details', [HomeController::class, 'userDetails'])->name('user-details');

    // Role = User routes
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard')->middleware('role:user');
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile')->middleware('role:user');


    // Role = Admin routes
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('role:admin');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile')->middleware('role:admin');
});
