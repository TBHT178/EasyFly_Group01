@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Update Order</h1>

    <form action="{{ route('order_updateprocess', ['code' => $rs->order_id]) }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="customer_id">Customer ID</label>
            <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $rs->customer_id }}">
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $rs->quantity }}">
        </div>

        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="text" class="form-control" id="total_price" name="total_price" value="{{ $rs->total_price }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $rs->status }}">
        </div>
        <div class="form-group">
            <label for="create_at">Create at</label>
            <input type="text" class="form-control" id="create_at" name="create_at" value="{{ $rs->create_at }}">
        </div>
        <div class="form-group">
            <label for="paymentmethod">Payment Method</label>
            <input type="text" class="form-control" id="paymentmethod" name="paymentmethod" value="{{ $rs->paymentmethod }}">
        </div>

        <button onclick="return confirm('Are you sure to update this?')" style="float:right;" type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
@endsection