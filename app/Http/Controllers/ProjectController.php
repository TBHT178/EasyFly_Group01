<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        $airports = DB::table('airport')->get();
        return view('index',['airports' => $airports]);
    }

    public function login(){
        return view('login');
    }

    public function contact(){
        return view('contacts');
    }

    public function about(){
        return view('about-us');
    }
}
