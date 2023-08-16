@extends('admin.layouts.app')
@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <h1 style="padding:20px 0px;text-align: center;">Order Information</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{ route('order_add') }}">Add New Order</a>
    </div>
    <div class="search">
        <input type="text" id="search-order" name="search" class="mb-3 form-control" placeholder="Type here to search">
    </div>
    <table class="table .table-responsive" style="padding-bottom: 50px">
        <thead class="thead-light">
            <tr>
                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>created at</th>
                <th>Payment Method</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody id="order-row">
            @forelse ($orders as $order)
            <tr>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->customer_id }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->create_at }}</td>
                <td>{{ $order->paymentmethod }}</td>
                <td>
                    <a href="{{ route('order_update', ['code' => $order->order_id]) }}"><button class="btn btn-primary">Update</button></a> |
                    <a onclick="confirmation(event)" href="{{ route('order_delete', ['code' => $order->order_id]) }}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @empty
            <h3 style="text-align: center">No information</h3>
            @endforelse
        </tbody>
        <tbody id="order-data"></tbody>
    </table>
    {{ $orders->links() }}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('#search-order').on('keyup', function() {
        let value = $(this).val();
        if (value) {
            $('#order-row').hide();
            $('#order-data').show();
        }
        $.ajax({
            type: 'POST',
            url: "{{ route('searchOrder') }}",
            data: {
                'search': value,
                '_token': '{{ csrf_token() }}'
            },
            success: function(data) {
                console.log(data);
                $('#order-data').html(data);
            }
        });
    });
</script>
{{-- <script type="text/javascript">
    $('#search-order').on('keyup', function() {
        var searchValue = $(this).val();
        $.ajax({
            method: 'POST',
            url: '{{ route('searchOrder') }}',
dataType: 'json',
data: {
search: searchValue,
'_token': '{{ csrf_token() }}'
},
success: function(data) {
console.log(data);
var tableRows = '';
$('#order-data').html('');
$.each(data, function(index, order) {
tableRows += '<tr>
    <td>' +
        order.order_id + '</td>
    <td>' +
        order.customer_id + '</td>
    <td>' +
        order.quantity + '</td>
    <td>' +
        order.total_price + '</td>
    <td>' +
        order.status + '</td>
    <td>' +
        order.paymentmethod + '</td>
    <td>' +
        order.create_at + '</td>
    <td><a href="/admin/order/update/' + order.order_id + '"><button class="btn btn-primary">Update</button></a> | <a onclick="confirmation(event)" href="/admin/order/delete/' + order.order_id + '"><button class="btn btn-danger">Delete</button></a></td>
</tr>';
});
$('#order-data').html(tableRows);
}
});
});
</script> --}}
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
                title: "Are you sure to Delete this Order?",
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
</script>
@endsection