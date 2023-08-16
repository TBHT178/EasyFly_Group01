@extends('admin.layouts.app')
@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <h1 style="padding:20px 0px;text-align: center;">Ticket Information</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{ route('ticket_add') }}">Add ticket</a>
    </div>
    <div class="search">
        <input type="text" id="search-ticket" name="search" class="mb-3 form-control" placeholder="Type here to search">
    </div>
    <table class="table .table-responsive" style="padding-bottom: 50px">
        <thead class="thead-light">
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
        </thead>
        <tbody id="ticket-row">
            @forelse ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->ticket_id }}</td>
                <td>{{ $ticket->flight_id }}</td>
                <td>{{ $ticket->Customer_id }}</td>
                <td>{{ $ticket->pass_firstname }}</td>
                <td>{{ $ticket->pass_lastname }}</td>
                <td>{{ $ticket->pass_gender }}</td>
                <td>{{ $ticket->pass_dob }}</td>
                <td>{{ $ticket->pass_cmnd }}</td>
                <td>{{ $ticket->type }}</td>
                <td>
                    <a href="{{ route('ticket_update', ['code' => $ticket->ticket_id]) }}"><button class="btn btn-primary">Update</button>
                    </a> | <a onclick="confirmation(event)" href="{{ route('ticket_delete', ['code' => $ticket->ticket_id]) }}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10">
                    <h3 style="text-align: center">No information</h3>
                </td>
            </tr>
            @endforelse
        </tbody>
        <tbody id="ticket-data"> </tbody>
    </table>
    {{ $tickets->links() }}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('#search-ticket').on('keyup', function() {
        let value = $(this).val();
        if (value) {
            $('#ticket-row').hide();
            $('#ticket-data').show();
        }
        $.ajax({
            type: 'POST',
            url: "{{ route('searchTicket') }}",
            data: {
                'search': value,
                '_token': '{{ csrf_token() }}'
            },
            success: function(data) {
                console.log(data);
                $('#ticket-data').html(data);
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