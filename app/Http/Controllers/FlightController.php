<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function search(Request $request)
    {
        $departure = $request->input('depart');
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $request->validate([
            'to' => 'different:from',
            'depart' => 'after_or_equal:' . $currentTime,
            'return' => ['after_or_equal:' . $departure],
            'passenger' => ['required', 'numeric', 'min:1']
        ], [
            'to.different' => 'Airports can not be the same',
            'return.after_or_equal' => 'The return day must be a date after or equal to departure day'
        ]);
        if ($request->class == 1) {
            $depart = $request->depart;
            $result = DB::table('flight as fli')
                ->join('airport as a', 'fli.FromPlace', '=', 'a.airport_code')
                ->join('airport as b', 'fli.ToPlace', '=', 'b.airport_code')
                ->join('plane as c', 'fli.planecode', '=', 'c.PlaneCode')
                ->join('seat_class as d', 'fli.flight_id', '=', 'd.Flight_id')
                ->select('a.city as fromcity', 'b.city as tocity', 'fli.*', 'c.PlaneName', 'd.price_class_PT as price', 'd.num_class_PT as seat')
                ->where('FromPlace', '=', $request->from)
                ->where('ToPlace', '=', $request->to)
                ->where('num_class_PT', '>=', $request->passenger)
                ->whereDate('departure', '=', $depart)
                ->get();
            $class = 'Economy';
            $passenfer = $request->passenger;
            return view('flight-list', ['results' => $result, 'class' => $class, 'passenger' => $passenfer]);
        } else {
            $depart = $request->depart;
            $result = DB::table('flight as fli')
                ->join('airport as a', 'fli.FromPlace', '=', 'a.airport_code')
                ->join('airport as b', 'fli.ToPlace', '=', 'b.airport_code')
                ->join('plane as c', 'fli.planecode', '=', 'c.PlaneCode')
                ->join('seat_class as d', 'fli.flight_id', '=', 'd.Flight_id')
                ->select('a.city as fromcity', 'b.city as tocity', 'fli.*', 'c.PlaneName', 'd.price_class_TG as price', 'd.num_class_TG as seat')
                ->where('FromPlace', '=', $request->from)
                ->where('ToPlace', '=', $request->to)
                ->where('num_class_TG', '>=', $request->passenger)
                ->whereDate('departure', '=', $depart)
                ->get();
            $class = 'Bussiness';
            $passenger = $request->passenger;
            return view('flight-list', ['results' => $result, 'class' => $class, 'passenger' => $passenger]);
        }
    }

    public function booking(Request $request, $id)
    {
        $price = $request->input('price');
        $class = $request->class;
        $qty = $request->qty;
        $rs = DB::table('flight')
            ->where('flight_id', $id)->first();
        return view('booking-details', ['rs' => $rs, 'price' => $price, 'class' => $class, 'qty' => $qty]);
    }

    public function processBooking(Request $request)
    {
        // nguời dùng mới khi điền thông tin form booking detail và truyền dữ liệu mới vô trong database customer
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $rs = DB::table('customer')->insertGetId([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'email' => $email
        ]);
        $flight_id = $request->input('flight_id');
        $class = $request->input('class');
        $qty = $request->input('qty');
        $price = $request->input('price');
        $total = $qty * $price;
        $rs = DB::table('booking')->insertGetId([
            'flight_id' => $flight_id,
            'customer_id' => $rs,
            'class' => $class,
            'qty' => $qty,
            'total' => $total
        ]);
        return redirect()->route('payment', ['id' => $rs]);
    }
}
