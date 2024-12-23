@extends('client.layouts.master')
@section('main')
    <div class="slider-area">
        <div class="slider">
            <div id="bg-slider" class="owl-carousel owl-theme">

                <div class="item"><img src="{{url('')}}/cassets/img/slide1/slider-image-2.jpg" alt="The Last of us"></div>
                <div class="item"><img src="{{url('')}}/cassets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>

            </div>
        </div>
        <div class="container slider-content">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                    <h2>property Searching Just Got So Easy</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi
                        sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>

                </div>
            </div>
        </div>
    </div>

    <div class="home-lager-shearch" style="background-color: rgb(252, 252, 252); padding-top: 25px; margin-top: -125px;">
        <div class="container">
            <div class="col-md-12 large-search">
                <div class="search-form wow pulse">
                    <form action="" class=" form-inline">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Key word">
                            </div>
                            <div class="col-md-4">
                                <select id="lunchBegins" class="selectpicker" data-live-search="true"
                                    data-live-search-style="begins" title="Select your city">
                                    <option>New york, CA</option>
                                    <option>Paris</option>
                                    <option>Casablanca</option>
                                    <option>Tokyo</option>
                                    <option>Marraekch</option>
                                    <option>kyoto , shibua</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="basic" class="selectpicker show-tick form-control">
                                    <option> -Status- </option>
                                    <option>Rent </option>
                                    <option>Boy</option>
                                    <option>used</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="search-row">

                                <div class="col-sm-3">
                                    <label for="price-range">Price range ($):</label>
                                    <input type="text" class="span2" value="" data-slider-min="0"
                                        data-slider-max="600" data-slider-step="5" data-slider-value="[0,450]"
                                        id="price-range"><br />
                                    <b class="pull-left color">2000$</b>
                                    <b class="pull-right color">100000$</b>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <label for="property-geo">Property geo (m2) :</label>
                                    <input type="text" class="span2" value="" data-slider-min="0"
                                        data-slider-max="600" data-slider-step="5" data-slider-value="[50,450]"
                                        id="property-geo"><br />
                                    <b class="pull-left color">40m</b>
                                    <b class="pull-right color">12000m</b>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <label for="price-range">Min baths :</label>
                                    <input type="text" class="span2" value="" data-slider-min="0"
                                        data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]"
                                        id="min-baths"><br />
                                    <b class="pull-left color">1</b>
                                    <b class="pull-right color">120</b>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <label for="property-geo">Min bed :</label>
                                    <input type="text" class="span2" value="" data-slider-min="0"
                                        data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]"
                                        id="min-bed"><br />
                                    <b class="pull-left color">1</b>
                                    <b class="pull-right color">120</b>
                                </div>
                                <!-- End of  -->

                            </div>

                            <div class="search-row">

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Fire Place(3100)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Dual Sinks(500)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Hurricane Shutters(99)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Swimming Pool(1190)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> 2 Stories(4600)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Emergency Exit(200)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Laundry Room(10073)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Jog Path(1503)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> 26' Ceilings(1200)
                                        </label>
                                    </div>
                                </div>
                                <!-- End of  -->
                            </div>
                        </div>
                        <div class="center">
                            <input type="submit" value="" class="btn btn-default btn-lg-sheach">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- property area -->
    <div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>Top submitted property</h2>
                    <p>Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies .
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="proerty-th">
                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html"><img src="{{url('')}}/cassets/img/demo/property-1.jpg"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="property-1.html">Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>Area :</b> 120m </span>
                                <span class="proerty-price pull-right">$ 300,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-2.html"><img src="{{url('')}}/cassets/img/demo/property-2.jpg"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="property-2.html">Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>Area :</b> 120m </span>
                                <span class="proerty-price pull-right">$ 300,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-3.html"><img src="{{url('')}}/cassets/img/demo/property-3.jpg"></a>

                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="property-3.html">Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>Area :</b> 120m </span>
                                <span class="proerty-price pull-right">$ 300,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html"><img src="{{url('')}}/cassets/img/demo/property-4.jpg"></a>

                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="property-1.html">Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>Area :</b> 120m </span>
                                <span class="proerty-price pull-right">$ 300,000</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-3.html"><img src="{{url('')}}/cassets/img/demo/property-2.jpg"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="property-3.html">Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>Area :</b> 120m </span>
                                <span class="proerty-price pull-right">$ 300,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-2.html"><img src="{{url('')}}/cassets/img/demo/property-4.jpg"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="property-2.html">Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>Area :</b> 120m </span>
                                <span class="proerty-price pull-right">$ 300,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="property-1.html"><img src="{{url('')}}/cassets/img/demo/property-3.jpg"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="property-1.html">Super nice villa </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>Area :</b> 120m </span>
                                <span class="proerty-price pull-right">$ 300,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-tree more-proerty text-center">
                            <div class="item-tree-icon">
                                <i class="fa fa-th"></i>
                            </div>
                            <div class="more-entry overflow">
                                <h5><a href="property-1.html">CAN'T DECIDE ? </a></h5>
                                <h5 class="tree-sub-ttl">Show all properties</h5>
                                <button class="btn border-btn more-black" value="All properties">All properties</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Welcome area -->
    <div class="Welcome-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 Welcome-entry  col-sm-12">
                    <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                        <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                    <!-- /.feature title -->
                                    <h2>GARO ESTATE </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                            <div class="row">
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-home pe-4x"></i>
                                        </div>
                                        <h3>Any property</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-users pe-4x"></i>
                                        </div>
                                        <h3>More Clients</h3>
                                    </div>
                                </div>


                                <div class="col-xs-12 text-center">
                                    <i class="welcome-circle"></i>
                                </div>

                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-notebook pe-4x"></i>
                                        </div>
                                        <h3>Easy to use</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-help2 pe-4x"></i>
                                        </div>
                                        <h3>Any help </h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--TESTIMONIALS -->
    <div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>Our Customers Said </h2>
                </div>
            </div>

            <div class="row">
                <div class="row testimonial">
                    <div class="col-md-12">
                        <div id="testimonial-slider">
                            <div class="item">
                                <div class="client-text">
                                    <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                    <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                                </div>
                                <div class="client-face wow fadeInRight" data-wow-delay=".9s">
                                    <img src="{{url('')}}/cassets/img/client-face1.png" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-text">
                                    <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                    <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                                </div>
                                <div class="client-face">
                                    <img src="{{url('')}}/cassets/img/client-face2.png" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-text">
                                    <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                    <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                                </div>
                                <div class="client-face">
                                    <img src="{{url('')}}/cassets/img/client-face1.png" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-text">
                                    <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                    <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                                </div>
                                <div class="client-face">
                                    <img src="{{url('')}}/cassets/img/client-face2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Count area -->
    <div class="count-area">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>You can trust Us </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="count-item">
                                <div class="count-item-circle">
                                    <span class="pe-7s-users"></span>
                                </div>
                                <div class="chart" data-percent="5000">
                                    <h2 class="percent" id="counter">0</h2>
                                    <h5>HAPPY CUSTOMER </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="count-item">
                                <div class="count-item-circle">
                                    <span class="pe-7s-home"></span>
                                </div>
                                <div class="chart" data-percent="12000">
                                    <h2 class="percent" id="counter1">0</h2>
                                    <h5>Properties in stock</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="count-item">
                                <div class="count-item-circle">
                                    <span class="pe-7s-flag"></span>
                                </div>
                                <div class="chart" data-percent="120">
                                    <h2 class="percent" id="counter2">0</h2>
                                    <h5>City registered </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="count-item">
                                <div class="count-item-circle">
                                    <span class="pe-7s-graph2"></span>
                                </div>
                                <div class="chart" data-percent="5000">
                                    <h2 class="percent" id="counter3">5000</h2>
                                    <h5>DEALER BRANCHES</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- boy-sale area -->
    <div class="boy-sale-area">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                    <div class="asks-first">
                        <div class="asks-first-circle">
                            <span class="fa fa-search"></span>
                        </div>
                        <div class="asks-first-info">
                            <h2>ARE YOU LOOKING FOR A Property?</h2>
                            <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                        </div>
                        <div class="asks-first-arrow">
                            <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                    <div class="asks-first">
                        <div class="asks-first-circle">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="asks-first-info">
                            <h2>DO YOU WANT TO SELL A Property?</h2>
                            <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                        </div>
                        <div class="asks-first-arrow">
                            <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p class="asks-call">QUESTIONS? CALL US : <span class="strong"> + 3-123- 424-5700</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
