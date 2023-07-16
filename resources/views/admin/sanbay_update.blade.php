@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Thêm máy bay</h1>
    <form action="{{route('sb_updateprocess',['code'=>$rs->masanbay])}}" method="POST">
        @csrf
        <table class="table">
            <tr>
                <td>Mã sân bay</td>
                <td><input name="masanbay" value="{{$rs->masanbay}}" readonly></td>
            </tr>
            <tr>
                <td>Tên sân bay</td>
                <td><input name="tensanbay" value="{{$rs->tensanbay}}"></td>
            </tr>
            <tr>
                <td>Thành phố</td>
                <td><input name="thanhpho" value="{{$rs->thanhpho}}"></td>
            </tr>
            <tr>
                <td>Quốc gia</td>
                <td><input name="quocgia" value="{{$rs->quocgia}}"></td>
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