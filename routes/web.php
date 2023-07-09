<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::get('/', [ProjectController::class, 'index']) ->name('index') ;
Route::get('/login', [ProjectController::class, 'login']);
Route::get('/contact', [ProjectController::class, 'contact']);
Route::get('/about', [ProjectController::class, 'about']);

Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::get('login', [LoginController::class, 'login']);
Route::post('login', [LoginController::class, 'store'])->name('login');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('home', [LoginController::class, 'home'])->name('home');

Route::get('forget-password', [ForgotPasswordController::class, 'getEmail'])->name('password.request');
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('password.email');


Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');