@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Thêm máy bay</h1>
    <form action="{{route('sb_addprocess')}}" method="POST">
        @csrf
        <table class="table">
            <tr>
                <td>Mã sân bay</td>
                <td><input name="masanbay"></td>
            </tr>
            <tr>
                <td>Tên sân bay</td>
                <td><input name="tensanbay"></td>
            </tr>
            <tr>
                <td>Thành phố</td>
                <td><input name="thanhpho"></td>
            </tr>
            <tr>
                <td>Quốc gia</td>
                <td><input name="quocgia"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Thêm sân bay">
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection