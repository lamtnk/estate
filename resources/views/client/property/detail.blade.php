@extends('client.layouts.master')
@section('styles')
    <style>
        /* Cố định kích thước ảnh chính trong slider */
        #image-gallery img {
            width: 100%;
            /* Chiều rộng đầy đủ của slider */
            height: 400px;
            /* Bạn có thể điều chỉnh chiều cao theo ý muốn */
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo và giữ tỷ lệ */
        }

        /* Cố định kích thước thumbnail */
        #image-gallery .lSSlideOuter {
            width: 80px;
            /* Chiều rộng của thumbnail */
            height: 60px;
            /* Chiều cao của thumbnail */
            display: flex;
            justify-content: center;
            /* Canh giữa thumbnail */
            align-items: center;
            /* Canh giữa thumbnail */
        }

        /* Cố định kích thước ảnh trong thumbnail và đảm bảo ảnh không bị méo */
        #image-gallery .lSSlide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Đảm bảo ảnh thumbnail không bị kéo dãn */
            object-position: center;
            /* Canh giữa ảnh */
        }
    </style>
@endsection
@section('main')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ $property->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
        <div class="container">

            <div class="clearfix padding-top-40">

                <div class="col-md-8 single-property-content prp-style-2">
                    <div class="">
                        <div class="row">
                            <div class="light-slide-item">
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>

                                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                        @foreach ($property->images as $image)
                                            <li data-thumb="{{ asset($image->image_path) }}">
                                                <img src="{{ asset($image->image_path) }}" alt="Property Image" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-property-wrapper">

                            <div class="section">
                                <h4 class="s-property-title">Mô Tả</h4>
                                <div class="s-property-content">
                                    <p>{{ $property->description }}</p>
                                </div>
                            </div>
                            <!-- End description area  -->

                            <div class="section additional-details">

                                <h4 class="s-property-title">Thông Tin Chi Tiết</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Thuộc dự án</span>
                                        <span
                                            class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->project->name }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Loại hình bất động sản</span>
                                        <span
                                            class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->propertyType->name }}</span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Mã bất động sản</span>
                                        <span
                                            class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->unit_code }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Tên bất động sản</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->name }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Diện tích</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->area }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Mặt tiền sử dụng</span>
                                        <span
                                            class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->floor_1_area }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Số tầng</span>
                                        <span
                                            class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->number_of_floors }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Số phòng ngủ</span>
                                        <span
                                            class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->bedrooms }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Số phòng tắm</span>
                                        <span
                                            class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->bathrooms }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Chỗ đỗ xe</span>
                                        <span
                                            class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->parking }}</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Tình trạng</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">
                                            @if ($property->status == 'red book')
                                                Đã có sổ đỏ
                                            @elseif ($property->status == 'pending red book')
                                                Đang chờ sổ đỏ
                                            @elseif ($property->status == 'sale contract')
                                                Hợp đồng mua bán
                                            @else
                                                Trích đo
                                            @endif
                                        </span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Loại hình giao dịch</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">
                                            @if ($property->deal_type == 'sell')
                                                Giao bán
                                            @else
                                                Cho thuê
                                            @endif
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <!-- End additional-details area  -->

                            <div class="section property-features">
                                <h4 class="s-property-title">Nội dung chi tiết</h4>
                                {!! $property->content !!}
                            </div>
                            <!-- End features area  -->

                            <div class="section property-video">
                                <h4 class="s-property-title">Video</h4>
                                <div class="video-thumb">
                                    <a class="video-popup" href="yout" title="Virtual Tour">
                                        <img src="{{ asset('cassets/img/property-video.jpg') }}"
                                            class="img-responsive wp-post-image" alt="Exterior">
                                    </a>
                                </div>
                            </div>
                            <!-- End video area  -->

                            <div class="section property-share">
                                <h4 class="s-property-title">Chia sẻ </h4>
                                <div class="roperty-social">
                                    <ul>
                                        <li><a title="Share this on dribbble " href="#"><img
                                                    src="{{ asset('cassets/img/social_big/dribbble_grey.png') }}"></a></li>
                                        <li><a title="Share this on facebok " href="#"><img
                                                    src="{{ asset('cassets/img/social_big/facebook_grey.png') }}"></a></li>
                                        <li><a title="Share this on delicious " href="#"><img
                                                    src="{{ asset('cassets/img/social_big/delicious_grey.png') }}"></a>
                                        </li>
                                        <li><a title="Share this on tumblr " href="#"><img
                                                    src="{{ asset('cassets/img/social_big/tumblr_grey.png') }}"></a></li>
                                        <li><a title="Share this on digg " href="#"><img
                                                    src="{{ asset('cassets/img/social_big/digg_grey.png') }}"></a></li>
                                        <li><a title="Share this on twitter " href="#"><img
                                                    src="{{ asset('cassets/img/social_big/twitter_grey.png') }}"></a></li>
                                        <li><a title="Share this on linkedin " href="#"><img
                                                    src="{{ asset('cassets/img/social_big/linkedin_grey.png') }}"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End share area  -->
                        </div>
                    </div>

                    <div class="similar-post-section padding-top-40">
                        <div id="prop-smlr-slide_0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html"><img src="assets/img/similar/property-1.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html"> Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> 120m </span>
                                    <span class="proerty-price pull-right"> $ 300,000</span>
                                </div>
                            </div>
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html"><img src="assets/img/similar/property-2.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html"> Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> 120m </span>
                                    <span class="proerty-price pull-right"> $ 300,000</span>
                                </div>
                            </div>
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html"><img src="assets/img/similar/property-3.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html"> Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> 120m </span>
                                    <span class="proerty-price pull-right"> $ 300,000</span>
                                </div>
                            </div>
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html"><img src="assets/img/similar/property-1.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html"> Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> 120m </span>
                                    <span class="proerty-price pull-right"> $ 300,000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p0">
                    <aside class="sidebar sidebar-property blog-asside-right property-style2">
                        <div class="dealer-widget">
                            <div class="dealer-content">
                                <div class="inner-wrapper">
                                    <div class="single-property-header">
                                        <h1 class="property-title">{{ $property->name }}</h1>
                                        {{-- @if ($property->status == 'red book')
                                            <h1 class="property-title">Đã có sổ đỏ</h1>
                                        @elseif ($property->status == 'pending red book')
                                            <h1 class="property-title">Đang chờ sổ đỏ</h1>
                                        @elseif ($property->status == 'sale contract')
                                            <h1 class="property-title">Hợp đồng mua bán</h1>
                                        @else
                                            <h1 class="property-title">Trích đo</h1>
                                        @endif --}}
                                        <span class="property-price">
                                            @if ($property->price_type == 3)
                                                Thỏa thuận
                                            @else
                                                {{ number_format($property->price, 0, ',', '.') }} VND
                                            @endif
                                        </span>
                                    </div>

                                    <div class="property-meta entry-meta clearfix ">

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-tag">
                                                @if ($property->deal_type == 'sell')
                                                    <img src="{{ asset('cassets/img/icon/sale-orange.png') }}">
                                                @else
                                                    <img src="{{ asset('cassets/img/icon/rent-orange.png') }}">
                                                @endif
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">Hợp đồng</span>
                                                @if ($property->deal_type == 'sell')
                                                    <span class="property-info-value">Giao bán</span>
                                                @else
                                                    <span class="property-info-value">Cho thuê</span>
                                                @endif
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info icon-area">
                                                <img src="{{ asset('cassets/img/icon/room-orange.png') }}">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">Diện tích</span>
                                                <span class="property-info-value">
                                                    {{ $property->area }}<bclass="property-info-unit">m2</bclass=>
                                                </span>
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-bed">
                                                <img src="{{ asset('cassets/img/icon/bed-orange.png') }}">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">Phòng ngủ</span>
                                                <span class="property-info-value">{{ $property->bedrooms }}</span>
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-bath">
                                                <img src="{{ asset('cassets/img/icon/shawer-orange.png') }}">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">Phòng tắm</span>
                                                <span class="property-info-value">{{ $property->bathrooms }}</span>
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-garage">
                                                <img src="{{ asset('cassets/img/icon/cars-orange.png') }}">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">Chỗ đỗ xe</span>
                                                <span class="property-info-value">{{ $property->parking }}</span>
                                            </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ads her </h3>
                            </div>
                            <div class="panel-body recent-property-widget">
                                <img src="{{ asset('cassets/img/pro-ads.jpg') }}" alt="Image">
                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Smart search</h3>
                            </div>
                            <div class="panel-body search-widget">
                                <form action="" class=" form-inline">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" placeholder="Key word">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-6">

                                                <select id="lunchBegins" class="selectpicker" data-live-search="true"
                                                    data-live-search-style="begins" title="Select Your City">

                                                    <option>New york, CA</option>
                                                    <option>Paris</option>
                                                    <option>Casablanca</option>
                                                    <option>Tokyo</option>
                                                    <option>Marraekch</option>
                                                    <option>kyoto , shibua</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-6">

                                                <select id="basic" class="selectpicker show-tick form-control">
                                                    <option> -Status- </option>
                                                    <option>Rent </option>
                                                    <option>Boy</option>
                                                    <option>used</option>

                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price-range">Price range ($):</label>
                                                <input type="text" class="span2" value="" data-slider-min="0"
                                                    data-slider-max="600" data-slider-step="5"
                                                    data-slider-value="[0,450]" id="price-range"><br />
                                                <b class="pull-left color">2000$</b>
                                                <b class="pull-right color">100000$</b>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="property-geo">Property geo (m2) :</label>
                                                <input type="text" class="span2" value="" data-slider-min="0"
                                                    data-slider-max="600" data-slider-step="5"
                                                    data-slider-value="[50,450]" id="property-geo"><br />
                                                <b class="pull-left color">40m</b>
                                                <b class="pull-right color">12000m</b>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price-range">Min baths :</label>
                                                <input type="text" class="span2" value="" data-slider-min="0"
                                                    data-slider-max="600" data-slider-step="5"
                                                    data-slider-value="[250,450]" id="min-baths"><br />
                                                <b class="pull-left color">1</b>
                                                <b class="pull-right color">120</b>
                                            </div>

                                            <div class="col-xs-6">
                                                <label for="property-geo">Min bed :</label>
                                                <input type="text" class="span2" value="" data-slider-min="0"
                                                    data-slider-max="600" data-slider-step="5"
                                                    data-slider-value="[250,450]" id="min-bed"><br />
                                                <b class="pull-left color">1</b>
                                                <b class="pull-right color">120</b>

                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" checked>Fire Place</label>
                                                </div>
                                            </div>

                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox">Dual Sinks</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" checked>Swimming Pool</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" checked>2 Stories </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Laundry Room </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox">Emergency Exit</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" checked>Jog Path </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox">26' Ceilings </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox">Hurricane Shutters </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input class="button btn largesearch-btn" value="Search" type="submit">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                    </aside>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 9,
                slideMargin: 0,
                speed: 500,
                auto: true,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                },
                thumbMargin: 10, // Thêm khoảng cách giữa các thumbnail
            });
        });
    </script>
@endsection
