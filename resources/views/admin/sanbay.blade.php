@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Airport's Information</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{route('sb_add')}}">Add airport</a>
    </div>
    <table class="table table-hover">
        <tr>
            <th>AirportCode</th>
            <th>Airport Name</th>
            <th>City</th>
            <th>Country</th>
            <th>Function</th>
        </tr>
        @forelse ($sanbay as $airport)
        <tr>
            <td>{{ $airport->airport_code }}</td>
            <td>{{ $airport->airport_name }}</td>
            <td>{{ $airport->city }}</td>
            <td>{{ $airport->country }}</td>
            <td>
                <a href="{{route('sb_update',['code'=> $airport->airport_code])}}"><button class="btn btn-primary">Update</button></a> | <a href="{{route('sb_delete',['code'=>$airport->airport_code])}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
    @empty
        <h3 style="text-align: center">No information</h3>
    @endforelse
    </table>
</div>
@endsection