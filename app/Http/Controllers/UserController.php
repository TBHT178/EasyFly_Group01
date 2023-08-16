<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function changepw()
    {
        return view('user.changepw');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

    public function user_ticket()
    {
        $tickets = DB::table('users as a')
            ->join('customer as b', 'b.AccountId', '=', 'a.id')
            ->join('ticket as c', 'c.Customer_id', '=', 'b.customer_id')
            ->join('flight as d', 'd.flight_id', '=', 'c.flight_id')
            ->join('plane as e', 'd.planecode', '=', 'e.PlaneCode')
            ->where('a.id', '=', auth()->user()->id)
            ->get();
        // dd($tickets);
        return view('user.ticket', ['tickets' => $tickets]);
    }

    public function information()
    {
        return view('user.information');
    }

    public function updateInformation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        User::whereId(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return back()->with("status", "Information changed successfully!");
    }
    // ticket cancel
    public function cancelFlight(Request $request, $ticketId)
    {
        $valid = DB::table('flight as a') ->join('ticket as b','a.flight_id','=','b.flight_id')->where('b.ticket_id',$ticketId)->first();
        $date = $valid->departure;
        // $date2 = Carbon::now();
        // $result = $date1->ls($date2);
        // dd($result);
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $result = $now->lt($date);
        if($result){
            $type = DB::table('ticket')->where('ticket_id', $ticketId)->first();
            $rs=DB::table('seat_class')->where('flight_id',  $type->flight_id)->first();
            if($type->type == "Economy"){
                DB::table('seat_class')->where('flight_id',  $type->flight_id) ->update([
                    'num_class_PT' => $rs->num_class_PT + 1
                    
                ]);
                DB::table('ticket')->where('ticket_id', $ticketId)->delete();
                return redirect()->back()->with('message', 'Ticket canceled successfully.');
            }if($type->type == "Business"){
                DB::table('seat_class')->where('flight_id',  $type->flight_id) ->update([
                    'num_class_TG' => $rs->num_class_TG + 1
                ]);
                DB::table('ticket')->where('ticket_id', $ticketId)->delete();
            return redirect()->back()->with('message', 'Ticket canceled successfully.');
            }
            
        }else{
            return redirect()->back()->with('error', 'You can not cancel this ticket because the departure day of this ticket has passed!');
        }
    }
}
