<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminController;


Route::get('/', [ProjectController::class, 'index'])->name('index');
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
Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
#Admin

// Route::prefix('/admin/airport')->group(function () {
//     #maybay
//     Route::get('/', [AdminController::class, 'sanbay'])->name('sanbay');
//     #them
//     Route::get('/add', [AdminController::class, 'sb_add'])->name('sb_add');
//     Route::post('/addprocess', [AdminController::class, 'sb_addprocess'])->name('sb_addprocess');
//     #update
//     Route::get('/update/{code}', [AdminController::class, 'sb_update'])->name('sb_update');
//     Route::post('/updateprocess/{code}', [AdminController::class, 'sb_updateprocess'])->name('sb_updateprocess');
//     #delete
//     Route::get('/delete/{code}', [AdminController::class, 'sb_delete'])->name('sb_delete');
// });

// khachhang
Route::prefix('/admin/customer')->group(function () {
    #khachhang
    Route::get('/', [AdminController::class, 'khachhang'])->name('khachhang');
    // search
    Route::post('/search', [AdminController::class, 'searchkh'])->name('searchkh');
    #them
    Route::get('/add', [AdminController::class, 'kh_add'])->name('kh_add');
    Route::post('/addprocess', [AdminController::class, 'kh_addprocess'])->name('kh_addprocess');
    #update
    Route::get('/update/{code}', [AdminController::class, 'kh_update'])->name('kh_update');
    Route::post('/updateprocess/{code}', [AdminController::class, 'kh_updateprocess'])->name('kh_updateprocess');
    #delete
    Route::get('/delete/{code}', [AdminController::class, 'kh_delete'])->name('kh_delete');
    #search

});
