@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Thêm khach hang</h1>
    <form action="{{route('kh_updateprocess',['code'=>$rs->customer_code])}}" method="POST">
        @csrf
        <table class="table">
            <tr>
                <td>Mã khách hàng</td>
                <td><input name="makhachhang" value="{{$rs->customer_code}}" readonly></td>
            </tr>
            <tr>
                <td>Tên khách hàng</td>
                <td><input name="tenkhachhang" value="{{$rs->customer_name}}"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input name="diachi" value="{{$rs->address}}"></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input name="sodienthoai" value="{{$rs->phone_number}}"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input name="email" value="{{$rs->email}}"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Cập nhật">
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection