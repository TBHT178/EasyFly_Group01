@extends('admin.layouts.app')

@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif

    <h1 style="padding: 20px 0px; text-align: center;">Users Information</h1>
    <div style="padding-bottom: 20px; float:right;">
        <a href="{{ route('users_add') }}">Add New User</a>
    </div>
    <div class="search">
        <input type="text" id="search-user" name="search" class="mb-3 form-control" placeholder="Type here to search">
    </div>
    <table class="table .table-responsive" style="padding-bottom: 50px">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Role</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody id="user-row">
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                <td>{{ $user->role }}</td>
                <td>
                </td>
            </tr>
            @empty
            <h3 style="text-align: center">No information</h3>
            @endforelse
        </tbody>
        <tbody id="user-data"></tbody>
    </table>
    {{ $users->links() }}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('#search-user').on('keyup', function() {
        let value = $(this).val();
        if (value) {
            $('#user-row').hide();
            $('#user-data').show();
        }
        $.ajax({
            type: 'POST',
            url: "{{ route('searchUsers') }}",
            data: {
                'search': value,
                '_token': '{{ csrf_token() }}'
            },
            success: function(data) {
                console.log(data);
                $('#user-data').html(data);
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
            title: "Are you sure to delete this user?",
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