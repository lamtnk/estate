<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="GARO is a real-estate template">
    <meta name="author" content="Kimarotec">
    <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

    <!-- Place favicon.ico  the root directory -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ url('') }}/cassets/css/normalize.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/fontello.css">
    <link href="{{ url('') }}/cassets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="{{ url('') }}/cassets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
    <link href="{{ url('') }}/cassets/css/animate.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ url('') }}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/icheck.min_all.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/price-range.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/owl.theme.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/lightslider.min.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/style.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/responsive.css">
    <link rel="stylesheet" href="{{ url('') }}/cassets/css/custom-navbar.css">


    <!-- Thêm CSS từ section 'styles' nếu có -->
    @yield('styles')
</head>

<body>

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Body content -->


    {{-- <div class="header-connect">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-8  col-xs-12">
                    <div class="header-half header-call">
                        <p>
                            <span><i class="pe-7s-call"></i> +1 234 567 7890</span>
                            <span><i class="pe-7s-mail"></i> your@company.com</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                    <div class="header-half header-social">
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-vine"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--End top header -->

    <nav class="navbar navbar-default ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('client.home.index') }}"><img
                        src="{{ url('') }}/cassets/img/logo.png" width="10%" alt=""></a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse yamm" id="navigation">
        <ul class="main-nav nav navbar-nav navbar-right">
            <li class="wow fadeInDown" data-wow-delay="0.1s"><a class=""
                    href="{{ route('client.home.index') }}">Trang chủ</a></li>
            <li class="wow fadeInDown" data-wow-delay="0.1s"><a class=""
                    href="{{ route('client.project.index') }}">Dự án</a></li>
            <li class="wow fadeInDown" data-wow-delay="0.1s"><a class=""
                    href="{{ route('client.property.index') }}">Bất động sản</a></li>
            <li class="wow fadeInDown" data-wow-delay="0.1s"><a class=""
                    href="{{ route('client.news.index') }}">Tin tức</a></li>
            <li class="wow fadeInDown" data-wow-delay="0.4s"><a href="{{ route('client.contact.index') }}">Liên
                    hệ</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
    <!-- End of nav bar -->

    @yield('main');

    <!-- Footer area-->
    <div class="footer-area">

        <div class=" footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                        <div class="single-footer">
                            <h4>Về chúng tôi </h4>
                            <div class="footer-title-line"></div>

                            <img src="{{ url('') }}/cassets/img/footer-logo.png" alt=""
                                class="wow pulse" data-wow-delay="1s">
                            <p>Tài Lộc Property là một công ty chuyên cung cấp các dịch vụ bất động sản uy tín và
                                chuyên nghiệp. Với sứ mệnh mang lại giá trị bền vững cho khách hàng, chúng tôi tự hào là
                                đối tác đáng tin cậy trong việc tư vấn, mua bán, cho thuê và đầu tư bất động sản.</p>
                            <ul class="footer-adress">
                                <li><i class="pe-7s-map-marker strong"> </i> 9089 your adress her</li>
                                <li><i class="pe-7s-mail strong"> </i> email@yourcompany.com</li>
                                <li><i class="pe-7s-call strong"> </i> 0936 622 111</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                        <div class="single-footer">
                            <h4>Truy cập nhanh </h4>
                            <div class="footer-title-line"></div>
                            <ul class="footer-menu">
                                <li><a href="#">Bất động sản</a> </li>
                                <li><a href="#">Dự án</a> </li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">FAQ</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                        <div class="single-footer">
                            <h4>Last News</h4>
                            <div class="footer-title-line"></div>
                            <ul class="footer-blog">
                                <li>
                                    <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                        <a href="single.html">
                                            <img src="{{ url('') }}/cassets/img/demo/small-proerty-2.jpg">
                                        </a>
                                        <span class="blg-date">12-12-2016</span>

                                    </div>
                                    <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                        <h6> <a href="single.html">Add news functions </a></h6>
                                        <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet,
                                            nulla ...</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                        <a href="single.html">
                                            <img src="{{ url('') }}/cassets/img/demo/small-proerty-2.jpg">
                                        </a>
                                        <span class="blg-date">12-12-2016</span>

                                    </div>
                                    <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                        <h6> <a href="single.html">Add news functions </a></h6>
                                        <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet,
                                            nulla ...</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                        <a href="single.html">
                                            <img src="{{ url('') }}/cassets/img/demo/small-proerty-2.jpg">
                                        </a>
                                        <span class="blg-date">12-12-2016</span>

                                    </div>
                                    <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                        <h6> <a href="single.html">Add news functions </a></h6>
                                        <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet,
                                            nulla ...</p>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                        <div class="single-footer news-letter">
                            <h4>Kết nối với chúng tôi</h4>
                            <div class="footer-title-line"></div>
                            <p>Chúng tôi luôn sẵn sàng lắng nghe ý kiến và hỗ trợ bạn. Hãy kết nối với chúng tôi qua các
                                kênh mạng xã hội, email hoặc hotline để nhận được sự tư vấn và giải đáp nhanh chóng.
                                Đừng ngần ngại liên hệ, vì sự hài lòng của bạn là ưu tiên hàng đầu của chúng tôi.</p>

                            <form>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="E-mail ... ">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary subscribe" type="button"><i
                                                class="pe-7s-paper-plane pe-2x"></i></button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </form>

                            <div class="social pull-right">
                                <ul>
                                    <li><a class="wow fadeInUp animated"
                                            href="https://www.facebook.com/p/T%C3%A0i-L%E1%BB%99c-Property-61561046392320/?locale=nn_NO"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a class="wow fadeInUp animated"
                                            href="https://www.facebook.com/p/T%C3%A0i-L%E1%BB%99c-Property-61561046392320/?locale=nn_NO"
                                            data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="wow fadeInUp animated"
                                            href="hhttps://www.facebook.com/p/T%C3%A0i-L%E1%BB%99c-Property-61561046392320/?locale=nn_NO"
                                            data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="wow fadeInUp animated"
                                            href="https://www.facebook.com/p/T%C3%A0i-L%E1%BB%99c-Property-61561046392320/?locale=nn_NO"
                                            data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                                    <li><a class="wow fadeInUp animated"
                                            href="https://www.facebook.com/p/T%C3%A0i-L%E1%BB%99c-Property-61561046392320/?locale=nn_NO"
                                            data-wow-delay="0.6s"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-copy text-center">
            <div class="container">
                <div class="row">
                    <div class="pull-left">
                        <span> (C) <a href="http://www.KimaroTec.com">FPT Polytechnic</a> , All rights reserved 2024
                        </span>
                    </div>
                    <div class="bottom-menu pull-right">
                        <ul>
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s">Home</a></li>
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s">Property</a>
                            </li>
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.4s">Faq</a></li>
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ url('') }}/cassets/js/modernizr-2.6.2.min.js"></script>

    <script src="{{ url('') }}/cassets/js/jquery-1.10.2.min.js"></script>
    <script src="{{ url('') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/cassets/js/bootstrap-select.min.js"></script>
    <script src="{{ url('') }}/cassets/js/bootstrap-hover-dropdown.js"></script>

    <script src="{{ url('') }}/cassets/js/easypiechart.min.js"></script>
    <script src="{{ url('') }}/cassets/js/jquery.easypiechart.min.js"></script>

    <script src="{{ url('') }}/cassets/js/owl.carousel.min.js"></script>

    <script src="{{ url('') }}/cassets/js/wow.js"></script>

    <script src="{{ url('') }}/cassets/js/icheck.min.js"></script>
    <script src="{{ url('') }}/cassets/js/price-range.js"></script>
    <script type="text/javascript" src="{{ url('') }}/cassets/js/lightslider.min.js"></script>
    <script src="{{ url('') }}/cassets/js/main.js"></script>
    <script src="{{ url('') }}/cassets/js/custom-navbar.js"></script>

    <!-- Thêm script JS từ section 'scripts' nếu có -->
    @yield('scripts')
</body>

</html>
