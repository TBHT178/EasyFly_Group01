@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">customer Information</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{route('kh_add')}}">Add customer</a>
    </div>
    <div class="search">
        <input type="text" id="search" name="search" class="mb-3 form-control" placeholder="Type here to search">
    </div>
    <table class="table table-hover">
        <tr>
            <th>customer_id</th>
            <th>AccountId</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>gender</th>
            <th>email</th>
            <th>phone</th>
        </tr>
        @forelse ($khachhang as $customer)
        <tr>
            <td>{{$customer->customer_id}}</td>
            <td>{{$customer->AccountId}}</td>
            <td>{{$customer->firstname}}</td>
            <td>{{$customer->lastname}}</td>
            <td>{{$customer->gender}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->phone}}</td>
            <td>
                <a href="{{route('kh_update',['code'=> $customer->customer_id])}}"><button class="btn btn-primary">Update</button></a> | <a href="{{route('kh_delete',['code'=>$customer->customer_id])}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @empty
        <h3 style="text-align: center">No information</h3>
        @endforelse

    </table>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('#searchkh').on('keyup', function() {
        let value = $(this).val();
        if (value) {
            $('#flight-row').hide();
            $('#flight-data').show();
        }
        $.ajax({
            type: 'POST',
            url: '{{route('
            searchkh ')}}',
            data: {
                '_token': '{{ csrf_token() }}',
                'search': value
            },
            success: function(data) {
                $('#flight-data').html(data);
            }

        });
    });
</script>
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
                title: "Are you sure to Delete this Flight?",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
    }
</script> -->
@endsection