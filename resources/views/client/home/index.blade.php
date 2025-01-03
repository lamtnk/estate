@extends('client.layouts.master')
@section('styles')
    <style>
        @media (max-width: 768px) {

            /* Ẩn tất cả các phần tử con của form */
            form .col-md-12>div {
                display: none;
            }

            /* Hiển thị trường tìm kiếm từ khóa */
            form .col-md-4.col-sm-12 {
                display: block;
            }

            /* Hiển thị nút submit */
            form .center {
                display: block;
            }
        }

        .custom-slider {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slider-item {
            min-width: 100%;
            box-sizing: border-box;
        }

        .slider-prev,
        .slider-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .slider-prev {
            left: 10px;
        }

        .slider-next {
            right: 10px;
        }

        .location-box {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            /* Bo góc nếu cần */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Thêm hiệu ứng đổ bóng */
        }

        .location-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Đảm bảo ảnh luôn giữ tỉ lệ gốc */
            display: block;
        }

        .location-box .location-overlay {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .location-box .location-name {
            font-size: 18px;
            font-weight: bold;
            color: white
        }
    </style>
@endsection
@section('title')
    {{ 'Trang chủ' }}
@endsection
@section('main')
    <div class="slider-area">
        <div class="slider">
            <div id="bg-slider" class="owl-carousel owl-theme">

                <div class="item"><img src="{{ url('') }}/cassets/img/slide1/slider-image-2.jpg" alt="The Last of us">
                </div>
                <div class="item"><img src="{{ url('') }}/cassets/img/slide1/slider-image-1.jpg" alt="GTA V">
                </div>

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
                                <div class="col-md-4 col-sm-12">
                                    <input type="text" class="form-control" name="keyword"
                                        placeholder="Nhập từ khóa để tìm kiếm" value="{{ request('keyword') }}"
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

        <div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Tin tức mới nhất</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="proerty-th">
                        @foreach ($news as $item)
                            <div class="col-sm-6 col-md-3 p0">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="{{ route('client.news.detail', ['id' => $item->id]) }}"><img
                                                src="https://file4.batdongsan.com.vn/images/newhome/cities1/HCM-web-1.jpg"></a>
                                    </div>
                                    <div class="item-entry overflow">
                                        <h5><a href="{{ route('client.news.detail', ['id' => $item->id]) }}">{{ $item->title }}
                                            </a></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b>Người đăng: </b>Admin</span>
                                        <span class="proerty-price pull-right">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- Chưa thể quyết định ? --}}
                        <div class="col-sm-12 col-md-12 p0 text-center">
                            <a href="{{ route('client.news.index') }}" class="btn btn-primary bodered">Xem tất cả</a>
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
                        <h2>Khách hàng nói gì?</h2>
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
                                        <span class="pull-left"><b>Diện tích: </b>{{ $property->area }}m2</span>
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

        <!-- project area -->
        <div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Dự án bất động sản nổi bật</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="proerty-th">
                        @foreach ($projects->take(4) as $project)
                            <div class="col-sm-6 col-md-3 p0">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="{{ route('client.project.detail', $project->id) }}"><img
                                                src="{{ asset($project->primaryImage->image_path ?? 'https://placehold.co/400x400') }}"></a>
                                    </div>
                                    <div class="item-entry overflow">
                                        <span
                                            class="badge
                                                @if ($project->status == 'completed') bg-success
                                                @elseif($project->status == 'ongoing') bg-primary @endif">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                        <h5
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                            <a href="{{ route('client.project.detail', $project->id) }}">{{ $project->name }}
                                            </a>
                                        </h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left">
                                            <img src="cassets/img/icon/location.png"> {{ $project->location }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- location property area -->
        <div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <h2>Bất động sản theo địa điểm</h2>
                    </div>
                </div>

                <div class="row">
                    <!-- TP Hồ Chí Minh -->
                    <div class="col-md-6 col-sm-12">
                        <div class="location-box" style="height: 410px; margin-bottom: 30px">
                            <a href="{{ route('client.property.index', ['location' => 'Hồ Chí Minh']) }}">
                                <img src="{{ asset('cassets/img/TPHCM.jpg') }}" alt="TP.Hồ Chí Minh">
                            </a>
                            <div class="location-overlay">
                                <a href="{{ route('client.property.index', ['location' => 'Hồ Chí Minh']) }}">
                                    <p class="location-name">TP. Hồ Chí Minh</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Các địa điểm khác -->
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="location-box" style="height: 190px; margin-bottom: 30px">
                                    <a href="{{ route('client.property.index', ['location' => 'Hà Nội']) }}">
                                        <img src="{{ asset('cassets/img/Hanoi.jpg') }}" alt="Hà Nội">
                                    </a>
                                    <div class="location-overlay">
                                        <a href="{{ route('client.property.index', ['location' => 'Hà Nội']) }}">
                                            <p class="location-name">Hà Nội</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="location-box" style="height: 190px; margin-bottom: 30px">
                                    <a href="{{ route('client.property.index', ['location' => 'Đà Nẵng']) }}">
                                        <img src="{{ asset('cassets/img/Danang.jpg') }}" alt="Đà Nẵng">
                                    </a>
                                    <div class="location-overlay">
                                        <a href="{{ route('client.property.index', ['location' => 'Đà Nẵng']) }}">
                                            <p class="location-name">Đà Nẵng</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="location-box" style="height: 190px; margin-bottom: 30px">
                                    <a href="{{ route('client.property.index', ['location' => 'Bình Dương']) }}">
                                        <img src="{{ asset('cassets/img/Binhduong.jpg') }}" alt="Bình Dương">
                                    </a>
                                    <div class="location-overlay">
                                        <a href="{{ route('client.property.index', ['location' => 'Bình Dương']) }}">
                                            <p class="location-name">Bình Dương</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="location-box" style="height: 190px; margin-bottom: 30px">
                                    <a href="{{ route('client.property.index', ['location' => 'Đồng Nai']) }}">
                                        <img src="{{ asset('cassets/img/Dongnai.jpg') }}" alt="Đồng Nai">
                                    </a>
                                    <div class="location-overlay">
                                        <a href="{{ route('client.property.index', ['location' => 'Đồng Nai']) }}">
                                            <p class="location-name">Đồng Nai</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-4">
                <div class="box-two proerty-item">
                    <div class="item-thumb">
                        <a href="project-1.html"><img src="{{ asset('path/to/project1.jpg') }}" alt="Project 1"></a>
                    </div>
                    <div class="item-entry overflow">
                        <h5><a href="project-1.html">Project 1</a></h5>
                        <div class="dot-hr"></div>
                        <span class="pull-left"><b>Diện tích: </b>100m2</span>
                        <span class="proerty-price pull-right">1,000,000 VND</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-two proerty-item">
                    <div class="item-thumb">
                        <a href="project-2.html"><img src="{{ asset('path/to/project2.jpg') }}" alt="Project 2"></a>
                    </div>
                    <div class="item-entry overflow">
                        <h5><a href="project-2.html">Project 2</a></h5>
                        <div class="dot-hr"></div>
                        <span class="pull-left"><b>Diện tích: </b>150m2</span>
                        <span class="proerty-price pull-right">1,500,000 VND</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-two proerty-item">
                    <div class="item-thumb">
                        <a href="project-3.html"><img src="{{ asset('path/to/project3.jpg') }}" alt="Project 3"></a>
                    </div>
                    <div class="item-entry overflow">
                        <h5><a href="project-3.html">Project 3</a></h5>
                        <div class="dot-hr"></div>
                        <span class="pull-left"><b>Diện tích: </b>200m2</span>
                        <span class="proerty-price pull-right">2,000,000 VND</span>
                    </div>
                </div>
            </div>
        </div> --}}

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
                        <p class="asks-call">CÓ CÂU HỎI? LIÊN HỆ NGAY: <span class="strong"> 0904967555</span></p>
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
