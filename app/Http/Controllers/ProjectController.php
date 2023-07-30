<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
    public function blogdetails(){
        return view('blog-details');
    }
    public function blog(){
        return view('blog');
    }
    public function register(){
        return view('auth.regsiter');
    }
    public function signin(){
        return view('login');
    }
    public function todayflights(){
        return view('booking-list');
    }
}
