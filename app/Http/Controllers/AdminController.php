<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function dashboard() {
        return view('admin.dashboard');
    }

    public function sanbay(){
        $sanbay = DB::table('airport')->get();
        return view('admin.sanbay',['sanbay' => $sanbay]);
    }

    public function sb_add(){
        return view('admin.sanbay_add');
    }

    public function sb_addprocess(Request $request){
        $masanbay = $request ->input('masanbay');
        $tensanbay = $request ->input('tensanbay');
        $thanhpho = $request -> input('thanhpho');
        $quocgia = $request->input('quocgia');
        DB::table('airport')->insert([
            'airport_code'=> $masanbay,
            'airport_name' =>$tensanbay,
            'city'=>$thanhpho,
            'country'=>$quocgia
        ]);
        return redirect() ->route('sanbay');
    }


    public function sb_update($code){
        $rs = DB::table('airport')
        ->where('airport_code',$code) ->first();
        return view('admin.sanbay_update',['rs'=>$rs]);
    }

    public function sb_updateprocess(Request $request, $code){
        $tensanbay =  $request->input('tensanbay');
        $thanhpho = $request->input('thanhpho');
        $quocgia = $request ->input('quocgia');
        $rs = DB::table('airport')->where('airport_code',$code)
            ->update([
                'airport_name'=>$tensanbay,
                'city'=>$thanhpho,
                'country'=>$quocgia
            ]);
        return redirect()->route('sanbay');
    }

    public function sb_delete($code){
        $rs = DB::table('airport')->where('airport_code',$code)->delete();
        return redirect() ->route('sanbay');
    }
}
