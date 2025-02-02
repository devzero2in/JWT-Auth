<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\UserLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserRegisterController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::post('/register', [UserRegisterController::class, 'register']);
// Route::post('/login', [UserLoginController::class, 'login']);
// Route::post('/logout', [UserLoginController::class, 'logout'])->middleware('TokenVerifyMiddleware')->name('logout');
// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOTP']);
// Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOTP']);
// Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->middleware('TokenVerifyMiddleware');