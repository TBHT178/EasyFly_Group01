@extends('admin.layouts.app')

@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
    @endif

    <h1 style="padding:20px 0px;text-align: center;">Add New Seat Class</h1>
    <form action="{{ route('seatclass_addprocess') }}" method="post" style="padding-bottom: 50px;">
        @csrf
        <div class="form-group">
            <label for="Flight_id">Flight ID <span style="color:red;">(*)</span></label>
            <select name="Flight_id" class="form-control">
                <option value="">Choose Flight</option>
                @foreach ($seat_class as $flight)
                <option value="{{ $flight->Flight_id }}">{{ $flight->Flight_id }}</option>
                @endforeach
            </select>
            @error('Flight_id')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price_class_TG">Price Class TG <span style="color:red;">(*)</span></label>
            <input type="text" id="price_class_TG" class="form-control" name="price_class_TG" value="{{ old('price_class_TG') }}">
            @error('price_class_TG')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="num_class_PT">Num Class PT <span style="color:red;">(*)</span></label>
            <input type="number" id="num_class_PT" class="form-control" name="num_class_PT" value="{{ old('num_class_PT') }}" min="0">
            @error('num_class_PT')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="num_class_TG">Num Class TG <span style="color:red;">(*)</span></label>
            <input type="number" id="num_class_TG" class="form-control" name="num_class_TG" value="{{ old('num_class_TG') }}" min="0">
            @error('num_class_TG')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price_class_PT">Price Class PT <span style="color:red;">(*)</span></label>
            <input type="text" id="price_class_PT" class="form-control" name="price_class_PT" value="{{ old('price_class_PT') }}">
            @error('price_class_PT')
            <div style="color:red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <p style="color:red;">All <span>(*)</span> are required fields</p>
        <button style="float:right;" type="submit" class="btn btn-primary">Add Seat Class</button>
    </form>
</div>
@endsection