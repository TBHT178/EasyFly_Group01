@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">add customer</h1>
    <form action="{{route('kh_addprocess')}}" method="POST">
        @csrf
        <table class="table">
            <tr>
                <td>AccountId</td>
                <td><input name="AccountId"></td>
            </tr>
            <tr>
                <td>firstname</td>
                <td><input name="firstname"></td>
            </tr>
            <tr>
                <td>lastname</td>
                <td><input name="lastname"></td>
            </tr>
            <tr>
                <td>gender</td>
                <td><input type="gender"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input name="email"></td>
            </tr>
            <tr>
                <td>phone</td>
                <td><input name="phone"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="them khach hang">
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection