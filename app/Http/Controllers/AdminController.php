<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\Uppercase;
use Carbon\Carbon;

class AdminController extends Controller

{
    public  function dashboard()
    {
        return view('admin.dashboard');
    }

    ////////////////////// AIRPORT //////////////////////////////
    public function sanbay()
    {
        $sanbay = DB::table('airport')->paginate(7);
        return view('admin.sanbay', ['sanbay' => $sanbay]);
    }

    public function searchairport(Request $request)
    {
        $sanbay = DB::table('airport')->where('airport_code', 'like', '%' . $request->get('searchQuest') . '%')
            ->orWhere('airport_name', 'like', '%' . $request->get('searchQuest') . '%')
            ->orWhere('city', 'like', '%' . $request->get('searchQuest') . '%')
            ->orWhere('country', 'like', '%' . $request->get('searchQuest') . '%')->get();

        return json_decode($sanbay);
    }

    public function sb_add()
    {
        return view('admin.sanbay_add');
    }

    public function sb_addprocess(Request $request)
    {
        $request->validate([
            'airport_code' =>  ['required', new Uppercase, 'unique:airport'],
            'airport_name' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        DB::table('airport')->updateOrInsert([
            'airport_code' => $request->input('airport_code'),
            'airport_name' => $request->input('airport_name'),
            'city' => $request->input('city'),
            'country' => $request->input('country')
        ]);
        return redirect()->route('sanbay')->with('message', 'Add New Airport Successful!');
    }


    public function sb_update($code)
    {
        $rs = DB::table('airport')
            ->where('airport_code', $code)->first();
        return view('admin.sanbay_update', ['rs' => $rs]);
    }

    public function sb_updateprocess(Request $request, $code)
    {
        $tensanbay =  $request->input('airport_name');
        $thanhpho = $request->input('city');
        $quocgia = $request->input('country');
        $rs = DB::table('airport')->where('airport_code', $code)
            ->update([
                'airport_name' => $tensanbay,
                'city' => $thanhpho,
                'country' => $quocgia
            ]);
        return redirect()->route('sanbay')->with('message', 'Update Airport Successful!');
    }

    public function sb_delete($code)
    {
        $rs = DB::table('airport')->where('airport_code', $code)->delete();
        return redirect()->route('sanbay');
    }

    //////////////////////////////// FLIGHT /////////////////////////////////////////////
    public function flight()
    {
        $flights = DB::table('flight')->paginate(7);
        return view('admin.flight', ['flights' => $flights]);
    }

    public function searchflight(Request $request)
    {       $output='';
        $search = $request->input('search');
        $flights = DB::table('flight')->where('flight_id', 'like', '%' . $search . '%')
        ->orWhere('planecode', 'like', '%' . $search . '%')
        ->orWhere('FromPlace', 'like', '%' . $search . '%')
        ->orWhere('ToPlace', 'like', '%' . $search . '%')
        ->orWhere('departure', 'like', '%' . $search . '%')
        ->orWhere('arrival', 'like', '%' . $search . '%')
        ->orWhere('avail_seat', 'like', '%' . $search . '%')->get();

        foreach( $flights as $flight){
            $output .= 
            '<tr>
            <td>' . $flight->flight_id . '</td>
            <td>' . $flight->planecode . '</td>
            <td>' . $flight->FromPlace . '</td>
            <td>' . $flight->ToPlace . '</td>
            <td>' . date('d-m-Y  h : i A', strtotime($flight->departure)) . '</td>
            <td>' . date('d-m-Y  h : i A', strtotime($flight->arrival)) . '</td>
            <td>' . $flight->avail_seat . '</td>
            <td><a href="/admin/flight/update/'.$flight->flight_id .'"><button class="btn btn-primary">Update</button></a>|<a onclick="confirmation(event)" href="/admin/flight/delete/'.$flight->flight_id .'"><button class="btn btn-danger">Delete</button></a></td>
            </tr>';
        }
        return response($output);
}

    public function flight_add()
    {
        $airports = DB::table('airport')->get();
        $planes = DB::table('plane')->get();
        return view('admin.flight_add', ['airports' => $airports, 'planes' => $planes]);
    }

    public function flight_addprocess(Request $request)
    {
        $maxseat = DB::table('plane')->where('PlaneCode', $request->input('planecode'))->value('Seats');
        $departure = $request->input('departure');
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y  h:i A');
        $date = Carbon::parse($departure)->format('d-m-Y  h:i A');
        $request->validate([
            'planecode' => ['required'],
            'FromPlace' => 'required',
            'ToPlace' => 'required|different:FromPlace',
            'departure' => 'required|after_or_equal:' . $currentTime,
            'arrival' => ['required', 'after:' . $date],
            'avail_seat' => ['required', 'numeric', 'min:1', 'max:' . $maxseat]
        ], [
            'ToPlace.different' => 'Airports can not be the same',
            'planecode.required' => 'Please choose a plane'
        ]);


        DB::table('flight')->insert([
            'planecode' => $request->input('planecode'),
            'FromPlace' => $request->input('FromPlace'),
            'ToPlace' => $request->input('ToPlace'),
            'departure' => $request->input('departure'),
            'arrival' => $request->input('arrival'),
            'avail_seat' => $request->input('avail_seat')
        ]);
        return redirect()->route('flight')->with('message', 'Add New Flight Successful!');
    }

    public function flight_update($code)
    {
        $airports = DB::table('airport')->get();
        $planes = DB::table('plane')->get();
        $flight = DB::table('flight')
            ->where('flight_id', $code)->first();
        return view('admin.flight_update', ['flight' => $flight, 'airports' => $airports, 'planes' => $planes]);
    }

    public function flight_updateprocess(Request $request, $code)
    {
        $maxseat = DB::table('plane')->where('PlaneCode', $request->input('planecode'))->value('Seats');
        $departure = $request->input('departure');
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y  h:i A');
        $date = Carbon::parse($departure)->format('d-m-Y  h:i A');
        $request->validate([
            'ToPlace' => 'different:FromPlace',
            'arrival' => ['required', 'after:' . $date],
            'avail_seat' => ['numeric', 'max:' . $maxseat]
        ], [
            'ToPlace.different' => 'Airports can not be the same',
        ]);

        $rs = DB::table('flight')->where('flight_id', $code)
            ->update([
                'planecode' => $request->input('planecode'),
                'FromPlace' => $request->input('FromPlace'),
                'ToPlace' => $request->input('ToPlace'),
                'departure' => $request->input('departure'),
                'arrival' => $request->input('arrival'),
                'avail_seat' => $request->input('avail_seat')
            ]);
        return redirect()->route('flight')->with('message', 'Update Flight Successful!');
    }

    public function flight_delete(Request $request, $code)
    {
        $rs = DB::table('flight')->where('flight_id', $code)->delete();
        return redirect()->route('flight');
    }

    ////////////////////// FEEDBACK //////////////////////////////
    public function feedback()
    {
        $feedbacks = DB::table('feedback')->paginate(7);
        return view('admin.feedback', ['feedbacks' => $feedbacks]);
    }

    public function searchfeedback(Request $request)
    {       $output='';
            $search = $request->input('search');
            $feedbacks = DB::table('feedback')->where('FeedbackId', 'like', '%' . $search . '%')
            ->orWhere('customer_id', 'like', '%' . $search . '%')
            ->orWhere('Comment', 'like', '%' . $search . '%')
            ->orWhere('FeedbackDate', 'like', '%' . $search . '%')->get();

            foreach( $feedbacks as $feedback){
                $output .= 
                '<tr>
                <td>' . $feedback->FeedbackId . '</td>
                <td>' . $feedback->customer_id . '</td>
                <td>' . $feedback->Comment . '</td>
                <td>' . date('d-m-Y ', strtotime($feedback->FeedbackDate)) . '</td>
                <td><a href="/admin/feedback/update/'.$feedback->FeedbackId .'"><button class="btn btn-primary">Update</button></a>|<a onclick="confirmation(event)" href="/admin/feedback/delete/'.$feedback->FeedbackId .'"><button class="btn btn-danger">Delete</button></a></td>
                </tr>';
            }
            return response($output);
    }


    public function feedback_add()
    {
        return view('admin.feedback_add');
    }

    public function feedback_addprocess(Request $request)
    {
        $max = DB::table('customer')->latest('customer_id')->first();
        $valid = $max->customer_id;
        $request->validate([
            'customer_id' =>  ['required', 'numeric', 'min:1', 'max:' . $valid],
            'Comment' => 'required',
            'FeedbackDate' => 'required',
        ]);

        DB::table('feedback')->updateOrInsert([
            'customer_id' => $request->input('customer_id'),
            'Comment' => $request->input('Comment'),
            'FeedbackDate' => $request->input('FeedbackDate'),
        ]);
        return redirect()->route('feedback')->with('message', 'Add New Feedback Successful!');
    }


    public function feedback_update($code)
    {
        $rs = DB::table('feedback')
            ->where('FeedbackId', $code)->first();
        return view('admin.feedback_update', ['rs' => $rs]);
    }

    public function feedback_updateprocess(Request $request, $code)
    {
        $max = DB::table('customer')->latest('customer_id')->first();
        $valid = $max->customer_id;
        $request->validate([
            'customer_id' =>  ['required', 'numeric', 'min:1', 'max:' . $valid]
        ]);
        $customer_id =  $request->input('customer_id');
        $Comment = $request->input('Comment');
        $FeedbackDate = $request->input('FeedbackDate');
        $rs = DB::table('feedback')->where('FeedbackId', $code)
            ->update([
                'customer_id' => $customer_id,
                'Comment' => $Comment,
                'FeedbackDate' => $FeedbackDate
            ]);
        return redirect()->route('feedback')->with('message', 'Update Feedback Successful!');
    }

    public function feedback_delete($code)
    {
        $rs = DB::table('feedback')->where('FeedbackId', $code)->delete();
        return redirect()->route('feedback');
    }
}
