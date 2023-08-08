@extends('layout.main')

@section('content')
<!-- customer_id AccountId firstname lastname gender email phone -->
<!-- nhập dữ liệu mới trong bảng customer -->
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Booking Details</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Booking Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- customer-details-area -->
    <section class="customer-details-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="customer-details-content">
                        <div class="icon">
                            <img src="{{asset('assets/img/icon/customer_det_icon.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <h2 class="title">Customer Details: Please fill in with valid information.</h2>
                            <div class="customer-progress-wrap">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="customer-progress-step">
                                    <ul>
                                        <li>
                                            <span>1</span>
                                            <p>Guest Information</p>
                                        </li>
                                        <li>
                                            <span>2</span>
                                            <p>Payment</p>
                                        </li>
                                        <li>
                                            <span>3</span>
                                            <p>Confirmation</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- customer-details-area-end -->
    <!-- customer_id AccountId firstname lastname gender email phone -->
    <!-- nhập dữ liệu mới trong bảng customer -->
    <!-- booking-details-area -->
    <section class="booking-details-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-73">
                    <div class="primary-contact">
                        <i class="fa-regular fa-user"></i>
                        <h2 class="title">Primary Contact</h2>
                    </div>
                    <div class="booking-details-wrap">
                        <form method="POST" action="{{ route('processBooking') }}">
                            @csrf
                            <ul>
                                <li>
                                    <div class="form-grp">
                                        <div class="icon">
                                            <i class="flaticon-user-1"></i>
                                        </div>
                                        <div class="form">
                                            <input type="text" name="firstname" placeholder="First Name">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-grp">
                                        <input type="text" name="lastname" placeholder="Last Name *">
                                    </div>
                                </li>
                            </ul>
                            <div class="form-grp">
                                <label for="gender">Gender*</label>
                                <select id="gender" name="gender" class="form-select" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <div class="icon">
                                            <i class="flaticon-telephone-call"></i>
                                        </div>
                                        <div class="form">
                                            <input type="number" name="phone" placeholder="Mobile Number *">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <div class="icon">
                                            <i class="flaticon-calendar"></i>
                                        </div>
                                        <div class="form">
                                            <label for="dob">Date of Birth</label>
                                            <input type="text" name="dob" class="date" placeholder="Select Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <div class="icon">
                                            <i class="flaticon-arroba"></i>
                                        </div>
                                        <div class="form">
                                            <label for="email">Your Email</label>
                                            <input type="email" name="email" id="email" placeholder="youinfo@gmail.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp checkbox-grp">
                                <input type="checkbox" id="checkbox">
                                <label for="checkbox">Add this person to passenger quick pick list</label>
                            </div>
                            <button type="submit" class="btn">Pay now</button>
                        </form>
                    </div>
                </div>
                <div class="col-27">
                    <aside class="booking-sidebar">
                        <h2 class="main-title">Booking Info</h2>
                        <div class="widget">
                            <ul class="flight-info">
                                <li><img src="{{asset('assets/img/icon/sidebar_flight_icon.jpg')}}" alt="">
                                    <p>{{date('h : i A' , strtotime($rs->departure))}} <span>{{$rs->FromPlace}}</span></p>
                                </li>
                                <li>
                                    <p>{{date('h : i A' , strtotime($rs->arrival))}} <span>{{$rs->ToPlace}}</span></p>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h2 class="widget-title">Select Discount Option</h2>
                            <form action="#" class="discount-form">
                                <i class="flaticon-coupon"></i>
                                <input type="text" placeholder="Enter Code">
                                <button type="submit"><i class="flaticon-tick-1"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <h2 class="widget-title">Your Preferred Bank</h2>
                            <ul class="preferred-bank-wrap">
                                <li><a href="#"><img src="{{asset('assets/img/images/bank_logo01.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('assets/img/images/bank_logo02.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('assets/img/images/bank_logo03.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('assets/img/images/bank_logo04.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('assets/img/images/bank_logo05.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('assets/img/images/bank_logo06.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h2 class="widget-title">Your price summary</h2>
                            <div class="price-summary-top">
                                <ul>
                                    <li>Details</li>
                                    <li>Amount</li>
                                </ul>
                            </div>
                            <div class="price-summary-detail">
                                <ul>
                                    <li>Adult x 1 <span>$1,056</span></li>
                                    <li>Tax x 1 <span>$35</span></li>
                                    <li>Total Airfare: <span>$1,091</span></li>
                                    <li>Discount<span>- $110</span></li>
                                    <li>Total Payable<span>$981.00</span></li>
                                </ul>
                                <a href="#" class="btn">Book Now</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- booking-details-area-end -->

</main>
<!-- main-area-end -->
@endsection