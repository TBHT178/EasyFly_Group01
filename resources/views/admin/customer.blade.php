@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Customer Information</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{route('customer_add')}}">Add customer</a>
    </div>
    <div class="search">
        <input type="text" id="search" name="search" class="mb-3 form-control" placeholder="Type here to search">
    </div>
    <table class="table table-hover">
        <tr>
            <th>customer_id</th>
            <th>AccountId</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>gender</th>
            <th>email</th>
            <th>phone</th>
        </tr>
        @forelse($customers as $customer)
        <tr>
            <td>{{$customer->customer_id}}</td>
            <td>{{$customer->AccountId}}</td>
            <td>{{$customer->firstname}}</td>
            <td>{{$customer->lastname}}</td>
            <td>{{$customer->gender}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->phone}}</td>
            <td>
                <a href="{{route('customer_update',['code'=> $customer->customer_id])}}"><button class="btn btn-primary">Update</button></a> | <a href="{{route('customer_delete',['code'=>$customer->customer_id])}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @empty
        <h3 style="text-align: center">No information</h3>
        @endforelse

    </table>
</div>
@endsection