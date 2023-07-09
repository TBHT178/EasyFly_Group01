@extends('layout.main')

@section('content')
<section class="section section-lg section-main-bunner section-main-bunner-filter text-center">
        <div class="main-bunner-img" style="background-image: url('images/banner.jpg'); background-size: cover;"></div>
        <div class="main-bunner-inner">
          <div class="container">
            <div class="box-default">
              <h1 class="box-default-title">Welcome to FlyEasy</h1>
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
              <form  class="rd-form rd-mailform " action="#">
                <div class="form-group border-bottom d-flex align-items-center justify-content-between flex-wrap">
                  <label class="option my-sm-0 my-2">
                    <input  onchange="hdl_change(this)" type="radio" name="trip" value="oneway" checked id="opt_1"> One way<br>
                      <span class="checkmark"></span>
                  </label>
                  <label class="option my-sm-0 my-2" onclick="hdl_change();">
                    <input  onchange="hdl_change(this)" id="opt_2" type="radio" name="trip" value="round" > Round Trip<br>
                      <span class="checkmark"></span>
                  </label>                    
              </div>
                <div class="form-group d-sm-flex margin">
                    <div class="d-flex align-items-center flex-fill me-sm-1 my-sm-0 my-4 border-bottom position-relative">
                        <input type="text" required placeholder="From" class="form-control">
                        <div class="label" id="from"></div>
                        <span class="fas fa-dot-circle text-muted"></span>
                    </div>
                    <div class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 border-bottom position-relative">
                        <input type="text" required placeholder="To" class="form-control">
                        <div class="label" id="to"></div>
                        <span class="fas fa-map-marker text-muted"></span>
                    </div>
                </div>
                <div class="form-group d-sm-flex margin">
                  <div class="d-flex align-items-center flex-fill me-sm1 my-sm-0 border-bottom position-relative">
                      <input type="date" required placeholder="Depart Date" class="form-control">
                      <div class="label" id="depart"></div>
                  </div>
                  <div  id="date2" style="visibility:hidden" class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 border-bottom position-relative" >
                      <input type="date" required placeholder="Return Date" class="form-control">
                      <div class="label" id="return"></div>
                  </div>
              </div>
                <div class="form-group border-bottom d-flex align-items-center position-relative">
                    <input type="text" required placeholder="Traveller(s)" class="form-control">
                    <div class="label" id="psngr"></div>
                    <span class="fas fa-users text-muted"></span>
                </div>
                <div class="form-group my-3">
                    <div class="btn btn-primary rounded-0 d-flex justify-content-center text-center p-3">Search Flights
                    </div>
                </div>
                </form>
              </div>
            </form>  
            </div>
          </div>
        </section>
        <section class="section section-lg section-inset-1 bg-gray-1 pt-lg-0">
          <div class="container">
            <div class="row row-50 justify-content-xl-between align-items-lg-center">
              <div class="col-lg-6 wow fadeInLeft">
                <div class="box-image"><img class="box-image-static" src="images/home-3-1-483x327.jpg" alt="" width="483" height="327"/><img class="box-image-position" src="images/home-3-2-341x391.png" alt="" width="341" height="391"/>
                </div>
              </div>
              <div class="col-lg-6 col-xl-5 wow fadeInRight">
                <h2>About Us</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente accusamus dignissimos debitis, reprehenderit labore et? Expedita, porro cumque voluptas voluptatum tenetur rem? Sint, nam suscipit tempora consectetur nemo modi exercitationem.</p>
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
                <h2>Popular cities right now</h2>
                <p class="text-opacity-80">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, neque esse repellat animi tenetur sit quos praesentium! Temporibus neque numquam id. Possimus molestias eaque amet reiciendis sint tempora itaque laudantium?</p>
              </div>
            </div>
          </div>
          <div class="row row-20 row-lg-30">
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="product-featured">
                  <div class="product-featured-figure"><img src="images/product-1-370x395.jpg" alt="" width="370" height="395"/>
                    <div class="product-featured-button"><a class="button button-primary" href="#">Explore</a></div>
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
                  <div class="product-featured-figure"><img src="images/product-2-370x395.jpg" alt="" width="370" height="395"/>
                    <div class="product-featured-button"><a class="button button-primary" href="#">Explore</a></div>
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
                  <div class="product-featured-figure"><img src="images/product-3-370x395.jpg" alt="" width="370" height="395"/>
                    <div class="product-featured-button"><a class="button button-primary" href="#">Explore</a></div>
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
          <h2 class="text-center wow slideInDown" style="margin-top: 10px;" >Recent News</h2>
          <!-- Owl Carousel-->
          <div class="owl-carousel wow fadeInUp" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="false">
            <div class="post-corporate"><a class="badge" href="#">Jul 02, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Genuine Italian Pizza: Authenticity and Choice</a></h4>
              <div class="post-corporate-text">
                <p>As an Italian restaurant, we are very proud of our delicious authentic pizzas. Our three most popular choices are the Rustica, the Toscana and...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Jul 12, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Italian vs. American Spaghetti: Top 5 Differences</a></h4>
              <div class="post-corporate-text">
                <p>Commonly, when we hear there is spaghetti for dinner we will be expecting a red tomato sauce with meat and seasonings poured over long...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">aug 02, 2019</a>
              <h4 class="post-corporate-title"><a href="#">The Delicious History of Lasagna and Its Origins</a></h4>
              <div class="post-corporate-text">
                <p>Lasagna, could there be a more perfect dish? It’s comfort food on steroids. Layers of cheese generously piled on top of decadent amounts...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Aug 15, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Making Gelato Like a True Italian: Tips From Our Chef</a></h4>
              <div class="post-corporate-text">
                <p>Most would agree that gelato is the most delicious frozen dessert; the perfect ending to any meal. With origins in Sicily, gelato has been made famous...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Sep 15, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Italian Ingredients You Can Easily Grow at Home</a></h4>
              <div class="post-corporate-text">
                <p>Imagine preparing an Italian dinner but having to stop cooking because you forget an ingredient and must run to the store. How nice would it be to go...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Sep 28, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Our Brief Guide to Pairing Wine and Pasta the Right Way</a></h4>
              <div class="post-corporate-text">
                <p>To Italians, pasta is the food of the gods, and there is nothing better to go with a good pasta than a perfect wine. To the uninitiated, finding the right...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Oct 05, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Top 10 Famous Spring Dishes in Italian Restaurants</a></h4>
              <div class="post-corporate-text">
                <p>Spring is the time for growth and rebirth. One can see this throughout the countrysides of Italy with blooming flowers and budding trees. Springtime is...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Oct 17, 2019</a>
              <h4 class="post-corporate-title"><a href="#">What Makes Some Seasonings Truly Italian?</a></h4>
              <div class="post-corporate-text">
                <p>When thinking of Italian cuisine, dishes like pasta enveloped in hearty sauces come to mind. Certain flavors seem to be found across the different...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Nov 10, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Types of Italian Sausage and Why They Are Different</a></h4>
              <div class="post-corporate-text">
                <p>There are many types of Italian sausage. The main difference in Italian sausage when compared to other sausages is the seasoning. The particular...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
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