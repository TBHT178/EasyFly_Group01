@extends('layout.main')

@section('content')
    <section class="section section-lg section-main-bunner section-main-bunner-filter text-center">
        <div class="main-bunner-img" style="background-image: url('images/banner.jpg'); background-size: cover;"></div>
        <div class="main-bunner-inner">
            <div class="container">
                <div class="box-default">
                    <h1 class="box-default-title">Chào mừng quý khách</h1>
                    <div class="box-default-decor"></div>
                    <p class="big box-default-text">Đặt vé máy bay dễ dàng với EasyFly</p>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-gray-1">
        <section class="section-transform-top">
            <div class="container">
                <div class="box-booking">
                    <form class="" action="#">
                        {{-- <div class="form-group border-bottom d-flex align-items-center justify-content-between flex-wrap">
                            <label class="option my-sm-0 my-2">
                                <input onchange="hdl_change(this)" type="radio" name="trip" value="oneway" checked
                                    id="opt_1"> Một chiều<br>
                                <input onclick="hdl_change();" onchange="hdl_change(this)" id="opt_2" type="radio"
                                    name="trip" value="round"> Khứ hồi<br>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group d-sm-flex margin">
                            <div class="d-flex align-items-center flex-fill me-sm-1 my-sm-0 my-4 position-relative">
                                <input type="text" required placeholder="From" class="form-control">
                                <div class="label" id="from"></div>
                                <span class="fas fa-dot-circle text-muted"></span>
                            </div>
                            <div class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 position-relative">
                                <input type="text" required placeholder="To" class="form-control">
                                <div class="label" id="to"></div>
                                <span class="fas fa-map-marker text-muted"></span>
                            </div>
                        </div>
                        <div class="form-group d-sm-flex margin">
                            <div class="d-flex align-items-center flex-fill me-sm1 my-sm-0 position-relative">
                                <input type="date" required placeholder="Depart Date" class="form-control">
                                <div class="label" id="depart"></div>
                            </div>
                            <div id="date2" style="visibility:hidden"
                                class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 position-relative">
                                <input type="date" required placeholder="Return Date" class="form-control">
                                <div class="label" id="return"></div>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center position-relative">
                            <input type="text" required placeholder="Traveller(s)" class="form-control">
                            <div class="label" id="psngr"></div>
                            <span class="fas fa-users text-muted"></span>
                        </div>
                        <div class="form-group my-3">
                            <div class="btn btn-primary rounded-0 d-flex justify-content-center text-center p-3">Tìm chuyến
                                bay
                            </div>
                        </div> --}}
                        <label class="option my-sm-0 my-2">
                            <input onchange="hdl_change(this)" type="radio" name="trip" value="oneway" checked
                                id="opt_1"> Một chiều<br>
                            <input onclick="hdl_change();" onchange="hdl_change(this)" id="opt_2" type="radio"
                                name="trip" value="round"> Khứ hồi<br>
                        </label>
                        <div class="fields">
                            <div class="input-field">
                                <label for="">Từ</label>
                                <input type="text" name="" id="" >
                            </div>
                            <div class="input-field">
                                <label for="">Đến</label>
                                <input type="text" name="" id="" >
                            </div>
                            <div class="input-field">
                                <label for="">Số hành khách</label>
                                <input type="text" name="" id="" >
                            </div>
                            <div class="input-field">
                                <label for="">Ngày đi</label>
                                <input type="text" name="" id="" >
                            </div>
                            <div class="input-field" id="date2" style="visibility:hidden">
                                <label for="">Khứ hồi</label>
                                <input type="text" name="" id="" >
                            </div>
                            <div class="input-field">
                                <label for="">Hạng ghế</label>
                                <input type="text" name="" id="" >
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <div class="btn btn-primary rounded-0 d-flex justify-content-center text-center p-3">Tìm chuyến
                                bay
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
                    <h2>Về chúng tôi</h2>
                    <p>FlyEasy là công ty có trụ sở ở Việt Nam chuyên cung cấp dịch vụ đặt vé máy bay trực tuyến</p>
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
                        <h2>Khám phá điểm đến</h2>
                        <p class="text-opacity-80">Các điểm đến hot nhất hiện nay</p>
                    </div>
                </div>
            </div>
            <div class="row row-20 row-lg-30">
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure cover object"><img src="images/saigon.jpg" alt=""
                                    width="370" height="395" />
                                <div class="product-featured-button"><a class="button button-primary" href="#">Khám
                                        phá</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Hồ Chí Minh</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure cover object"><img src="images/danang.jpg" alt=""
                                    width="370" height="450"/>
                                <div class="product-featured-button"><a class="button button-primary" href="#">Khám
                                        phá</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Đà Nẵng</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure"><img src="images/hanoi.jpg" alt=""
                                    width="370" height="395" />
                                <div class="product-featured-button"><a class="button button-primary" href="#">Khám
                                        phá</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Hà Nội</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-lg bg-default bg-gray-1 ">
        <div class="container wow-outer">
            <h2 class="text-center wow slideInDown" style="margin-top: 50px;">Tin gần đây</h2>
            <!-- Owl Carousel-->
            <div class="owl-carousel wow fadeInUp" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true"
                data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="false">
                <div class="post-corporate">
                    <h4 class="post-corporate-title"><a href="#">Độc đáo tranh làng Sình, nét đẹp hội hoạ dân gian Việt</a>
                    </h4>
                    <div class="post-corporate-text">
                        <p>As an Italian restaurant, we are very proud of our delicious authentic pizzas. Our three most
                            popular choices are the Rustica, the Toscana and...</p>
                    </div>
                </div>
                <div class="post-corporate">
                  <h4 class="post-corporate-title"><a href="#">Thành Nhà Hồ - Tòa thành đá hiếm hoi còn sót lại trên thế giới</a>
                  </h4>
                  <div class="post-corporate-text">
                      <p>As an Italian restaurant, we are very proud of our delicious authentic pizzas. Our three most
                          popular choices are the Rustica, the Toscana and...</p>
                  </div>
              </div>
              <div class="post-corporate">
                <h4 class="post-corporate-title"><a href="#">Nên chọn quốc gia nào khi lên kế hoạch du lịch châu Âu?</a>
                </h4>
                <div class="post-corporate-text">
                    <p>As an Italian restaurant, we are very proud of our delicious authentic pizzas. Our three most
                        popular choices are the Rustica, the Toscana and...</p>
                </div>
            </div>
            <div class="post-corporate">
              <h4 class="post-corporate-title"><a href="#">Chợ Đông Ba - Chốn “ăn chơi” hấp dẫn các du khách nước ngoài</a>
              </h4>
              <div class="post-corporate-text">
                  <p>As an Italian restaurant, we are very proud of our delicious authentic pizzas. Our three most
                      popular choices are the Rustica, the Toscana and...</p>
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
@endsection
