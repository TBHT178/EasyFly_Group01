@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Update Ticket</h1>

    <form action="{{ route('ticket_updateprocess', ['code' => $rs->ticket_id]) }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="pass_firstname">Passenger First Name</label>
            <input type="text" class="form-control" id="pass_firstname" name="pass_firstname" value="{{ $rs->pass_firstname }}">
        </div>

        <div class="form-group">
            <label for="pass_lastname">Passenger Last Name</label>
            <input type="text" class="form-control" id="pass_lastname" name="pass_lastname" value="{{ $rs->pass_lastname }}">
        </div>

        <div class="form-group">
            <label for="pass_gender">Passenger Gender</label>
            <select class="form-control" id="pass_gender" name="pass_gender">
                <option value="0" @if($rs->pass_gender == 0) selected @endif>Male</option>
                <option value="1" @if($rs->pass_gender == 1) selected @endif>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pass_dob">Passenger Date of Birth</label>
            <input type="date" class="form-control" id="pass_dob" name="pass_dob" value="{{ $rs->pass_dob }}">
        </div>

        <div class="form-group">
            <label for="pass_cmnd">Passenger CMND</label>
            <input type="text" class="form-control" id="pass_cmnd" name="pass_cmnd" value="{{ $rs->pass_cmnd }}">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type">
                <option value="Economy" @if($rs->type == 'Economy') selected @endif>Economy</option>
                <option value="Business" @if($rs->type == 'Business') selected @endif>Business</option>
            </select>
        </div>

        <button onclick="return confirm('Are you sure to update this?')" style="float:right;" type="submit" class="btn btn-primary">Update Ticket</button>
    </form>
</div>
@endsection