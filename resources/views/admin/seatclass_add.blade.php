@extends('admin.layouts.app')
@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <h1 style="padding:20px 0px;text-align: center;">Add New Seat Class</h1>
    <form action="{{ route('seatclass_addprocess') }}" method="POST" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="flight_id">Flight</label>
            <select id="flight_id" name="flight_id" class="form-control">
                <option value="">Choose Flight</option>
                @foreach ($flights as $flight)
                <option value="{{ $flight->flight_id }}" @if(old('flight_id')==$flight->flight_id) selected @endif>
                    {{ $flight->FromPlace }} to {{ $flight->ToPlace }} - {{ $flight->departure }} to {{ $flight->arrival }}
                </option>
                @endforeach
            </select>
            @error('flight_id')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="num_class_PT">Number of Class PT</label>
            <input type="number" id="num_class_PT" class="form-control" name="num_class_PT" value="{{ old('num_class_PT') }}">
            @error('num_class_PT')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="num_class_TG">Number of Class TG</label>
            <input type="number" id="num_class_TG" class="form-control" name="num_class_TG" value="{{ old('num_class_TG') }}">
            @error('num_class_TG')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price_class_PT">Price of Class PT</label>
            <input type="number" step="0.01" id="price_class_PT" class="form-control" name="price_class_PT" value="{{ old('price_class_PT') }}">
            @error('price_class_PT')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price_class_TG">Price of Class TG</label>
            <input type="number" step="0.01" id="price_class_TG" class="form-control" name="price_class_TG" value="{{ old('price_class_TG') }}">
            @error('price_class_TG')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button style="float:right;" type="submit" class="btn btn-primary">Add Seat Class</button>
    </form>
</div>
@endsection