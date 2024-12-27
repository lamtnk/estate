@extends('client.layouts.master')

@section('styles')
    <style>
        .item-entry .property-icon {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
            height: 4.8em;
        }
    </style>
@endsection

@section('main')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">Dự án</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- project area -->
    <div class="properties-area recent-property" style="background-color: #FFF;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 padding-top-40 properties-page">
                    <div class="section clear">
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <div class="items-per-page">
                                <label for="items_per_page"><b>Hiển thị trên trang :</b></label>
                                <div class="sel">
                                    <form action="{{ route('client.project.index') }}" method="get">
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
                            @foreach ($projects as $project)
                                <div class="col-sm-6 col-md-4 p0">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="{{ route('client.project.detail', $project->id) }}">
                                                <img
                                                    src="{{ asset($project->images[0]->image_path ?? 'https://placehold.co/600x400') }}">
                                            </a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
                                                <a href="{{ route('client.project.detail', $project->id) }}">{{ $project->name }}
                                                </a>
                                            </h5>
                                            <div class="dot-hr"></div>
                                            <div class="property-icon">
                                                <img src="cassets/img/icon/location.png"> {{ $project->location }}
                                            </div>
                                            <div class="property-icon">
                                                {{ $project->description }}
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
                                {{ $projects->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
