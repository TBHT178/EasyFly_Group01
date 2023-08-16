@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Update Seat Class</h1>

    <form action="{{ route('seatclass_updateprocess', ['code' => $rs->Flight_id]) }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="flight_id">Flight ID</label>
            <input type="text" class="form-control" id="Flight_id" name="Flight_id" value="{{ $rs->Flight_id }}">
        </div>

        <div class="form-group">
            <label for="price_class_TG">Price Class TG</label>
            <input type="text" class="form-control" id="price_class_TG" name="price_class_TG" value="{{ $rs->price_class_TG }}">
        </div>

        <div class="form-group">
            <label for="num_class_PT">Num Class PT</label>
            <input type="text" class="form-control" id="num_class_PT" name="num_class_PT" value="{{ $rs->num_class_PT }}">
        </div>

        <div class="form-group">
            <label for="num_class_TG">Num Class TG</label>
            <input type="text" class="form-control" id="num_class_TG" name="num_class_TG" value="{{ $rs->num_class_TG }}">
        </div>

        <div class="form-group">
            <label for="price_class_PT">Price Class PT</label>
            <input type="text" class="form-control" id="price_class_PT" name="price_class_PT" value="{{ $rs->price_class_PT }}">
        </div>
        <button onclick="return confirm('Are you sure to update this?')" style="float:right;" type="submit" class="btn btn-primary">Update Seat Class</button>
    </form>
</div>
@endsection