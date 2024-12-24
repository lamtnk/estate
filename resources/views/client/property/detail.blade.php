@extends('client.layouts.master')
@section('styles')
    <style>
        /* Cố định kích thước ảnh chính trong slider */
        #image-gallery img {
            width: 100%;
            /* Chiều rộng đầy đủ của slider */
            height: 360px;
            /* Bạn có thể điều chỉnh chiều cao theo ý muốn */
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo và giữ tỷ lệ */
            object-position: center;
            /* Căn giữa ảnh */
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

        .form-toggle {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 0px 15px;
            margin: 0px;
            cursor: pointer;
            border-radius: 5px;
            min-width: 175px;
        }

        .form-toggle:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        select.form-select,
        input.form-control {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1.5rem;
            height: calc(4rem + 2px);
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            background-color: #fff;
        }

        select.form-select:focus,
        input.form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        /* Ẩn nút trên thông tin chung khi ở điện thoại */
        @media (max-width: 768px) {
            .property-action-buttons {
                display: none;
            }

            .fixed-action-buttons {
                position: fixed;
                bottom: 10px;
                left: 0;
                width: 100%;
                z-index: 1000;
                display: flex;
                justify-content: space-around;
            }

            .fixed-action-buttons .form-toggle {
                min-width: 130px;
            }

            .fixed-action-buttons .form-toggle h6 {
                font-size: 11px;
            }
        }

        /* Hiển thị nút trên thông tin chung khi ở máy tính */
        @media (min-width: 769px) {
            .fixed-action-buttons {
                display: none;
            }

            .property-action-buttons {
                display: block;
            }
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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="clearfix padding-top-20">

                <div class="single-property-content prp-style-1">
                    <div class="row">
                        <div class="col-md-6">
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
                                        @if ($property->images->isEmpty())
                                            <li data-thumb="{{ asset('https://placehold.co/600x400') }}">
                                                <img src="{{ asset('https://placehold.co/600x400') }}"
                                                    alt="Property Image" />
                                            </li>
                                        @else
                                            @foreach ($property->images as $image)
                                                <li data-thumb="{{ asset($image->image_path) }}">
                                                    <img src="{{ asset($image->image_path) }}" alt="Property Image" />
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-property-header">
                                <h1 class="property-title">{{ $property->name }}</h1>

                                <div>
                                    <span>
                                        <img src="{{ asset('cassets/img/icon/location.png') }}">
                                        {{ $property->project->location }}
                                    </span>
                                </div>

                                <div>
                                    <span style="margin: 0px 5px">Mã Căn: <b>{{ $property->unit_code }}</b></span>
                                    <span style="margin: 0px 5px">Dự Án: <b>{{ $property->project->name }}</b></span>
                                </div>
                                <hr style="margin: 10px 0">

                                <span class="property-price">
                                    @if ($property->deal_type == 'rent')
                                        {{ $property->price_formatted }} /tháng
                                    @else
                                        @if ($property->price_type == 1)
                                            {{ $property->price_formatted }}
                                        @elseif ($property->price_type == 2)
                                            {{ $property->price_formatted * $property->area }}
                                        @else
                                            Giá thỏa thuận
                                        @endif
                                    @endif
                                </span>

                            </div>
                            <hr style="margin: 10px 0">

                            <div class="property-meta entry-meta clearfix" style="padding: 10px 0px">

                                <div class="col-xs-3 col-sm-3 col-md-3 p-b-15" style="padding: 0px">
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

                                <div class="col-xs-3 col-sm-3 col-md-3 p-b-15" style="padding: 0px">
                                    <span class="property-info-icon icon-bed">
                                        <img src="{{ asset('cassets/img/icon/bed-orange.png') }}">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Phòng ngủ</span>
                                        <span class="property-info-value">{{ $property->bedrooms }} phòng</span>
                                    </span>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3 p-b-15" style="padding: 0px">
                                    <span class="property-info-icon icon-garage">
                                        <img src="{{ asset('cassets/img/icon/compass-orange.png') }}">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Hướng</span>
                                        <span class="property-info-value">{{ $property->direction_vn }}</span>
                                    </span>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3 p-b-15" style="padding: 0px">
                                    <span class="property-info-icon icon-bath">
                                        <img src="{{ asset('cassets/img/icon/sofa-orange.png') }}">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Nội thất</span>
                                        <span class="property-info-value">{{ $property->furniture_vn }}</span>
                                    </span>
                                </div>

                            </div>
                            <!-- .property-meta -->

                            <div class="property-action-buttons">
                                <button class="form-toggle">
                                    <a href="tel:0123456789" style="color: #fff;">
                                        <h6><img src="{{ asset('cassets/img/icon/phone.png') }}"> Gọi ngay 24/7</h6>
                                    </a>
                                </button>

                                <button class="form-toggle" data-toggle="modal" data-target="#consultationFormModal"
                                    style="background-color: #dc3545">
                                    <h6><img src="{{ asset('cassets/img/icon/email.png') }}"> Nhận tư vấn</h6>
                                </button>

                                <button class="form-toggle" data-toggle="modal" data-target="#visitFormModal"
                                    style="background-color: #198754">
                                    <h6><img src="{{ asset('cassets/img/icon/calendar.png') }}"> Tham quan</h6>
                                </button>
                            </div>

                        </div>
                    </div><br>

                    <div class="single-property-wrapper">

                        <div class="section additional-details">

                            <h4 class="s-property-title">Thông Tin Chung</h4>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td><strong>Thuộc dự án</strong></td>
                                        <td>{{ $property->project->name }}</td>
                                        <td><strong>Mặt tiền</strong></td>
                                        <td>{{ $property->frontage }} mặt</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Loại hình</strong></td>
                                        <td>{{ $property->propertyType->name }}</td>
                                        <td><strong>Phòng ngủ</strong></td>
                                        <td>{{ $property->bedrooms }} phòng</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mã căn</strong></td>
                                        <td>{{ $property->unit_code }}</td>
                                        <td><strong>Hướng nhà</strong></td>
                                        <td>{{ $property->direction_vn }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diện tích đất</strong></td>
                                        <td>{{ $property->area }} m2</td>
                                        <td><strong>Nội thất</strong></td>
                                        <td>{{ $property->furniture_vn }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diện tích xây dựng</strong></td>
                                        <td>{{ $property->floor_1_area }} m2</td>
                                        <td><strong>Tình trạng</strong></td>
                                        <td>
                                            @if ($property->status == 'red book')
                                                Đã có sổ đỏ
                                            @elseif ($property->status == 'pending red book')
                                                Đang chờ sổ đỏ
                                            @elseif ($property->status == 'sale contract')
                                                Hợp đồng mua bán
                                            @else
                                                Trích đo
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Số tầng</strong></td>
                                        <td>{{ $property->number_of_floors }} tầng</td>
                                        <td><strong>Giao dịch</strong></td>
                                        <td>
                                            @if ($property->deal_type == 'sell')
                                                Giao bán
                                            @else
                                                Cho thuê
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End additional-details area  -->

                        <div class="section">
                            <h4 class="s-property-title">Mô Tả</h4>
                            <div class="s-property-content">
                                <p>{{ $property->description }}</p>
                            </div>
                        </div>
                        <!-- End description area  -->

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
                                                <img
                                                    src="{{ asset($relatedProperty->primaryImage->image_path ?? 'https://placehold.co/600x400') }}">
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
                                                </b>{{ $relatedProperty->area }}m2</span>
                                            <span class="proerty pull-right">
                                                @if ($relatedProperty->deal_type == 'rent')
                                                    {{ $relatedProperty->price_formatted }} /tháng
                                                @else
                                                    @if ($relatedProperty->price_type == 1)
                                                        {{ $relatedProperty->price_formatted }}
                                                    @elseif ($relatedProperty->price_type == 2)
                                                        {{ $relatedProperty->price_formatted * $relatedProperty->area }}
                                                    @else
                                                        Giá thỏa thuận
                                                    @endif
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

    <!-- Modal consultation Submit -->
    <div class="modal fade" id="consultationFormModal" tabindex="-1" role="dialog"
        aria-labelledby="consultationFormModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="contact-form" method="POST"
                        action="{{ route('client.property.detail.submit', $property->id) }}">
                        @csrf
                        <h3 class="text-center">Gửi yêu cầu tư vấn</h3><br>
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <input type="hidden" name="visit_type" value="none">
                        <input type="hidden" name="request_type" value="consultation">
                        <input type="hidden" name="status" value="0">

                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Họ và Tên" required>
                        </div>

                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" class="form-control"
                                placeholder="Số điện thoại" required>
                        </div>

                        <div class="form-group">
                            <select class="form-select" id="purpose" name="purpose" required>
                                <option value="">Mục đích mua</option>
                                <option value="residential">Mua để ở</option>
                                <option value="investment">Mua để đầu tư</option>
                            </select>
                        </div>

                        <label for="">Thời gian nhận hỗ trợ tư vấn</label>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="date" id="date" name="date" class="form-control"
                                    placeholder="Ngày" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="time" id="time" name="time" class="form-control"
                                    placeholder="Giờ" required>
                            </div>
                        </div>

                        <label for="">Yêu cầu tư vấn</label>
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" class="form-toggle">
                            <h6>Gửi</h6>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal visit Submit -->
    <div class="modal fade" id="visitFormModal" tabindex="-1" role="dialog" aria-labelledby="visitFormModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="contact-form" method="POST"
                        action="{{ route('client.property.detail.submit', $property->id) }}">
                        @csrf
                        <h3 class="text-center">Đăng ký thăm quan căn hộ</h3><br>
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <input type="hidden" name="purpose" value="none">
                        <input type="hidden" name="request_type" value="visit">
                        <input type="hidden" name="status" value="0">

                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Họ và Tên" required>
                        </div>

                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" class="form-control"
                                placeholder="Số điện thoại" required>
                        </div>

                        <label for="">Hình thức tham quan</label>
                        <div class="form-group">
                            <select class="form-select" id="visit_type" name="visit_type" required>
                                <option value="">Hình thức thăm quan</option>
                                <option value="direct">Trải nghiệm thực tế</option>
                                <option value="video call">Call video trực tiếp</option>
                            </select>
                        </div>

                        <label for="">Thời gian tham quan</label>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="date" id="date" name="date" class="form-control"
                                    placeholder="Ngày" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="time" id="time" name="time" class="form-control"
                                    placeholder="Giờ" required>
                            </div>
                        </div>

                        <label for="">Ghi chú</label>
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" rows="4"></textarea>
                        </div>

                        <button type="submit" class="form-toggle">
                            <h6>Gửi</h6>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-action-buttons">
        <button class="form-toggle">
            <a href="tel:0123456789" style="color: #fff;">
                <h6><img src="{{ asset('cassets/img/icon/phone-small.png') }}"> Gọi ngay 24/7</h6>
            </a>
        </button>

        <button class="form-toggle" data-toggle="modal" data-target="#consultationFormModal"
            style="background-color: #dc3545">
            <h6><img src="{{ asset('cassets/img/icon/email-small.png') }}"> Nhận tư vấn</h6>
        </button>

        <button class="form-toggle" data-toggle="modal" data-target="#visitFormModal" style="background-color: #198754">
            <h6><img src="{{ asset('cassets/img/icon/calendar-small.png') }}"> Tham quan</h6>
        </button>
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
