<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

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
        return redirect()->route('sanbay')->with('message', 'Delete Airport Successful!');
    }

    //////////////////////////////// FLIGHT /////////////////////////////////////////////
    public function flight()
    {
        $flights = DB::table('flight')->orderByDesc('flight_id')->paginate(7);
        return view('admin.flight', ['flights' => $flights]);
    }

    public function searchflight(Request $request)
    {
        $output = '';
        $search = $request->input('search');
        $flights = DB::table('flight')->where('flight_id', 'like', '%' . $search . '%')
            ->orWhere('planecode', 'like', '%' . $search . '%')
            ->orWhere('FromPlace', 'like', '%' . $search . '%')
            ->orWhere('ToPlace', 'like', '%' . $search . '%')
            ->orWhere('departure', 'like', '%' . $search . '%')
            ->orWhere('arrival', 'like', '%' . $search . '%')
            ->orWhere('avail_seat', 'like', '%' . $search . '%')->orderByDesc('flight_id')->get();

        foreach ($flights as $flight) {
            $output .=
                '<tr>
            <td>' . $flight->flight_id . '</td>
            <td>' . $flight->planecode . '</td>
            <td>' . $flight->FromPlace . '</td>
            <td>' . $flight->ToPlace . '</td>
            <td>' . $flight->departure . '</td>
            <td>' . $flight->arrival . '</td>
            <td>' . $flight->avail_seat . '</td>
            <td><a href="/admin/flight/update/' . $flight->flight_id . '"><button class="btn btn-primary">Update</button></a>|<a onclick="confirmation(event)" href="/admin/flight/delete/' . $flight->flight_id . '"><button class="btn btn-danger">Delete</button></a></td>
            </tr>';
        }
        return response($output);
        // $flights = DB::table('flight')->where('flight_id', 'like', '%' .  $request->get('searchQuest1') . '%')
        //     ->orWhere('planecode', 'like', '%' .  $request->get('searchQuest1') . '%')
        //     ->orWhere('FromPlace', 'like', '%' .  $request->get('searchQuest1') . '%')
        //     ->orWhere('ToPlace', 'like', '%' .  $request->get('searchQuest1') . '%')
        //     ->orWhere('departure', 'like', '%' .  $request->get('searchQuest1') . '%')
        //     ->orWhere('arrival', 'like', '%' .  $request->get('searchQuest1') . '%')
        //     ->orWhere('avail_seat', 'like', '%' .  $request->get('searchQuest1') . '%')->get();

        // return json_decode($flights);
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
            // 'avail_seat' => ['required', 'numeric', 'min:1', 'max:' . $maxseat]
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
            'avail_seat' => $maxseat
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
        return redirect()->route('flight')->with('message', 'Delete Successful!');;
    }

    ////////////////////// FEEDBACK //////////////////////////////
    public function feedback()
    {
        $feedbacks = DB::table('feedback')->orderByDesc('FeedbackId')->paginate(7);
        return view('admin.feedback', ['feedbacks' => $feedbacks]);
    }

    public function searchfeedback(Request $request)
    {
        $output = '';
        $search = $request->input('search');
        $feedbacks = DB::table('feedback')->where('FeedbackId', 'like', '%' . $search . '%')
            ->orWhere('customer_id', 'like', '%' . $search . '%')
            ->orWhere('Comment', 'like', '%' . $search . '%')
            ->orWhere('FeedbackDate', 'like', '%' . $search . '%')->get();

        foreach ($feedbacks as $feedback) {
            $output .=
                '<tr>
                <td>' . $feedback->FeedbackId . '</td>
                <td>' . $feedback->customer_id . '</td>
                <td>' . $feedback->Comment . '</td>
                <td>' . date('d-m-Y ', strtotime($feedback->FeedbackDate)) . '</td>
                <td><a href="/admin/feedback/update/' . $feedback->FeedbackId . '"><button class="btn btn-primary">Update</button></a>|<a onclick="confirmation(event)" href="/admin/feedback/delete/' . $feedback->FeedbackId . '"><button class="btn btn-danger">Delete</button></a></td>
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
        return redirect()->route('feedback')->with('message', 'Delete feedback Successful!');;
    }
    //////////////////////////////// SeatClass /////////////////////////////////////////////
    public function seatclass()
    {
        $seatclasses = DB::table('seat_class')->orderByDesc('flight_id')->paginate(7);
        return view('admin.seatclass', ['seatclasses' => $seatclasses]);
    }

    public function searchseatclass(Request $request)
    {
        $output = '';
        $search = $request->input('search');
        $seatclasses = DB::table('seat_class')->where('Flight_id', 'like', '%' . $search . '%')
            ->orWhere('price_class_TG', 'like', '%' . $search . '%')
            ->orWhere('num_class_PT', 'like', '%' . $search . '%')
            ->orWhere('num_class_TG', 'like', '%' . $search . '%')
            ->orWhere('price_class_PT', 'like', '%' . $search . '%')->get();

        foreach ($seatclasses as $seatclass) {
            $output .=
                '<tr>
                <td>' . $seatclass->Flight_id . '</td>
                <td>' . $seatclass->price_class_TG . '</td>
                <td>' . $seatclass->num_class_PT . '</td>
                <td>' . $seatclass->num_class_TG . '</td>
                <td>' . $seatclass->price_class_PT . '</td>
                <td><a href="/admin/seatclass/update/' . $seatclass->Flight_id . '"><button class="btn btn-primary">Update</button></a>|<a onclick="confirmation(event)" href="/admin/seatclass/delete/' . $seatclass->Flight_id . '"><button class="btn btn-danger">Delete</button></a></td>
                </tr>';
        }
        return response($output);
    }
    public function seatclass_add()
    {
        $flights = DB::table('flight')->get();
        return view('admin.seatclass_add', ['flights' => $flights]);
    }

    public function seatclass_addprocess(Request $request)
    {
        $max = DB::table('flight')->latest('flight_id')->first();
        $valid = $max->flight_id;
        $request->validate([
            'Flight_id' => ['required', 'numeric', 'min:1', 'max:' . $valid],
            'price_class_TG' => 'required',
            'num_class_PT' => 'required',
            'num_class_TG' => 'required',
            'price_class_PT' => 'required'
        ]);

        // Get the flight information
        $flight = DB::table('flight')->where('flight_id', $request->input('Flight_id'))->first();

        // Calculate the total number of seats in seat_class
        $totalSeats = $request->input('num_class_PT') + $request->input('num_class_TG');

        // Check if the total number of seats in seat_class exceeds avail_seat of flight
        if ($totalSeats > $flight->avail_seat) {
            return redirect()->back()->withErrors(['num_class_PT' => 'Total seats in seat_class cannot exceed avail_seat of flight']);
        }

        // Insert or update seat_class
        DB::table('seat_class')->insert([
            'Flight_id' => $request->input('Flight_id'),
            'price_class_TG' => $request->input('price_class_TG'),
            'num_class_PT' => $request->input('num_class_PT'),
            'num_class_TG' => $request->input('num_class_TG'),
            'price_class_PT' => $request->input('price_class_PT')
        ]);

        return redirect()->route('seatclass')->with('message', 'Add New Seat Class Successful!');
    }





    // update
    public function seatclass_update($code)
    {
        $rs = DB::table('seat_class')
            ->where('Flight_id', $code)->first();
        return view('admin.seatclass_update', ['rs' => $rs]);
    }
    public function seatclass_updateprocess(Request $request, $code)
    {
        $max = DB::table('flight')->latest('flight_id')->first();
        $valid = $max->flight_id;
        $request->validate([
            // bắt x
            'Flight_id' =>  ['required', 'numeric', 'min:1', 'max:' . $valid]
        ]);
        $Flight_id =  $request->input('Flight_id');
        $price_class_TG = $request->input('price_class_TG');
        $num_class_PT = $request->input('num_class_PT');
        $num_class_TG = $request->input('num_class_TG');
        $price_class_PT = $request->input('price_class_PT');
        $rs = DB::table('seat_class')->where('Flight_id', $code)
            ->update([
                'Flight_id' => $Flight_id,
                'price_class_TG' => $price_class_TG,
                'num_class_PT' => $num_class_PT,
                'num_class_TG' => $num_class_TG,
                'price_class_PT' => $price_class_PT
            ]);
        return redirect()->route('seatclass')->with('message', 'Update Seat Class Successful!');
    }
    // delete
    public function seatclass_delete($code)
    {
        $rs = DB::table('seat_class')->where('Flight_id', $code)->delete();
        return redirect()->route('seatclass')->with('message', 'Delete Seat Class Successful!');
    }
    ////////////////////////////////customer///////////////////////////////////////////// 
    public function customer()
    {
        $customers = DB::table('customer')->orderByDesc('customer_id')->paginate(7);
        return view('admin.customer', ['customers' => $customers]);
    }
    // search
    public function searchcustomer(Request $request)
    {
        $output = '';
        $search = $request->input('search');
        $customers = DB::table('customer')->where('customer_id', 'like', '%' . $search . '%')
            ->orWhere('AccountId', 'like', '%' . $search . '%')
            ->orWhere('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('gender', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')->orderBy('customer_id', 'desc')->get();

        foreach ($customers as $customer) {
            $output .=
                '<tr>
                    <td>' . $customer->customer_id . '</td>
                    <td>' . $customer->AccountId . '</td>
                    <td>' . $customer->firstname . '</td>
                    <td>' . $customer->lastname . '</td>
                    <td>' . $customer->gender . '</td>
                    <td>' . $customer->email . '</td>
                    <td>' . $customer->phone . '</td>
                    <td>
                    <a href="/admin/customer/update/' . $customer->customer_id . '"><button class="btn btn-primary">Update</button></a>
                    <a onclick="confirmation(event)" href="/admin/customer/delete/' . $customer->customer_id . '"><button class="btn btn-danger">Delete</button></a>
                </td>
    
                    </tr>';
        }
        return response($output);
    }

    public function customer_add()
    {
        return view('admin.customer_add');
    }
    public function customer_addprocess(Request $request)
    {
        $request->validate([
            'AccountId' => 'required|numeric|min:1',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required|numeric|min:0|max:1',
            'email' => 'required|email|unique:customer,email',
            'phone' => 'required|numeric|min:10,max:11',

        ]);
        DB::table('customer')->insert([
            'AccountId' => $request->input('AccountId'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('customer')->with('message', 'Add New Customer Successful!');
    }

    // update
    public function customer_update($code)
    {
        $rs = DB::table('customer')
            ->where('customer_id', $code)->first();
        return view('admin.customer_update', ['rs' => $rs]);
    }
    public function customer_updateprocess(Request $request, $code)
    {
        $AccountId =  $request->input('AccountId');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $rs = DB::table('customer')
            ->where('customer_id', $code)
            ->update([
                'AccountId' => $AccountId,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'gender' => $gender,
                'email' => $email,
                'phone' => $phone,
            ]);
        return redirect()->route('customer')->with('message', 'Update Customer Successful!');
    }

    // delete
    public function customer_delete($code)
    {
        $rs = DB::table('customer')->where('customer_id', $code)->delete();
        return redirect()->route('customer');
    }



    ////////////////////////////////Order/////////////////////////////////////////////
    public function order()
    {
        $orders = DB::table('order')->paginate(7);
        return view('admin.order', ['orders' => $orders]);
    }
    //searchOrder
    public function searchOrder(Request $request)
    {

        $output = '';
        $search = $request->input('search');
        $orders = DB::table('order')->where('order_id', 'like', '%' . $search . '%')
            ->orWhere('customer_id', 'like', '%' . $search . '%')
            ->orWhere('quantity', 'like', '%' . $search . '%')
            ->orWhere('total_price', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%')
            ->orWhere('paymentmethod', 'like', '%' . $search . '%')->orderBy('order_id', 'desc')->get();

        foreach ($orders as $order) {
            $output .=
                '<tr>
                    <td>' . $order->order_id . '</td>
                    <td>' . $order->customer_id . '</td>
                    <td>' . $order->quantity . '</td>
                    <td>' . $order->total_price . '</td>
                    <td>' . $order->status . '</td>
                    <td>' . $order->paymentmethod . '</td>
                    <td>' . $order->create_at . '</td>
                    <td>
            <a href="/admin/order/update/' . $order->order_id . '"><button class="btn btn-primary">Update</button></a>
            <a onclick="confirmation(event)" href="/admin/order/delete/' . $order->order_id . '"><button class="btn btn-danger">Delete</button></a>
        </td>

                    </tr>';
        }
        return response($output);
    }
    // add
    public function order_add()
    {
        return view('admin.order_add');
    }

    public function order_addprocess(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'quantity' => 'required|numeric',
            'total_price' => 'required|numeric',
            'status' => 'required',
            'paymentmethod' => 'required',
        ]);
        $customer_id = $request->input('customer_id');
        $quantity = $request->input('quantity');
        $total_price = $request->input('total_price');
        $status = $request->input('status');
        $paymentmethod = $request->input('paymentmethod');
        $create_at = now();
        DB::table('order')->insert([
            'customer_id' => $customer_id,
            'quantity' => $quantity,
            'total_price' => $total_price,
            'status' => $status,
            'paymentmethod' => $paymentmethod,
            'create_at' => $create_at,
        ]);

        return redirect()->route('order')->with('message', 'Order added successfully!');
    }

    // update
    public function order_update($code)
    {
        $rs = DB::table('order')
            ->where('order_id', $code)->first();
        return view('admin.order_update', ['rs' => $rs]);
    }
    public function order_updateprocess(Request $request, $code)
    {
        $customer_id = $request->input('customer_id');
        $quantity = $request->input('quantity');
        $total_price = $request->input('total_price');
        $status = $request->input('status');
        $create_at = $request->input('create_at');
        $paymentmethod = $request->input('paymentmethod');
        $create_at = now();
        $rs = DB::table('order')
            ->where('order_id', $code)
            ->update([
                'customer_id' => $customer_id,
                'quantity' => $quantity,
                'total_price' => $total_price,
                'status' => $status,
                'create_at' => $create_at,
                'paymentmethod' => $paymentmethod,
            ]);
        return redirect()->route('order')->with('message', 'Update Order Successful!');
    }

    // delete
    public function order_delete($code)
    {
        $rs = DB::table('order')->where('order_id', $code)->delete();
        return redirect()->route('order');
    }


    ////////////////////////////////Ticket/////////////////////////////////////////////
    public function ticket()
    {
        $tickets = DB::table('ticket')->orderByDesc('ticket_id')->paginate(7);
        return view('admin.ticket', ['tickets' => $tickets]);
    }
    // searchTicket
    public function searchTicket(Request $request)
    {
        $output = '';
        $search = $request->input('search');
        $tickets = DB::table('ticket')->where('ticket_id', 'like', '%' . $search . '%')
            ->orWhere('flight_id', 'like', '%' . $search . '%')
            ->orWhere('Customer_id', 'like', '%' . $search . '%')
            ->orWhere('pass_firstname', 'like', '%' . $search . '%')
            ->orWhere('pass_lastname', 'like', '%' . $search . '%')
            ->orWhere('pass_gender', 'like', '%' . $search . '%')
            ->orWhere('pass_dob', 'like', '%' . $search . '%')
            ->orWhere('pass_cmnd', 'like', '%' . $search . '%')
            ->orWhere('type', 'like', '%' . $search . '%')
            ->orderBy('ticket_id', 'desc')->get();

        foreach ($tickets as $ticket) {
            $output .=
                '<tr>
                    <td>' . $ticket->ticket_id . '</td>
                    <td>' . $ticket->flight_id . '</td>
                    <td>' . $ticket->Customer_id . '</td>
                    <td>' . $ticket->pass_firstname . '</td>
                    <td>' . $ticket->pass_lastname . '</td>
                    <td>' . $ticket->pass_gender . '</td>
                    <td>' . $ticket->pass_dob . '</td>
                    <td>' . $ticket->pass_cmnd . '</td>
                    <td>' . $ticket->type . '</td>
                    <td>
            <a href="/admin/ticket/update/' . $ticket->ticket_id . '"><button class="btn btn-primary">Update</button></a>
            <a onclick="confirmation(event)" href="/admin/ticket/delete/' . $ticket->ticket_id . '"><button class="btn btn-danger">Delete</button></a>
        </td>
                </tr>';
        }

        return response()->json(['output' => $output]);
    }


    // add

    public function ticket_add()
    {
        return view('admin.ticket_add');
    }

    public function ticket_addprocess(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|unique:ticket',
            'flight_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'pass_firstname' => 'required',
            'pass_lastname' => 'required',
            'pass_gender' => 'required',
            'pass_dob' => 'required|date',
            'pass_cmnd' => 'required|unique:ticket',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        DB::table('ticket')->insert([
            'ticket_id' => $request->input('ticket_id'),
            'flight_id' => $request->input('flight_id'),
            'customer_id' => $request->input('customer_id'),
            'pass_firstname' => $request->input('pass_firstname'),
            'pass_lastname' => $request->input('pass_lastname'),
            'pass_gender' => $request->input('pass_gender'),
            'pass_dob' => $request->input('pass_dob'),
            'pass_cmnd' => $request->input('pass_cmnd'),
            'type' => $request->input('type'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('ticket')->with('message', 'Add New Ticket Successful!');
    }

    // update
    public function ticket_update($code)
    {
        $rs = DB::table('ticket')
            ->where('ticket_id', $code)->first();
        return view('admin.ticket_update', ['rs' => $rs]);
    }

    public function ticket_updateprocess(Request $request, $code)
    {



        $pass_firstname = $request->input('pass_firstname');
        $pass_lastname = $request->input('pass_lastname');
        $pass_gender = $request->input('pass_gender');
        $pass_dob = $request->input('pass_dob');
        $pass_cmnd = $request->input('pass_cmnd');
        $type = $request->input('type');


        $rs = DB::table('ticket')
            ->where('ticket_id', $code)
            ->update([


                'pass_firstname' => $pass_firstname,
                'pass_lastname' => $pass_lastname,
                'pass_gender' => $pass_gender,
                'pass_dob' => $pass_dob,
                'pass_cmnd' => $pass_cmnd,
                'type' => $type,

            ]);

        return redirect()->route('ticket')->with('message', 'Update Ticket Successful!');
    }

    // delete
    public function ticket_delete($code)
    {
        $rs = DB::table('ticket')->where('ticket_id', $code)->delete();
        return redirect()->route('ticket');
    }

    //////////////////////////////Account/////////////////////////////////////////////
    //users
    public function users()
    {
        $users = DB::table('users')->orderByDesc('id')->paginate(7);
        return view('admin.users', ['users' => $users]);
    }

    public function searchUsers(Request $request)
    {
        $output = '';
        $search = $request->input('search');
        $users = DB::table('users')->where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('password', 'like', '%' . $search . '%')
            ->orWhere('role', 'like', '%' . $search . '%')->get();

        foreach ($users as $user) {
            $output .=
                '<tr>
            <td>' . $user->id . '</td>
            <td>' . $user->name . '</td>
            <td>' . $user->email . '</td>
            <td>' . $user->password . '</td>
            <td>' . $user->role . '</td>
            <td><a href="/admin/users/update/' . $user->id . '"><button class="btn btn-primary">Update</button></a>|<a onclick="confirmation(event)" href="/admin/users/delete/' . $user->id . '"><button class="btn btn-danger">Delete</button></a></td>
            </tr>';
        }
        return response($output);
    }

    // add
    public function users_add()
    {
        return view('admin.users_add');
    }

    public function users_addprocess(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'password' => Hash::make( $request->input('password')),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('users')->with('message', 'Add New User Successful!');
    }

    // update
    public function users_update($code)
    {
        $rs = DB::table('users')
            ->where('id', $code)->first();
        return view('admin.users_update', ['rs' => $rs]);
    }

    public function users_updateprocess(Request $request, $code)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');

        $rs = DB::table('users')
            ->where('id', $code)
            ->update([
                'name' => $name,
                'email' => $email,
                'role' => $role,
            ]);

        return redirect()->route('users')->with('message', 'Update User Successful!');
    }

    // delete
    public function users_delete($code)
    {
        $rs = DB::table('users')->where('id', $code)->delete();
        return redirect()->route('users');
    }
}
