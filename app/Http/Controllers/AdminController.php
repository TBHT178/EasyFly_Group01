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

    public function maybay(){
        $maybay = DB::table('maybay')->get();
        return view('admin.maybay',['maybay' => $maybay]);
    }

    public function themmaybay(){
        return view('admin.maybay_them');
    }

    public function themmaybay_process(Request $request) {
        $mamaybay = $request ->input('mamaybay');
        $tenmaybay = $request ->input('tenmaybay');
        $sl_ghe = $request -> input('sl_ghe');
        DB::table('maybay')->insert([
            'mamaybay'=> $mamaybay,
            'tenmaybay' =>$tenmaybay,
            'sl_ghe'=>intval($sl_ghe)
        ]);
        return redirect() ->route('maybay');
    }

    public function maybay_update($code){
        $rs = DB::table('maybay')
        ->where('mamaybay',$code) ->first();
        return view('admin.maybay_update',['rs'=>$rs]);
    }

    public function maybay_update_pro(Request $request, $code){
        $tenmaybay =  $request->input('tenmaybay');
        $sl_ghe = $request->input('sl_ghe');
        $rs = DB::table('maybay')->where('mamaybay',$code)
            ->update([
                'tenmaybay'=>$tenmaybay,
                'sl_ghe'=>$sl_ghe
            ]);
        return redirect()->route('maybay');
    }

    public function maybay_delete($code){
        $rs = DB::table('maybay')->where('mamaybay',$code)->delete();
        return redirect() ->route('maybay');
    }

    public function sanbay(){
        $sanbay = DB::table('sanbay')->get();
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
        DB::table('sanbay')->insert([
            'masanbay'=> $masanbay,
            'tensanbay' =>$tensanbay,
            'thanhpho'=>$thanhpho,
            'quocgia'=>$quocgia
        ]);
        return redirect() ->route('sanbay');
    }


    public function sb_update($code){
        $rs = DB::table('sanbay')
        ->where('masanbay',$code) ->first();
        return view('admin.sanbay_update',['rs'=>$rs]);
    }

    public function sb_updateprocess(Request $request, $code){
        $tensanbay =  $request->input('tensanbay');
        $thanhpho = $request->input('thanhpho');
        $quocgia = $request ->input('quocgia');
        $rs = DB::table('sanbay')->where('masanbay',$code)
            ->update([
                'tensanbay'=>$tensanbay,
                'thanhpho'=>$thanhpho,
                'quocgia'=>$quocgia
            ]);
        return redirect()->route('sanbay');
    }
}
