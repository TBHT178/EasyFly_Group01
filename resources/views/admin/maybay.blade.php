@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Danh sách máy bay</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{route('themmaybay')}}">Thêm máy bay</a>
    </div>
    <table class="table table-hover">
        <tr>
            <th>Mã máy bay</th>
            <th>Tên máy bay</th>
            <th>Số lượng ghế</th>
            <th>Tùy chọn</th>
        </tr>
        @forelse ($maybay as $maybay)
        <tr>
            <td>{{ $maybay->mamaybay }}</td>
            <td>{{ $maybay->tenmaybay }}</td>
            <td>{{ $maybay->sl_ghe }}</td>
            <td>
                <a href="{{route('mb_update',['code'=> $maybay->mamaybay])}}"><button class="btn btn-primary">Sửa</button></a> | <a href="{{route('mb_delete',['code'=> $maybay->mamaybay])}}"><button class="btn btn-primary">Xóa</button></a>
            </td>
        </tr>
    @empty
        <h3 style="text-align: center">Không có thông tin về máy bay</h3>
    @endforelse
    </table>
</div>
@endsection