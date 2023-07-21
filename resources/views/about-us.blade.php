@extends('layout.main')

@section('content')
    <section class="parallax-container overlay-1" data-parallax-img="images/aboutus.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9">
                        <h2 class="breadcrumbs-custom-title">About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-lg bg-gray-1">
        <div class="container">
            <div class="row row-50">
                <div class="col-lg-6 pr-xl-5"><img src="images/aboutus-2.jpg" alt="" width="518"
                        height="434" />
                </div>
                <div class="col-lg-6">
                    <h2>About EasyFly</h2>
                    <div class="text-with-divider">
                        <div class="divider"></div>
                        <h4>More than just a flight</h4>
                    </div>
                    <p>Established in 2017 and officially taking off on January 16, 2019, EasyFly is the first private
                        airline in Vietnam to provide high-quality services under the traditional model (Full-Service
                        Carrier).</p>
                    <p>On the journey to explore the sky, EasyFly has connected potential destinations, thereby bringing
                        good values of Vietnamese culture and people to the rest of the world.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-lg bg-white">
        <div class="container">
            <h2 class="text-center">Why book with EasyFly?</h2>
            <div class="row row-30 row-md-60">
                <div class="col-md-6 col-lg-4">
                    <div class="box-icon-modern">
                        <div class="box-icon-inner decorate-triangle"><span class="icon-xl restaurant-icon-30"></span></div>
                        <div class="box-icon-caption">
                            <h4><a href="#">Cheap price everyday</a></h4>
                            <p>The price you see is the price you paid! Quick comparison with no hidden fees! </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="box-icon-modern">
                        <div class="box-icon-inner decorate-circle"><span class="icon-xl restaurant-icon-11"></span></div>
                        <div class="box-icon-caption">
                            <h4><a href="#">
                                    Safe and flexible payment methods</a></h4>
                            <p>Safe online transactions with many options such as convenience store payment, bank transfer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="box-icon-modern">
                        <div class="box-icon-inner decorate-rectangle"><span class="icon-xl restaurant-icon-36"></span>
                        </div>
                        <div class="box-icon-caption">
                            <h4><a href="#">24/7 customer support</a></h4>
                            <p>Customer support staff is always ready to help you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-lg bg-gray-1 text-center">
        <div class="container">
            <h2>Our Awards</h2>
            <div class="row row-30">
                <div class="col-6 col-md-3"><a class="clients-default" href="#">
                    <img src="images/award-1.jpeg"
                            alt="" width="270" height="119" />
                            <p>Vietnam E-Commerce Awards 2016</p>
                        </a>
                </div>
                <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/award-2.jpeg"
                            alt="" width="270" height="119" />
                            <p>Google Vietnam Play Store</p>
                        </a>
                </div>
                <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/award-3.jpeg"
                            alt="" width="270" height="119" />
                            <p>Vietnam Top Brand Awards</p>
                        </a>
                </div>
                <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/award-4.jpeg"
                            alt="" width="270" height="119" />
                            <p>Millennials first choice Top brand</p>
                        </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Footer-->
@endsection
