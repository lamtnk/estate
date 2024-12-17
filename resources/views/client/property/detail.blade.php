@extends('client.layouts.master')
@section('styles')
    <style>
        /* Cố định kích thước ảnh chính trong slider */
        #image-gallery img {
            width: 100%;
            /* Chiều rộng đầy đủ của slider */
            height: 500px;
            /* Bạn có thể điều chỉnh chiều cao theo ý muốn */
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo và giữ tỷ lệ */
            object-position: center;
            /* Căn giữa ảnh */
        }

        /* Tùy chỉnh mũi tên điều hướng */
        .lSAction>a {
            font-size: 30px;
            /* Kích thước biểu tượng mũi tên */
            color: #000000;
            /* Màu sắc của mũi tên */
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .lSAction>a:hover {
            color: #fff;
            /* Màu mũi tên khi hover */
        }

        .additional-details-list li {
            display: flex;
            align-items: stretch;
            /* Đảm bảo các cột đều chiều cao */
        }

        .additional-details-list .add-d-title {
            display: flex;
            align-items: center;
        }

        .video-thumb img {
            width: 100%;
            /* Đảm bảo ảnh chiếm toàn bộ chiều rộng container */
            height: 100%;
            /* Đảm bảo ảnh chiếm toàn bộ chiều cao container */
            object-fit: cover;
            /* Phóng to ảnh, giữ tỷ lệ và cắt phần thừa */
            object-position: center;
            /* Canh giữa ảnh trong container */
        }

        .similar-post-section .item-thumb img {
            width: 100%;
            height: 200px;
            /* Hoặc chiều cao bạn muốn */
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo */
            object-position: center;
            /* Căn giữa ảnh */
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

            <div class="clearfix padding-top-20">

                <div class="col-md-12 single-property-content prp-style-1">
                    <div class="row">
                        <div class="col-md-8 p0">
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
                        <div class="col-md-4 p0">
                            <div class="dealer-widget" style="margin: 0; height: 500px">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
                                        <div class="single-property-header">
                                            <h1 class="property-title">{{ $property->name }}</h1>

                                            <span class="property-price">
                                                @if ($property->price_type == 1)
                                                    {{ number_format($property->price, 0, ',', '.') }} VND
                                                @elseif ($property->price_type == 2)
                                                    {{ number_format($property->price * $property->area, 0, ',', '.') }} VND
                                                @else
                                                    Thỏa thuận
                                                @endif
                                            </span>
                                        </div>

                                        <div class="property-meta entry-meta clearfix">

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
                                                <span class="property-info-icon icon-bed">
                                                    <img src="{{ asset('cassets/img/icon/os-orange.png') }}">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Loại nhà đất</span>
                                                    <span
                                                        class="property-info-value">{{ $property->propertyType->name }}</span>
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
                                        <!-- .property-meta -->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>

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
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->unit_code }}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Tên bất động sản</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->name }}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Diện tích Đất</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->area }}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Diện tích Xây Dựng</span>
                                    <span
                                        class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->floor_1_area }}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Mặt tiền sử dụng</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->frontage }}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Số tầng</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->number_of_floors }}
                                        tầng</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Số phòng ngủ</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->bedrooms }}
                                        phòng</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Số phòng tắm</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->bathrooms }}
                                        phòng</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Chỗ đỗ xe</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $property->parking }}</span>
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

                        <div class="similar-post-section padding-top-20">
                            <div id="prop-smlr-slide_0">
                                @foreach ($properties as $relatedProperty)
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="{{ route('client.property.detail', $relatedProperty->id) }}">
                                                <img src="{{ asset($relatedProperty->primaryImage->image_path) }}">
                                            </a>
                                        </div>
                                        <div class="item-entry overflow">
                                            <h5
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                                <a href="{{ route('client.property.detail', $relatedProperty->id) }}">
                                                    {{ $relatedProperty->name }}
                                                </a>
                                            </h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b>Diện tích:
                                                </b>{{ $relatedProperty->area }}m2</span><br>
                                            <span class="proerty pull-left">
                                                @if ($relatedProperty->price_type == 1)
                                                    {{ number_format($relatedProperty->price, 0, ',', '.') }} VND
                                                @elseif ($relatedProperty->price_type == 2)
                                                    {{ number_format($relatedProperty->price * $relatedProperty->area, 0, ',', '.') }}
                                                    VND
                                                @else
                                                    Thỏa thuận
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#image-gallery').lightSlider({
                gallery: false, // Ẩn/Hiện thumbnail
                item: 1, // Hiển thị 1 ảnh trên slider
                slideMargin: 0, // Loại bỏ khoảng cách giữa các slide
                speed: 500, // Tốc độ chuyển slide
                auto: true, // Tự động chạy slider
                loop: true, // Lặp lại slider
                controls: true, // Hiển thị nút điều hướng
                prevHtml: '<i class="fa fa-chevron-left"></i>', // Mũi tên trái
                nextHtml: '<i class="fa fa-chevron-right"></i>', // Mũi tên phải
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endsection
