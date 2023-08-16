@extends('admin.layouts.app')
@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <h1 style="padding:20px 0px;text-align: center;">Add New Customer</h1>
    <form action="{{ route('customer_addprocess') }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="AccountId">AccountId <span style="color:red;">(*)</span></label>
            <input type="text" id="AccountId" class="form-control" name="AccountId" value="{{ old('AccountId') }}">
            @error('AccountId')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="firstname">First Name <span style="color:red;">(*)</span></label>
            <input type="text" id="firstname" class="form-control" name="firstname" value="{{ old('firstname') }}">
            @error('firstname')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastname">Last Name <span style="color:red;">(*)</span></label>
            <input type="text" id="lastname" class="form-control" name="lastname" value="{{ old('lastname') }}">
            @error('lastname')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender">Gender <span style="color:red;">(*)</span></label>
            <input type="text" id="gender" class="form-control" name="gender" value="{{ old('gender') }}">
            @error('gender')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email <span style="color:red;">(*)</span></label>
            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
            @error('email')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone <span style="color:red;">(*)</span></label>
            <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}">
            @error('phone')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <p style="color:red;">All <span>(*)</span> are required fields</p>
        <button style="float:right;" type="submit" class="btn btn-primary">Add Customer</button>
    </form>
</div>
@endsection