@extends('client.layouts.master')
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
                                <li class="active">
                                    <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date"
                                        data-order="ASC">
                                        Ngày Đăng <i class="fa fa-sort-amount-asc"></i>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price"
                                        data-order="DESC">
                                        Giá <i class="fa fa-sort-numeric-desc"></i>
                                    </a>
                                </li>
                            </ul><!--/ .sort-by-list-->
                            <div class="items-per-page">
                                <label for="items_per_page"><b>Hiển thị trên trang :</b></label>
                                <div class="sel">
                                    <form action="{{ route('client.property.index') }}" method="get">
                                        <select id="items_per_page" name="per_page" onchange="this.form.submit()">
                                            <option value="3" {{ request('per_page') == 3 ? 'selected' : '' }}>3
                                            </option>
                                            <option value="6" {{ request('per_page') == 6 ? 'selected' : '' }}>6
                                            </option>
                                            <option value="9" {{ request('per_page') == 9 ? 'selected' : '' }}>9
                                            </option>
                                            <option value="12" {{ request('per_page') == 12 ? 'selected' : '' }}>12
                                            </option>
                                            <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15
                                            </option>
                                            <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30
                                            </option>
                                            <option value="45" {{ request('per_page') == 45 ? 'selected' : '' }}>45
                                            </option>
                                            <option value="60" {{ request('per_page') == 60 ? 'selected' : '' }}>60
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
                                                <img src="{{ asset($property->primaryImage->image_path) }}">
                                            </a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5><a href="property-1.html"> {{ $property->name }} </a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b>Diện tích :</b> {{ $property->area }}m </span>
                                            <span class="proerty-price pull-right">
                                                @if ($property->price_type == 1)
                                                    {{ number_format($property->price, 0, ',', '.') }} VND
                                                @elseif ($property->price_type == 2)
                                                    {{ number_format($property->price, 0, ',', '.') }} / m2
                                                @else
                                                    Thỏa thuận
                                                @endif
                                            </span>
                                            <div class="property-icon">
                                                <img src="cassets/img/icon/room.png">({{ $property->number_of_floors }})|
                                                <img src="cassets/img/icon/bed.png">({{ $property->bedrooms }})|
                                                <img src="cassets/img/icon/shawer.png">({{ $property->bathrooms }})|
                                                <img src="cassets/img/icon/cars.png">({{ $property->parking }})
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
                                                <label for="price-range">Price range (VND):</label>
                                                <input type="text" class="span2" value="" data-slider-min="0"
                                                    data-slider-max="600" data-slider-step="5"
                                                    data-slider-value="[0,450]" id="price-range"><br />
                                                <b class="pull-left color">100.000.000 VND</b>
                                                <b class="pull-right color">100.000.000.000 VND</b>
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

                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tham Khảo</h3>
                            </div>
                            <div class="panel-body recent-property-widget">
                                <ul>
                                    <li>
                                        <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                            <a href="single.html"><img src="cassets/img/demo/small-property-2.jpg"></a>
                                            <span class="property-seeker">
                                                <b class="b-1">A</b>
                                                <b class="b-2">S</b>
                                            </span>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                            <h6> <a href="single.html">Super nice villa </a></h6>
                                            <span class="property-price">3000000$</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col-md-3 col-sm-3  col-xs-3 blg-thumb p0">
                                            <a href="single.html"><img src="cassets/img/demo/small-property-1.jpg"></a>
                                            <span class="property-seeker">
                                                <b class="b-1">A</b>
                                                <b class="b-2">S</b>
                                            </span>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                            <h6> <a href="single.html">Super nice villa </a></h6>
                                            <span class="property-price">3000000$</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                            <a href="single.html"><img src="cassets/img/demo/small-property-3.jpg"></a>
                                            <span class="property-seeker">
                                                <b class="b-1">A</b>
                                                <b class="b-2">S</b>
                                            </span>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                            <h6> <a href="single.html">Super nice villa </a></h6>
                                            <span class="property-price">3000000$</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                            <a href="single.html"><img src="cassets/img/demo/small-property-2.jpg"></a>
                                            <span class="property-seeker">
                                                <b class="b-1">A</b>
                                                <b class="b-2">S</b>
                                            </span>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                            <h6> <a href="single.html">Super nice villa </a></h6>
                                            <span class="property-price">3000000$</span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
