@extends('client.layouts.master')
@section('title')
    {{ 'Trang chủ' }}
@endsection
@section('main')
    <div class="slider-area">
        <div class="slider">
            <div id="bg-slider" class="owl-carousel owl-theme">

                <div class="item"><img src="{{ url('') }}/cassets/img/slide1/slider-image-2.jpg" alt="The Last of us">
                </div>
                <div class="item"><img src="{{ url('') }}/cassets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>

            </div>
        </div>
        <div class="container slider-content">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                    <h2>Tìm kiếm bất động sản trở nên dễ dàng hơn bao giờ hết</h2>
                    <p>Khám phá những cơ hội đầu tư bất động sản tuyệt vời với
                        chúng tôi. Dù bạn
                        đang tìm kiếm một ngôi nhà
                        mơ ước hay một cơ hội đầu tư sinh lời, chúng tôi luôn sẵn sàng hỗ trợ bạn!</p>
                </div>
            </div>
        </div>
        <div class="home-lager-shearch custom-background">
            <div class="container">
                <div class="col-md-12 large-search">
                    <div class="search-form wow pulse">
                        <form action="{{ route('client.property.index') }}" method="get" class="form-inline">
                            <div class="col-md-12">
                                <!-- Tìm kiếm theo từ khóa -->
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa"
                                        value="{{ request('keyword') }}"
                                        style="border: 1px solid #ccc; border-radius: 5px;">
                                </div>

                                <!-- Khu vực -->
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="location" placeholder="Thành phố"
                                        value="{{ request('location') }}"
                                        style="border: 1px solid #ccc; border-radius: 5px; color: #000;">
                                </div>

                                <!-- Dự án -->
                                <div class="col-md-4">
                                    <select name="project" class="selectpicker show-tick form-control"
                                        data-live-search="true" title="Dự án"
                                        style="border: 1px solid #ccc; border-radius: 5px; color: #000;">
                                        <option value="">Tất cả</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12"><br>
                                <!-- Loại hình giao dịch -->
                                <div class="col-md-3">
                                    <select name="deal_type" class="selectpicker show-tick form-control"
                                        data-live-search="true" title="Loại hình giao dịch"
                                        style="border: 1px solid #ccc; border-radius: 5px; color: #000;">
                                        <option value="">Tất cả</option>
                                        <option value="sell">Giao bán</option>
                                        <option value="rent">Cho thuê</option>
                                    </select>
                                </div>

                                <!-- Loại hình bất động sản -->
                                <div class="col-md-3">
                                    <select name="property_type" class="selectpicker show-tick form-control"
                                        data-live-search="true" title="Loại hình bất động sản"
                                        style="border: 1px solid #ccc; border-radius: 5px; color: #000;">
                                        <option value="">Tất cả</option>
                                        @foreach ($propertyTypes as $propertyType)
                                            <option value="{{ $propertyType->id }}">{{ $propertyType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Nội thất -->
                                <div class="col-md-3">
                                    <select name="furniture" class="selectpicker show-tick form-control"
                                        data-live-search="true" title="Nội thất"
                                        style="border: 1px solid #ccc; border-radius: 5px; color: #000;">
                                        <option value="">Tất cả</option>
                                        <option value="Bare Shell">Bàn giao thô</option>
                                        <option value="Basic Furnished">Nội thất cơ bản</option>
                                        <option value="Fully Furnished">Nội thất đầy đủ</option>
                                        <option value="Luxury Furnished">Nội thất cao cấp</option>
                                    </select>
                                </div>

                                <!-- Hướng -->
                                <div class="col-md-3">
                                    <select name="direction" class="selectpicker show-tick form-control"
                                        data-live-search="true" title="Hướng"
                                        style="border: 1px solid #ccc; border-radius: 5px; color: #000;">
                                        <option value="">Tất cả</option>
                                        <option value="East">Đông</option>
                                        <option value="West">Tây</option>
                                        <option value="South">Nam</option>
                                        <option value="North">Bắc</option>
                                        <option value="Southeast">Đông Nam</option>
                                        <option value="Northeast">Đông Bắc</option>
                                        <option value="Southwest">Tây Nam</option>
                                        <option value="Northwest">Tây Bắc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="search-row">
                                    <!-- Giá bán -->
                                    <div class="col-sm-4">
                                        <label for="price-range">Khoảng giá (VNĐ):</label><br>
                                        <div class="col-xs-6" style="padding-left: 0">
                                            <input type="number" class="form-control" name="price_min" placeholder="Từ"
                                                value="" min="0">
                                        </div>
                                        <div class="col-xs-6" style="padding-left: 0">
                                            <input type="number" class="form-control" name="price_max"
                                                placeholder="Đến" value="" min="0">
                                        </div>
                                    </div>

                                    <!-- Diện tích -->
                                    <div class="col-sm-4">
                                        <label for="property-geo">Diện tích (m2):</label><br>
                                        <div class="col-xs-6" style="padding-left: 0">
                                            <input type="number" class="form-control" name="area_min" placeholder="Từ"
                                                value="" min="0">
                                        </div>
                                        <div class="col-xs-6" style="padding-left: 0">
                                            <input type="number" class="form-control" name="area_max" placeholder="Đến"
                                                value="" min="0">
                                        </div>
                                    </div>

                                    <!-- Số phòng ngủ tối thiểu -->
                                    <div class="col-sm-4">
                                        <label for="price-range">Số phòng ngủ tối thiểu :</label>
                                        <input type="number" class="form-control" name="bedrooms"
                                            placeholder="Số phòng ngủ" value="" min="1">
                                    </div>
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
                        <h2>Top các bất động sản hàng đầu</h2>
                        <p>Khám phá những bất động sản hàng đầu với chúng tôi. Chúng tôi cung cấp những lựa chọn tốt nhất để
                            bạn có thể tìm thấy ngôi nhà mơ ước hoặc cơ hội đầu tư hoàn hảo.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="proerty-th">
                        @foreach ($topProperties as $property)
                            <div class="col-sm-6 col-md-3 p0">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="property-1.html"><img
                                                src="{{ asset($property->primaryImage->image_path ?? 'https://placehold.co/400x400') }}"></a>
                                    </div>
                                    <div class="item-entry overflow">
                                        <h5><a href="property-1.html">{{ $property->name }} </a></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b>Area : {{ $property->area }}</b> 120m </span>
                                        <span class="proerty-price pull-right">
                                            {{-- $ {{ $property->price }} --}}
                                            @if ($property->deal_type == 'rent')
                                                {{ $property->price_formatted }} /tháng
                                            @else
                                                @if ($property->price_type == 1)
                                                    {{ $property->price_formatted }}
                                                @elseif ($property->price_type == 2)
                                                    {{ $property->price_formatted * $property->area }}
                                                @else
                                                    Thỏa thuận
                                                @endif
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- Chưa thể quyết định ? --}}
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <div class="item-tree-icon">
                                    <i class="fa fa-th"></i>
                                </div>
                                <div class="more-entry overflow">
                                    <h5><a href="{{ route('client.property.index') }}">CHƯA THỂ QUYẾT ĐỊNH ? </a></h5>
                                    <h5 class="tree-sub-ttl">Xem tất cả bất động sản</h5>
                                    <a class="btn border-btn more-black" href="{{ route('client.property.index') }}"
                                        value="All properties">Tất cả bất động
                                        sản</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--Khu vực chào mừng -->
        <div class="Welcome-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 Welcome-entry  col-sm-12">
                        <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                            <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                        <!-- /.feature title -->
                                        <h2>Tài Lộc Property </h2>
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
                                            <h3>Đa dạng bất động sản</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-users pe-4x"></i>
                                            </div>
                                            <h3>Lượng lớn khách hàng</h3>
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
                                            <h3>Dễ sử dụng</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-help2 pe-4x"></i>
                                            </div>
                                            <h3>Hỗ trợ 24/7</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Lời chứng thực -->
        <div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Khách hàng của chúng tôi nói gì</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="row testimonial">
                        <div class="col-md-12">
                            <div id="testimonial-slider">
                                <div class="item">
                                    <div class="client-text">
                                        <p>Chúng tôi rất hài lòng. </p>
                                        <h4><strong>Trung Luân </strong><i>Nhà thiết kế web</i></h4>
                                    </div>
                                    <div class="client-face wow fadeInRight" data-wow-delay=".9s">
                                        <img src="{{ url('') }}/cassets/img/client-face1.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">
                                        <p>Tôi cực kỳ ấn tượng với phong cách làm việc của công ty</p>
                                        <h4><strong>Khánh Huy </strong><i>Khách hàng</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="{{ url('') }}/cassets/img/client-face2.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">
                                        <p>Một trải nghiệm tuyệt vời khi được tư vấn và trải nghiệm tại đây</p>
                                        <h4><strong>Nguyễn Minh </strong><i>Khách hàng</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="{{ url('') }}/cassets/img/client-face1.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">
                                        <p>Làm việc rất chuyên nghiệp, đúng giờ, tôn trọng khách hàng.</p>
                                        <h4><strong>Trung Hiếu </strong><i>Giáo viên</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="{{ url('') }}/cassets/img/client-face2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Khu vực đếm -->
        <div class="count-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Bạn có thể tin tưởng chúng tôi</h2>
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
                                    <div class="chart" data-percent="1000">
                                        <h2 class="percent" id="counter">0</h2>
                                        <h5>KHÁCH HÀNG HÀI LÒNG</h5>
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
                                        <h5>Bất động sản trong kho</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-flag"></span>
                                    </div>
                                    <div class="chart" data-percent="30">
                                        <h2 class="percent" id="counter2">0</h2>
                                        <h5>Thành phố đã đăng ký</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-graph2"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent" id="counter3">0</h2>
                                        <h5>CHI NHÁNH ĐẠI LÝ</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Khu vực bán hàng -->
        <div class="boy-sale-area">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                        <div class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-search"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>BẠN ĐANG TÌM KIẾM BẤT ĐỘNG SẢN?</h2>
                                <p>
                                    Chúng tôi có hàng ngàn bất động sản để bạn lựa chọn, từ
                                    hộ, nhà phố đến biệt thự
                                    sang trọng.
                                </p>
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
                                <h2>BẠN MUỐN BÁN MỘT BẤT ĐỘNG SẢN?</h2>
                                <p>
                                    Chúng tôi sẽ giúp bạn bán bất động sản của mình một cách nhanh chóng và hiệu quả.
                                </p>
                            </div>
                            <div class="asks-first-arrow">
                                <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p class="asks-call">CÓ CÂU HỎI? LIÊN HỆ VỚI CHÚNG TÔI: <span class="strong"> + 3-123-
                                424-5700</span></p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            $(document).ready(function() {
                // Lấy giá trị ban đầu của từng slider
                let priceRange = $('#price-range').data('sliderValue');
                let propertyGeo = $('#property-geo').data('sliderValue');
                let minBaths = $('#min-baths').data('sliderValue');
                let minBed = $('#min-bed').data('sliderValue');

                console.log(`Khoảng giá ban đầu: ${priceRange[0]} đến ${priceRange[1]}`);
                console.log(`Diện tích ban đầu: ${propertyGeo[0]} đến ${propertyGeo[1]}`);
                console.log(`Số phòng tắm ban đầu: ${minBaths}`);
                console.log(`Số phòng ngủ ban đầu: ${minBed}`);

                // Lắng nghe sự kiện slide để cập nhật giá trị
                $('#price-range').on('slide', function(event) {
                    console.log(`Khoảng giá thay đổi: ${event.value[0]} đến ${event.value[1]}`);
                });

                $('#property-geo').on('slide', function(event) {
                    console.log(`Diện tích thay đổi: ${event.value[0]} đến ${event.value[1]}`);
                });

                $('#min-baths').on('slide', function(event) {
                    console.log(`Số phòng tắm thay đổi: ${event.value}`);
                });

                $('#min-bed').on('slide', function(event) {
                    console.log(`Số phòng ngủ thay đổi: ${event.value}`);
                });
            });
        </script>
    @endsection
