@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Danh sách sân bay</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{route('sb_add')}}">Thêm sân bay</a>
    </div>
    <table class="table table-hover">
        <tr>
            <th>Mã sân bay</th>
            <th>Tên sân bay</th>
            <th>Thành phố</th>
            <th>Quốc gia</th>
            <th>Tùy chọn</th>
        </tr>
        @forelse ($sanbay as $sanbay)
        <tr>
            <td>{{ $sanbay->masanbay }}</td>
            <td>{{ $sanbay->tensanbay }}</td>
            <td>{{ $sanbay->thanhpho }}</td>
            <td>{{ $sanbay->quocgia }}</td>
            <td>
                <a href="{{route('sb_update',['code'=> $sanbay->masanbay])}}"><button class="btn btn-primary">Sửa</button></a> | <a href=""><button class="btn btn-primary">Xóa</button></a>
            </td>
        </tr>
    @empty
        <h3 style="text-align: center">Không có thông tin về sân bay</h3>
    @endforelse
    </table>
</div>
@endsection