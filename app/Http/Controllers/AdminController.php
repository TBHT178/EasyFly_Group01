<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function dashboard()
    {
        return view('admin.dashboard');
    }
    // khachhang
    public function khachhang()
    {
        $khachhang = DB::table('customer')->get();
        return view('admin.khachhang', ['khachhang' => $khachhang]);
    }
    public function kh_add()
    {
        return view('admin.kh_add');
    }
}
