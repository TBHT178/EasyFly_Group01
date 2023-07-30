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
    // searchflight
    //     public function searchflight(Request $request)
    //     {       $output='';
    //         $search = $request->input('search');
    //         $flights = DB::table('flight')->where('flight_id', 'like', '%' . $search . '%')
    //         ->orWhere('planecode', 'like', '%' . $search . '%')
    //         ->orWhere('FromPlace', 'like', '%' . $search . '%')
    //         ->orWhere('ToPlace', 'like', '%' . $search . '%')
    //         ->orWhere('departure', 'like', '%' . $search . '%')
    //         ->orWhere('arrival', 'like', '%' . $search . '%')
    //         ->orWhere('avail_seat', 'like', '%' . $search . '%')->get();

    //         foreach( $flights as $flight){
    //             $output .= 
    //             '<tr>
    //             <td>' . $flight->flight_id . '</td>
    //             <td>' . $flight->planecode . '</td>
    //             <td>' . $flight->FromPlace . '</td>
    //             <td>' . $flight->ToPlace . '</td>
    //             <td>' . date('d-m-Y  h : i A', strtotime($flight->departure)) . '</td>
    //             <td>' . date('d-m-Y  h : i A', strtotime($flight->arrival)) . '</td>
    //             <td>' . $flight->avail_seat . '</td>
    //             <td><a href="/admin/flight/update/'.$flight->flight_id .'"><button class="btn btn-primary">Update</button></a>|<a onclick="confirmation(event)" href="/admin/flight/delete/'.$flight->flight_id .'"><button class="btn btn-danger">Delete</button></a></td>
    //             </tr>';
    //         }
    //         return response($output);
    // }
    // searchKh
    public function searchKh(Request $request)
    {
        $output = '';
        $search = $request->input('search');
        $khachhang = DB::table('customer')->where('customer_id', 'like', '%' . $search . '%')
            ->orWhere('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('gender', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->get();
        foreach ($khachhang as $kh) {
            $output .=
                '<tr>
                <td>' . $kh->customer_id . '</td>
                <td>' . $kh->firstname . '</td>
                <td>' . $kh->lastname . '</td>
                <td>' . $kh->gender . '</td>
                <td>' . $kh->email . '</td>
                <td>' . $kh->phone . '</td>
                <td><a href="/admin/khachhang/update/' . $kh->customer_id . '"><button class="btn btn-primary">Update</button></a>|<a onclick="confirmation(event)" href="/admin/khachhang/delete/' . $kh->customer_id . '"><button class="btn btn-danger">Delete</button></a></td>
                </tr>';
        }
        return response($output);
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
    // search khachhang
    public function search(Request $request)
    {
        $search = $request->input('search');
        $khachhang = DB::table('customer')->where('customer_id', 'like', "%$search%")->get();
        return view('admin.khachhang', ['khachhang' => $khachhang]);
    }
}
