@extends('client.layouts.master')
@section('title')
{{'Bất động sản'}}
@endsection
@section('main')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">Bất Động Sản</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="properties-area recent-property" style="background-color: #FFF;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 padding-top-40 properties-page">
                    <div class="section clear">
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <ul class="sort-by-list">
                                <li>
                                    <a href="{{ route(
                                        'client.property.index',
                                        array_merge(request()->except(['order_by', 'order']), [
                                            'order_by' => 'created_at',
                                            'order' => request('order_by') == 'created_at' && request('order') == 'ASC' ? 'DESC' : 'ASC',
                                        ]),
                                    ) }}"
                                        class="{{ request('order_by') == 'created_at' ? 'active' : '' }}">
                                        Ngày Đăng
                                        <i
                                            class="fa {{ request('order_by') == 'created_at' && request('order') == 'ASC' ? 'fa-sort-amount-desc' : 'fa-sort-amount-asc' }}"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route(
                                        'client.property.index',
                                        array_merge(request()->except(['order_by', 'order']), [
                                            'order_by' => 'price',
                                            'order' => request('order_by') == 'price' && request('order') == 'ASC' ? 'DESC' : 'ASC',
                                        ]),
                                    ) }}"
                                        class="{{ request('order_by') == 'price' ? 'active' : '' }}">
                                        Giá
                                        <i
                                            class="fa {{ request('order_by') == 'price' && request('order') == 'ASC' ? 'fa-sort-amount-desc' : 'fa-sort-amount-asc' }}"></i>
                                    </a>
                                </li>
                            </ul>
                            <!--/ .sort-by-list-->

                            <div class="items-per-page">
                                <label for="items_per_page"><b>Hiển thị trên trang :</b></label>
                                <div class="sel">
                                    <form action="{{ route('client.property.index') }}" method="get">
                                        <select id="items_per_page" name="per_page" onchange="this.form.submit()">
                                            <option value="3" {{ request('per_page', 12) == 3 ? 'selected' : '' }}>3
                                            </option>
                                            <option value="6" {{ request('per_page', 12) == 6 ? 'selected' : '' }}>6
                                            </option>
                                            <option value="9" {{ request('per_page', 12) == 9 ? 'selected' : '' }}>9
                                            </option>
                                            <option value="12" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12
                                            </option> <!-- Mặc định là 12 -->
                                            <option value="15" {{ request('per_page', 12) == 15 ? 'selected' : '' }}>15
                                            </option>
                                            <option value="30" {{ request('per_page', 12) == 30 ? 'selected' : '' }}>30
                                            </option>
                                            <option value="45" {{ request('per_page', 12) == 45 ? 'selected' : '' }}>45
                                            </option>
                                            <option value="60" {{ request('per_page', 12) == 60 ? 'selected' : '' }}>60
                                            </option>
                                        </select>
                                    </form>
                                </div><!--/ .sel-->
                            </div><!--/ .items-per-page-->
                        </div>

                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i> </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="section clear">
                        <div id="list-type" class="proerty-th">
                            {{-- foreach --}}
                            @foreach ($properties as $property)
                                <div class="col-sm-6 col-md-4 p0">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="{{ route('client.property.detail', $property->id) }}">
                                                <img
                                                    src="{{ asset($property->primaryImage->image_path ?? 'https://placehold.co/600x400') }}">
                                            </a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                                <a href="{{ route('client.property.detail', $property->id) }}">{{ $property->name }}
                                                </a>
                                            </h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b>Diện tích: </b>{{ $property->area }}m2</span>
                                            <span class="proerty-price pull-right">
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
                                            <div class="property-icon">
                                                <img src="cassets/img/icon/room.png"> {{ $property->number_of_floors }}
                                                tầng|
                                                <img src="cassets/img/icon/bed.png"> {{ $property->bedrooms }} phòng ngủ
                                            </div>
                                            <div class="property-icon">
                                                <img src="cassets/img/icon/sofa.png"> {{ $property->furniture_vn }}
                                            </div>
                                            <div class="property-icon">
                                                <img src="cassets/img/icon/compass.png"> Hướng
                                                {{ $property->direction_vn }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="section">
                        <div class="pull-right">
                            <div class="pagination">
                                <!-- Hiển thị các liên kết phân trang -->
                                {{ $properties->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 pl0 padding-top-40">
                    <div class="blog-asside-right pl0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tìm Kiếm</h3>
                            </div>
                            <div class="panel-body search-widget">
                                <form action="{{ route('client.property.index') }}" method="get" class="form-inline">
                                    <!-- Tìm kiếm theo từ khóa -->
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="keyword">Từ khóa:</label>
                                                <input type="text" class="form-control" name="keyword"
                                                    placeholder="Nhập từ khóa" value="{{ request('keyword') }}">
                                            </div>
                                        </div>
                                    </fieldset>

                                    {{-- <!-- Khu vực -->
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="province" class="selectpicker" data-live-search="true"
                                                    title="Chọn khu vực">
                                                    <option value="">Tất cả</option>
                                                    <option>Hà Nội</option>
                                                    <option>Hồ Chí Minh</option>
                                                    <option>Đà Nẵng</option>
                                                    <option>Cần Thơ</option>
                                                    <option>Hải Phòng</option>
                                                    <option>Bình Dương</option>
                                                    <option>Hải Dương</option>
                                                    <option>Vũng Tàu</option>
                                                    <!-- Thêm các tỉnh thành khác nếu cần -->
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset> --}}

                                    <!-- Dự án -->
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="project" class="selectpicker" data-live-search="true"
                                                    title="Dự án">
                                                    <option value="">Tất cả</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Loại hình giao dịch -->
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="deal_type" class="selectpicker" title="Loại hình giao dịch">
                                                    <option value="">Tất cả</option>
                                                    <option value="sell">Giao bán</option>
                                                    <option value="rent">Cho thuê</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Loại hình bất động sản -->
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="property_type" class="selectpicker"
                                                    title="Loại hình bất động sản">
                                                    <option value="">Tất cả</option>
                                                    @foreach ($propertyTypes as $propertyType)
                                                        <option value="{{ $propertyType->id }}">{{ $propertyType->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Giá bán -->
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price-min">Giá bán từ (đ):</label>
                                                <input type="number" class="form-control" name="price_min"
                                                    placeholder="Từ" value="" min="0">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="price-max">Giá bán đến (đ):</label>
                                                <input type="number" class="form-control" name="price_max"
                                                    placeholder="Đến" value="" min="0">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Diện tích -->
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="property-area-min">Diện tích từ (m²):</label>
                                                <input type="number" class="form-control" name="area_min"
                                                    placeholder="Từ" value="" min="0">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="property-area-max">Diện tích đến (m²):</label>
                                                <input type="number" class="form-control" name="area_max"
                                                    placeholder="Đến" value="" min="0">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Số phòng ngủ -->
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="min-bed">Số phòng ngủ:</label>
                                                <input type="number" class="form-control" name="bedrooms"
                                                    placeholder="Số phòng ngủ" value="" min="1">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="min-baths">Nội thất:</label>
                                                <select name="furniture" class="selectpicker" title="Nội thất">
                                                    <option value="">Tất cả</option>
                                                    <option value="Bare Shell">Bàn giao thô</option>
                                                    <option value="Basic Furnished">Nội thất cơ bản</option>
                                                    <option value="Fully Furnished">Nội thất đầy đủ</option>
                                                    <option value="Luxury Furnished">Nội thất cao cấp</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="min-baths">Hướng:</label>
                                                <select name="direction" class="selectpicker" title="Hướng">
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
                                    </fieldset>

                                    <!-- Nút tìm kiếm -->
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="button btn largesearch-btn" value="Search"
                                                    type="submit">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                        </div>

                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tham Khảo</h3>
                            </div>
                            <div class="panel-body recent-property-widget">
                                <ul>
                                    @foreach ($properties->take(4) as $property)
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                <a href="{{ route('client.property.detail', $property->id) }}">
                                                    <img
                                                        src="{{ asset($property->primaryImage->image_path ?? 'https://placehold.co/600x400') }}">
                                                </a>
                                                <span class="property-seeker">
                                                    <b class="b-1">A</b>
                                                    <b class="b-2">S</b>
                                                </span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 blg-entry">
                                                <h6
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                                    <a href="{{ route('client.property.detail', $property->id) }}">
                                                        {{ $property->name }} </a>
                                                </h6>
                                                <span class="property-price">
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
                                        </li>
                                    @endforeach
                                </ul>
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
        $('.selectpicker').selectpicker({
            container: 'body' // Đảm bảo dropdown của select luôn hiển thị đầy đủ
        });
    </script>
@endsection
