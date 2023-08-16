@extends('layout.main')

@section('content')
    <!-- <h1>CustomerID : {{ $customer_id }}</h1>
    <h1>Quantity: {{ $quantity }}</h1>
    <h1>Total Price: {{ $total_price }}</h1> -->

    <main>

        <section class="p-4 p-md-5"
            style=" background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Others/background3.webp); padding-top:90px !important ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-5">
                    <div class="card rounded-3">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <h3>Order Details</h3>
                                {{-- <h6>Payment</h6> --}}
                            </div>
                            <form action="{{route('session')}}" method="POST">
                                @csrf
                                {{-- <p class="fw-bold mb-4 pb-2">Saved cards:</p>

                        <div class="d-flex flex-row align-items-center mb-4 pb-1">
                            <img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                            <div class="flex-fill mx-3">
                                <div class="form-outline">
                                    <input type="text" id="formControlLgXc" class="form-control form-control-lg" value="**** **** **** 3193" />
                                    <label class="form-label" for="formControlLgXc">Card Number</label>
                                </div>
                            </div>
                            <a href="#!" style="font-size: 13px;">Remove card</a>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 pb-1">
                            <img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" />
                            <div class="flex-fill mx-3">
                                <div class="form-outline">
                                    <input type="text" id="formControlLgXs" class="form-control form-control-lg" value="**** **** **** 4296" />
                                    <label class="form-label" for="formControlLgXs">Card Number</label>
                                </div>
                            </div>
                            <a href="#!" style="font-size: 13px;">Remove card</a>
                        </div>

                        <p class="fw-bold mb-4">Add new card:</p>

                        <div class="form-outline mb-4">
                            <input type="text" id="formControlLgXsd" class="form-control form-control-lg" value="Anna Doe" />
                            <label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
                        </div>

                        <div class="row mb-4">
                            <div class="col-7">
                                <div class="form-outline">
                                    <input type="text" id="formControlLgXM" class="form-control form-control-lg" value="1234 5678 1234 5678" />
                                    <label class="form-label" for="formControlLgXM">Card Number</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-outline">
                                    <input type="password" id="formControlLgExpk" class="form-control form-control-lg" placeholder="MM/YYYY" />
                                    <label class="form-label" for="formControlLgExpk">Expire</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-outline">
                                    <input type="password" id="formControlLgcvv" class="form-control form-control-lg" placeholder="Cvv" />
                                    <label class="form-label" for="formControlLgcvv">Cvv</label>
                                </div>
                            </div>
                        </div> --}}
                                @php
                                    $rs = DB::table('customer')
                                        ->where('customer_id', $customer_id)
                                        ->first();
                                @endphp
                                <p class="fw-bold mb-2 pb-2">Buyer's name: {{ $rs->firstname }} {{ $rs->lastname }}</p>
                                <p class="fw-bold mb-2 pb-2">Quantity: {{ $quantity }} ticket(s)</p>
                                <p class="fw-bold mb-2 pb-2">Total Price: ${{ $total_price }}</p>
                                @foreach ($ticket as $tk)
                                <div style="border-style: dashed; padding:7px 0px ; margin:5px 0px;" >
                                    <p>Ticket ID: {{$tk->ticket_id }}</p>                              
                                    <p>Passenger's First Name: {{$tk->pass_firstname }}</p>                             
                                    <p>Passenger's Last Name: {{$tk->pass_lastname }}</p>
                                    <p>Type of Ticket: {{$tk->type }}</p>
                                    <p>Price of Ticket: ${{$tk-> price}}</p>
                                </div>
                                    @endforeach
                                    <input type="hidden" name="email" value="{{$rs->email}}">
                                    <input type="hidden" name="quantity" value="{{$quantity}}">
                                    <input type="hidden" name="totalprice" value="{{$total_price}}">
                                    <input type="hidden" name="customerId" value="{{$customer_id}}">

                                <button class="btn btn-success btn-lg btn-block" style="text-align: center; display:block;">Confirmation</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
