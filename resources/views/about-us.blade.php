@extends('layout.main')

@section('content')
      <section class="parallax-container overlay-1" data-parallax-img="images/breadcrumbs.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">About Us</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.html">Home</a></li>
                  <li class="active">About Us</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-gray-1">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6 pr-xl-5"><img src="images/about-us-1-518x434.jpg" alt="" width="518" height="434"/>
            </div>
            <div class="col-lg-6">
              <h2>About EasyFly</h2>
              <div class="text-with-divider">
                <div class="divider"></div>
                <h4>We offer the best service in a friendly and calm atmosphere.</h4>
              </div>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit qui facilis nesciunt labore quos. Dolorem soluta odit, odio voluptatum incidunt commodi nostrum perspiciatis amet veritatis velit, natus nulla veniam quasi!</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-white">
        <div class="container">
          <h2 class="text-center">Why People Choose Us</h2>
          <div class="row row-30 row-md-60">
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-triangle"><span class="icon-xl restaurant-icon-30"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">Complete travel solution</a></h4>
                  <p>Morbi tristique senectus et netus et malesuada fames ac turpis.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-circle"><span class="icon-xl restaurant-icon-11"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">Safe and flexible payment methods</a></h4>
                  <p>Cum resistentia mori, omnes elevatuses imperium plac.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-rectangle"><span class="icon-xl restaurant-icon-36"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">24/7 customer support</a></h4>
                  <p>Cum consilium accelerare, omnes absolutioes quaestio fatalis.</p>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </section>
      <section class="parallax-container" data-parallax-img="images/parallax-img-4.jpg">
        <div class="parallax-content section-xl context-dark text-center bg-dark-filter bg-dark-filter-2">
          <div class="container">
            <h2>Testimonials</h2>
            <!-- Slick Carousel-->
            <div class="slick-slider carousel-parent slick-style-1" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ea omnis nihil iusto, earum repudiandae corporis molestias sequi magni. Obcaecati blanditiis harum dolorum eum sequi porro illo delectus dolores sed!</p>
                  </div>
                  <div class="testimonials-modern-name">Joanna Smith</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ea omnis nihil iusto, earum repudiandae corporis molestias sequi magni. Obcaecati blanditiis harum dolorum eum sequi porro illo delectus dolores sed!</p>
                  </div>
                  <div class="testimonials-modern-name">James Williams</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ea omnis nihil iusto, earum repudiandae corporis molestias sequi magni. Obcaecati blanditiis harum dolorum eum sequi porro illo delectus dolores sed!</p>
                  </div>
                  <div class="testimonials-modern-name">Kate McMillan</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ea omnis nihil iusto, earum repudiandae corporis molestias sequi magni. Obcaecati blanditiis harum dolorum eum sequi porro illo delectus dolores sed!</p>
                  </div>
                  <div class="testimonials-modern-name">Peter Wilson</div>
                </div>
              </div>
            </div>
            <div class="slick-slider slider-dots" id="child-carousel" data-for=".carousel-parent" data-arrows="false" data-loop="false" data-dots="false" data-swipe="true" data-items="4" data-xs-items="4" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-slide-to-scroll="1">
              <div class="item">
                <div class="slick-dot-item"><img src="images/user-1-60x60.jpg" alt="" width="60" height="60"/>
                </div>
              </div>
              <div class="item">
                <div class="slick-dot-item"><img src="images/user-2-60x60.jpg" alt="" width="60" height="60"/>
                </div>
              </div>
              <div class="item">
                <div class="slick-dot-item"><img src="images/user-3-60x60.jpg" alt="" width="60" height="60"/>
                </div>
              </div>
              <div class="item">
                <div class="slick-dot-item"><img src="images/user-4-60x60.jpg" alt="" width="60" height="60"/>
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
            <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/clients-1-270x119.png" alt="" width="270" height="119"/></a></div>
            <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/clients-2-270x119.png" alt="" width="270" height="119"/></a></div>
            <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/clients-3-270x119.png" alt="" width="270" height="119"/></a></div>
            <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/clients-4-270x119.png" alt="" width="270" height="119"/></a></div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
@endsection