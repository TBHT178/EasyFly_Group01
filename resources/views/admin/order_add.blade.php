@extends('admin.layouts.app')
@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <h1 style="padding:20px 0px;text-align: center;">Add New Order</h1>
    <form action="{{ route('order_addprocess') }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="customer_id">Customer ID <span style="color:red;">(*)</span></label>
            <input type="text" id="customer_id" class="form-control" name="customer_id" value="{{ old('customer_id') }}">
            @error('customer_id')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Quantity <span style="color:red;">(*)</span></label>
            <input type="text" id="quantity" class="form-control" name="quantity" value="{{ old('quantity') }}">
            @error('quantity')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="total_price">Total Price <span style="color:red;">(*)</span></label>
            <input type="text" id="total_price" class="form-control" name="total_price" value="{{ old('total_price') }}">
            @error('total_price')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status <span style="color:red;">(*)</span></label>
            <input type="text" id="status" class="form-control" name="status" value="{{ old('status') }}">
            @error('status')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="paymentmethod">Payment Method <span style="color:red;">(*)</span></label>
            <input type="text" id="paymentmethod" class="form-control" name="paymentmethod" value="{{ old('paymentmethod') }}">
            @error('paymentmethod')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <p style="color:red;">All <span>(*)</span> are required fields</p>
        <button style="float:right;" type="submit" class="btn btn-primary">Add Order</button>
    </form>
</div>
@endsection