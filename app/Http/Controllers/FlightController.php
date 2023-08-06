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
        $departure = $request->input('departure');
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y  h:i A');
        $request->validate([
            'from' => 'required',
            'to' => 'required|different:from',
            'depart' => 'required|after_or_equal:' . $currentTime,
            'return' => ['required', 'after_or_equal:' . $departure],
            'passenger' => ['required', 'numeric', 'min:1']
        ], [
            'to.different' => 'Airports can not be the same',
        ]);

        if ($request->class == 1) {
            $seats = DB::table('seat_class')->select('num_class_PT')->get();
            if ($seats >= $request->passenger) {
                $depart = $request->depart;
                $return = $request->return;
                $result = DB::table('flight as fli')
                    ->join('airport as a', 'fli.FromPlace', '=', 'a.airport_code')
                    ->join('airport as b', 'fli.ToPlace', '=', 'b.airport_code')
                    ->join('plane as c', 'fli.planecode', '=', 'c.PlaneCode')
                    ->join('seat_class as d', 'fli.flight_id', '=', 'd.Flight_id')
                    ->select('a.*', 'b.*', 'fli.*', 'c.*', 'd.price_class_PT as price')
                    ->where('FromPlace', '=', $request->from)
                    ->where('ToPlace', '=', $request->to)
                    ->whereDate('departure', '=', $depart)
                    ->whereDate('arrival', '=', $return)
                    ->get();
            }
        } else {
            $seats = DB::table('seat_class')->select('num_class_TG')->get();
            if ($seats >= $request->passenger) {
                $depart = $request->depart;
                $return = $request->return;
                $result = DB::table('flight as fli')
                    ->join('airport as a', 'fli.FromPlace', '=', 'a.airport_code')
                    ->join('airport as b', 'fli.ToPlace', '=', 'b.airport_code')
                    ->join('plane as c', 'fli.planecode', '=', 'c.PlaneCode')
                    ->join('seat_class as d', 'fli.flight_id', '=', 'd.Flight_id')
                    ->select('a.*', 'b.*', 'fli.*', 'c.*', 'd.price_class_TG as price')
                    ->where('FromPlace', '=', $request->from)
                    ->where('ToPlace', '=', $request->to)
                    ->whereDate('departure', '=', $depart)
                    ->whereDate('arrival', '=', $return)
                    ->get();
            }
        }
        return view('', ['results' => $result]);
    }
}
