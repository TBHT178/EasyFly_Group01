@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Update information Customer</h1>

    <form action="{{ route('customer_updateprocess', ['code' => $rs->customer_id]) }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label>Customer ID</label>
            <input name="makhachhang" value="{{ $rs->customer_id }}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label>Account ID</label>
            <input name="account_id" value="{{ $rs->AccountId }}" class="form-control">
        </div>
        <div class="form-group">
            <label>First Name</label>
            <input name="firstname" value="{{ $rs->firstname }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input name="lastname" value="{{ $rs->lastname }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input name="gender" value="{{ $rs->gender }}" class="form-control">
        </div>
        <div class=" form-group">
            <label>Email</label>
            <input name="email" value="{{ $rs->email }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input name="phone" value="{{ $rs->phone }}" class="form-control">
        </div>
        <button onclick="return confirm('Are you sure to update this customer ?')" style="float:right;" type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endsection