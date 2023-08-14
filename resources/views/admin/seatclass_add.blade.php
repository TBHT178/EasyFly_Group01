@extends('admin.layouts.app')
@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <h1 style="padding:20px 0px;text-align: center;">Add New Seat Class</h1>
    <form action="{{ route('seatclass_addprocess') }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="flight_id">Flight ID <span style="color:red;">(*)</span></label>
            <select id="flight_id" class="form-control" name="flight_id">
                @foreach ($flights as $flight)
                <option value="{{ $flight->flight_id }}">{{ $flight->flight_id }}</option>
                @endforeach
            </select>
            @error('flight_id')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>price_class_TG<span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" name="price_class_TG" value="{{ old('price_class_TG')}}">
            @error('price_class_TG')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>num_class_PT<span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" name="num_class_PT" value="{{ old('num_class_PT')}}">
            @error('num_class_PT')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>num_class_TG<span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" name="num_class_TG" value="{{ old('num_class_TG')}}">
            @error('num_class_TG')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>price_class_PT<span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" name="price_class_PT" value="{{ old('price_class_PT')}}">
            @error('price_class_PT')
            <div style="color:red">
                {{$message}}
            </div>
            @enderror
        </div>
        <p style="color:red;">All <span>(*)</span> are required fields</p>
        <button style="float:right;" type="submit" class="btn btn-primary">Add Order</button>
    </form>
</div>
@endsection