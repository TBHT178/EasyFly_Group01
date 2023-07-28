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
    // kh_add
    public function kh_addprocess(Request $request)
    {
        $code = $request->input('code');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        DB::table('customer')->insert([
            'code' => $code,
            'name' => $name,
            'phone' => $phone,
            'email' => $email
        ]);
        return redirect()->route('khachhang');
    }
    // kh_update
    // public function kh_update($code)
    // {
    //     $khachhang = DB::table('customer')->where('customer_id', $code)->first();
    //     return view('admin.kh_update', ['khachhang' => $khachhang]);
    // }
    public function kh_update($code)
    {
        $khachhang = DB::table('customer')->where('customer_id', $code)->first();
        return view('admin.kh_update', ['rs' => $khachhang]); // Here, we're passing the $khachhang as $rs to the view
    }
    public function kh_updateprocess(Request $request, $code)
    {
        $name = $request->input('firstname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        DB::table('customer')->where('customer_id', $code)->update([
            'firstname' => $name,
            'phone' => $phone,
            'email' => $email
        ]);
        return redirect()->route('khachhang');
    }
    // kh_delete
    public function kh_delete($code)
    {
        DB::table('customer')->where('customer_id', $code)->delete();
        return redirect()->route('khachhang');
    }
}
