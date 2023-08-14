@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1 style="padding:20px 0px;text-align: center;">Ticket Information</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{route('ticket_add')}}">Add ticket</a>
    </div>
    <div class="search">
        <input type="text" id="search" name="search" class="mb-3 form-control" placeholder="Type here to search">
    </div>
    <table class="table table-hover">
        <tr>
            <th>ticket_id</th>
            <th>flight_id</th>
            <th>Customer_id</th>
            <th>pass_firstname</th>
            <th>pass_lastname</th>
            <th>pass_gender</th>
            <th>pass_dob</th>
            <th>pass_cmnd</th>
            <th>type</th>
            <th>Function</th>
        </tr>
        @forelse($tickets as $ticket)
        <tr>
            <td>{{$ticket->ticket_id}}</td>
            <td>{{$ticket->flight_id}}</td>
            <td>{{$ticket->Customer_id}}</td>
            <td>{{$ticket->pass_firstname}}</td>
            <td>{{$ticket->pass_lastname}}</td>
            <td>{{$ticket->pass_gender}}</td>
            <td>{{$ticket->pass_dob}}</td>
            <td>{{$ticket->pass_cmnd}}</td>
            <td>{{$ticket->type}}</td>
            <td>
                <a href="{{ route('ticket_update', ['code' => $ticket->ticket_id]) }}"><button class="btn btn-primary">Update</button></a> | <a onclick="confirmation(event)" href="{{ route('ticket_delete', ['code' => $ticket->ticket_id]) }}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @empty
        <h3 style="text-align: center">No information</h3>
        @endforelse

    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('#search').on('keyup', function() {
        var searchQuest = $(this).val();

        $.ajax({
            method: 'POST',
            url: '{{ route("searchticket") }}',
            dataType: 'json',
            data: {
                searchQuest: searchQuest,
                '_token': '{{ csrf_token() }}'
            },
            success: function(res) {
                console.log(res)
                var tableRow = '';
                $('table tbody').html('');
                $.each(res, function(index, value) {
                    tableRow = '<tr><td>' +
                        value.ticket_id + '</td><td>' +
                        value.flight_id + '</td><td>' +
                        value.Customer_id + '</td><td>' +
                        value.pass_firstname + '</td><td>' +
                        value.pass_lastname + '</td><td>' +
                        value.pass_gender + '</td><td>' +
                        value.pass_dob + '</td><td>' +
                        value.pass_cmnd + '</td><td>' +
                        value.type +
                        '</td><td><a href="{{ route("ticket_update", ["code" => $ticket->ticket_id]) }}"><button class="btn btn-primary">Update</button></a> | <a onclick="confirmation(event)" href="{{ route("ticket_delete", ["code" => $ticket->ticket_id]) }}"><button class="btn btn-danger">Delete</button></a></td></tr>';
                    $('table tbody').append(tableRow);
                });
            }
        });
    });

    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: "Are you sure to Delete this Ticket?",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>
@endsection