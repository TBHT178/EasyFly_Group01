@extends('admin.layouts.app')
@section('content')
<!-- dat ve -->
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Order Information</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{route('dv_add')}}">Add Order</a>
    </div>
    <table class="table table-hover">
        <tr>
            <th>order_id</th>
            <th>customer_id</th>
            <th>quantity</th>
            <th>total_price</th>
            <th>status</th>
            <th>create_at</th>
            <th>paymentmethod</th>
        </tr>
        @forelse ($datve as $order)
        <tr>
            <td>{{$order->order_id}}</td>
            <td>{{$order->customer_id}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->total_price}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->create_at}}</td>
            <td>{{$order->paymentmethod}}</td>
            <td>
                <a href="{{route('dv_update',['code'=> $order->order_id])}}"><button class="btn btn-primary">Update</button></a> | <a href="{{route('dv_delete',['code'=>$order->order_id])}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @empty
        <h3 style="text-align: center">No information</h3>
        @endforelse
    </table>
</div>
@endsection