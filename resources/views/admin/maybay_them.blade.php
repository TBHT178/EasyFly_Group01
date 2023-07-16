@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Thêm máy bay</h1>
    <form action="{{route('themmaybay_process')}}" method="POST">
        @csrf
        <table class="table">
            <tr>
                <td>Mã máy bay</td>
                <td><input name="mamaybay"></td>
            </tr>
            <tr>
                <td>Tên máy bay</td>
                <td><input name="tenmaybay"></td>
            </tr>
            <tr>
                <td>Số lượng ghế</td>
                <td><input name="sl_ghe"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Thêm máy bay">
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection