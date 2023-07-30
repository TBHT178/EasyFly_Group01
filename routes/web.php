<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminController;

Route::get('/flights', [ProjectController::class, 'todayflights']) ->name('todayflights');
Route::get('/', [ProjectController::class, 'index']) ->name('index');
Route::get('/about', [ProjectController::class, 'about']) ->name('about');
Route::get('/contact', [ProjectController::class, 'contact']) ->name('contact');
Route::get('/blog-details', [ProjectController::class, 'blogdetails']) ->name('blog-details');
Route::get('/blog', [ProjectController::class, 'blog']) ->name('blog');
Route::get('/login', [ProjectController::class, 'login']) ->name('login');
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
Route::get('/admin',[AdminController::class,'dashboard'])->name('dashboard');
#Admin

Route::prefix('/admin/airport')->group(function(){
    #airport
    Route::get('/',[AdminController::class,'sanbay'])->name('sanbay');
    Route::post('/search',[AdminController::class,'searchairport'])->name('searchairport');
    #them
    Route::get('/add',[AdminController::class,'sb_add']) ->name('sb_add');
    Route::post('/addprocess',[AdminController::class,'sb_addprocess']) ->name('sb_addprocess');
    #update
    Route::get('/update/{code}',[AdminController::class,'sb_update'])->name('sb_update');
    Route::post('/updateprocess/{code}',[AdminController::class,'sb_updateprocess'])->name('sb_updateprocess');
    #delete
    Route::get('/delete/{code}',[AdminController::class,'sb_delete'])->name('sb_delete');
});

Route::prefix('/admin/flight')->group(function(){
    #flight
    Route::get('/',[AdminController::class,'flight'])->name('flight');
    Route::post('/search',[AdminController::class,'searchflight'])->name('searchflight');
    #them
    Route::get('/add',[AdminController::class,'flight_add']) ->name('flight_add');
    Route::post('/addprocess',[AdminController::class,'flight_addprocess']) ->name('flight_addprocess');
    #update
    Route::get('/update/{code}',[AdminController::class,'flight_update'])->name('flight_update');
    Route::post('/updateprocess/{code}',[AdminController::class,'flight_updateprocess'])->name('flight_updateprocess');
    #delete
    Route::get('/delete/{code}',[AdminController::class,'flight_delete'])->name('flight_delete');
});

Route::prefix('/admin/feedback')->group(function(){
    #flight
    Route::get('/',[AdminController::class,'feedback'])->name('feedback');
    Route::post('/search',[AdminController::class,'searchfeedback'])->name('searchfeedback');
    #them
    Route::get('/add',[AdminController::class,'feedback_add']) ->name('feedback_add');
    Route::post('/addprocess',[AdminController::class,'feedback_addprocess']) ->name('feedback_addprocess');
    #update
    Route::get('/update/{code}',[AdminController::class,'feedback_update'])->name('feedback_update');
    Route::post('/updateprocess/{code}',[AdminController::class,'feedback_updateprocess'])->name('feedback_updateprocess');
    #delete
    Route::get('/delete/{code}',[AdminController::class,'feedback_delete'])->name('feedback_delete');
});