@extends('layout.main')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <section class="section section-lg section-main-bunner section-main-bunner-filter text-center">
        <div class="main-bunner-img" style="background-image: url('images/banner.jpg'); background-size: cover;"></div>
        <div class="main-bunner-inner">
            <div class="container">
                <div class="box-default">
                    <h1 class="box-default-title">Fly easy with EasyFly</h1>
                    <div class="box-default-decor"></div>
                    <p class="big box-default-text">Start your travel with us</p>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-gray-1">
        <section class="section-transform-top">
            <div class="container">
                <div class="box-booking">
                    <form class="" action="#" method="POST">
                        <label class="option my-sm-0 my-2">
                            <input onchange="hdl_change(this)" type="radio" name="trip" value="oneway" checked
                                id="opt_1"> One way<br>
                            <input onclick="hdl_change();" onchange="hdl_change(this)" id="opt_2" type="radio"
                                name="trip" value="round"> Roundtrip<br>
                        </label>
                        <div class="fields">
                            <div class="input-field">
                                <label for="">From</label>
                                <select name="flyfrom">
                                    <option selected="true" disabled="disabled"> Choose destination </option>
                                    @foreach ($airports as $key => $value)
                                        <option value="{{ $value->airport_code }}"> {{ $value->airport_name }}, {{ $value->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="">To</label>
                                <select name="flyto">
                                    <option selected="true" disabled="disabled"> Choose destination </option>
                                    @foreach ($airports as $key => $value)
                                    <option value="{{ $value->airport_code }}"> {{ $value->airport_name }}, {{ $value->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="">
                                    No. of Passengers
                                </label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="input-field">
                                <label for="">Departure Date</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="input-field" id="date2" style="visibility:hidden">
                                <label for="">Return Date</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="input-field">
                                <label for="">Seat Class</label>
                                <input type="text" name="" id="">
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <div class="btn btn-primary rounded-0 d-flex justify-content-center text-center p-3">
                                Search Flights
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <section class="section section-lg section-inset-1 bg-gray-1 pt-lg-0">
        <div class="container" style="margin-top:-100px;">
            <div class="row row-50 justify-content-xl-between align-items-lg-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="box-image"><img class="box-image-static" src="images/aboutus.jpg" alt=""
                            width="1200" height="600" />
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 wow fadeInRight">
                    <h2>About us</h2>
                    <p>We are EasyFly - a 5-star oriented airline delivering you more than just a flight</p>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- Featured Offers-->
    <section class="section section-lg bg-default">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-9 col-lg-7 wow-outer">
                    <div class="wow slideInDown">
                        <h2>Most-loved cities</h2>
                        <p class="text-opacity-80">Famous cities in Vietnam</p>
                    </div>
                </div>
            </div>
            <div class="row row-20 row-lg-30">
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure cover object"><img src="images/saigon.jpg" alt=""
                                    width="370" height="395" />
                                <div class="product-featured-button"><a class="button button-primary"
                                        href="#">Explore</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Ho Chi Minh</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure cover object"><img src="images/danang.jpg" alt=""
                                    width="370" height="450" />
                                <div class="product-featured-button"><a class="button button-primary"
                                        href="#">Explore</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Da Nang</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure"><img src="images/hanoi.jpg" alt=""
                                    width="370" height="395" />
                                <div class="product-featured-button"><a class="button button-primary"
                                        href="#">Explore</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Hanoi</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-lg bg-default bg-gray-1 ">
        <div class="container wow-outer">
            <h2 class="text-center wow slideInDown" style="margin-top: 50px;">Read on and kickstart your adventure</h2>
            <!-- Owl Carousel-->
            <div class="owl-carousel wow fadeInUp" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true"
                data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="">
                <div class="card h-100" style="width:100%">
                    <a href="#">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img alt="Card image cap" class="card-img-top embed-responsive-item"
                                src="images/newzealand.jpg" />
                        </div>
                        <div class="card-body">
                            Getting Around Christchurch, New Zealand
                    </a>
                    <p class="card-text">Christchurch is one of the largest cities on New Zealand’s South Island. The city
                        is famous for
                        its natural scenery and island, such a great option to spend your summer. This city also offers
                        many transportation options to get around.</p>
                </div>
            </div>
            <div class="card" style="width:100%">
                <a href="#">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img alt="Card image cap" class="card-img-top embed-responsive-item" src="images/london.jpg" />
                    </div>
                    <div class="card-body">
                        Getting Around London, England
                </a>
                <p class="card-text">
                    London offers various world-class tourism themes for its tourists, from historical tourist sites
                    to romantic tourist attractions and even UNESCO's world heritage sites. Though London was once
                    nicknamed "The Smoke City" due to its smoky air</p>
            </div>
        </div>
        <div class="card h-100" style="width:100%">
            <a href="#">
                <div class="embed-responsive embed-responsive-16by9">
                    <img alt="Card image cap" class="card-img-top embed-responsive-item" src="images/hochiminh.jpg" />
                </div>
                <div class="card-body">
                    Ho Chi Minh City Nightlife: Where Nighttime Comes
                    Alive
            </a>
            <p class="card-text">Ho Chi Minh City Nightlife - Welcome to Ho Chi Minh City, a vibrant metropolis that truly
                comes
                alive after dark. The city's nightlife scene is a captivating blend of energy, excitement, and
                entertainment.</p>
        </div>
        </div>
        <div class="card" style="width:100%">
            <a href="#">
                <div class="embed-responsive embed-responsive-16by9">
                    <img alt="Card image cap" class="card-img-top embed-responsive-item" src="images/indonesia.jpg" />
                </div>
                <div class="card-body">
                    Getting Around Salatiga, Indonesia
            </a>
            <p class="card-text">Salatiga is an excellent destination to visit in Central Java. Here, you can enjoy the
                fantastic
                natural scenery and explore historical sites. Although Salatiga might not be as famous as Jogja
                or Semarang, it is worth a visit.</p>
        </div>
        </div>
        </div>
        </div>
    </section>
    <script>
        function hdl_change(e) {
            document.getElementById('date2').style.visibility =
                e.checked && e.id == 'opt_2' ? 'visible' : 'hidden';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
