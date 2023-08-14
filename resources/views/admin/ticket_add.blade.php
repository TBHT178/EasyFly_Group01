@extends('admin.layouts.app')
@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <h1 style="padding:20px 0px;text-align: center;">Add New Ticket</h1>
    <form action="{{ route('ticket_addprocess') }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="ticket_id">Ticket ID <span style="color:red;">(*)</span></label>
            <input type="text" id="ticket_id" class="form-control" name="ticket_id" value="{{ old('ticket_id') }}">
            @error('ticket_id')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="flight_id">Flight ID <span style="color:red;">(*)</span></label>
            <input type="text" id="flight_id" class="form-control" name="flight_id" value="{{ old('flight_id') }}">
            @error('flight_id')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
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
            <label for="pass_firstname">First Name <span style="color:red;">(*)</span></label>
            <input type="text" id="pass_firstname" class="form-control" name="pass_firstname" value="{{ old('pass_firstname') }}">
            @error('pass_firstname')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pass_lastname">Last Name <span style="color:red;">(*)</span></label>
            <input type="text" id="pass_lastname" class="form-control" name="pass_lastname" value="{{ old('pass_lastname') }}">
            @error('pass_lastname')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pass_gender">Gender <span style="color:red;">(*)</span></label>
            <input type="text" id="pass_gender" class="form-control" name="pass_gender" value="{{ old('pass_gender') }}">
            @error('pass_gender')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pass_dob">Date of Birth <span style="color:red;">(*)</span></label>
            <input type="date" id="pass_dob" class="form-control" name="pass_dob" value="{{ old('pass_dob') }}">
            @error('pass_dob')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pass_cmnd">ID Card/Passport Number <span style="color:red;">(*)</span></label>
            <input type="text" id="pass_cmnd" class="form-control" name="pass_cmnd" value="{{ old('pass_cmnd') }}">
            @error('pass_cmnd')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="type">Ticket Type <span style="color:red;">(*)</span></label>
            <select id="type" class="form-control" name="type">
                <option value="economy" {{ old('type') === 'economy' ? 'selected' : '' }}>Economy</option>
                <option value="business" {{ old('type') === 'business' ? 'selected' : '' }}>Business</option>
            </select>
            @error('type')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price <span style="color:red;">(*)</span></label>
            <input type="text" id="price" class="form-control" name="price" value="{{ old('price') }}">
            @error('price')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <p style="color:red;">All <span>(*)</span> are required fields</p>
        <button style="float:right;" type="submit" class="btn btn-primary">Add Ticket</button>
    </form>
</div>
@endsection