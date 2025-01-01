@extends('client.layouts.master')

@section('styles')
    <style>
        /* Cố định kích thước ảnh chính trong slider */
        #image-gallery img {
            width: 100%;
            /* Chiều rộng đầy đủ của slider */
            height: 750px;
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
            color: #fff;
            /* Màu sắc của mũi tên */
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .lSAction>a:hover {
            color: burlywood;
            /* Màu mũi tên khi hover */
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

        .project-box {
            width: 100%;
            /* Chiều rộng full màn hình */
            background-color: rgba(255, 255, 255, 0.9);
            /* Nền trắng, có độ trong suốt */
            z-index: 10;
            /* Đảm bảo project-box nằm trên slider */
            padding: 20px;
            /* Khoảng cách bên trong */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Đổ bóng nhẹ để tạo hiệu ứng nổi */
        }

        .light-slide-item {
            position: relative;
            /* Đặt slider làm nền bên dưới */
            z-index: 1;
            /* Đặt giá trị thấp hơn project-box */
        }

        .block-tong-quan .project-box .project-box-left {
            background-color: #fff;
            z-index: 5;
            position: relative;
        }

        @media (min-width: 576px) {
            .project-box-left {
                padding-left: calc((100vw - 540px) / 2);
            }
        }

        @media (min-width: 768px) {
            .project-box-left {
                padding-left: calc((100vw - 750px) / 2);
            }
        }

        @media (min-width: 992px) {
            .project-box-left {
                padding-left: calc((100vw - 960px) / 2);
            }
        }

        @media (min-width: 1200px) {
            .project-box-left {
                margin-left: calc((100vw - 1140px) / 2);
                padding: 0;
            }
        }
    </style>
@endsection

@section('main')
    <div class="container-fluid">
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
                    @if ($project->images->isEmpty())
                        <li data-thumb="{{ asset('https://placehold.co/600x400') }}">
                            <img src="{{ asset('https://placehold.co/600x400') }}" alt="Project Image" />
                        </li>
                    @else
                        @foreach ($project->images as $image)
                            <li data-thumb="{{ asset($image->image_path) }}">
                                <img src="{{ asset($image->image_path) }}" alt="Project Image" />
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <!-- End slide -->

        <div class="block-tong-quan">
            <div class="project-box">
                <div class="project-box-left">
                    <div class="border-type-top"></div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="item-padding">
                                <h1 class="title-project">{{ $project->name }}</h1>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="item-padding">
                                <p>{{ $project->description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Title and Description -->
    </div>

    <div class="container">
        <div class="section property-features">
            {{-- <h4 class="s-property-title">Nội dung chi tiết</h4> --}}
            {!! $project->content !!}
        </div>
        <!-- End content area  -->

        <div class="similar-post-section padding-top-20">
            <h4 class="s-property-title">Quỹ căn dự án {{ $project->name }} </h4>
            <div id="prop-smlr-slide_0">
                @foreach ($project->properties->take(3) as $property)
                    <div class="box-two proerty-item">
                        <div class="item-thumb">
                            <a href="{{ route('client.property.detail', $property->id) }}">
                                <img
                                    src="{{ asset($property->primaryImage->image_path ?? 'https://placehold.co/600x400') }}">
                            </a>
                        </div>

                        <div class="item-entry overflow">
                            <h5 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">
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
                                <img src="{{ asset('cassets/img/icon/room.png') }}"> {{ $property->number_of_floors }}
                                tầng|
                                <img src="{{ asset('cassets/img/icon/bed.png') }}"> {{ $property->bedrooms }} phòng ngủ
                            </div>
                            <div class="property-icon">
                                <img src="{{ asset('cassets/img/icon/sofa.png') }}"> {{ $property->furniture_vn }}
                            </div>
                            <div class="property-icon">
                                <img src="{{ asset('cassets/img/icon/compass.png') }}"> Hướng
                                {{ $property->direction_vn }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End related property area  -->
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
