@extends('admin.layouts.master')
@section('styles')
    <style>
        .thumbnail-container {
            position: relative;
            width: 200px;
            height: 200px;
            display: inline-block;
            margin: 10px;
            cursor: pointer;
            overflow: hidden;
            border-radius: 8px;
            /* Bo góc nếu cần */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Thêm bóng đổ cho ảnh */
        }

        .thumbnail-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Cắt ảnh để phù hợp với thumbnail */
            object-position: center;
            /* Căn giữa ảnh */
            border: none;
            /* Loại bỏ viền của thumbnail */
            transition: transform 0.3s ease;
            /* Hiệu ứng di chuyển */
        }

        .thumbnail-img:hover {
            transform: scale(1.1);
            /* Phóng to ảnh khi di chuột vào */
        }

        .thumbnail-caption {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
            font-size: 14px;
            background-color: rgba(0, 0, 0, 0.5);
            /* Nền tối cho tên ảnh */
            padding: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
            /* Hiệu ứng hiển thị tên ảnh */
        }

        .thumbnail-container:hover .thumbnail-caption {
            opacity: 1;
            /* Hiển thị tên ảnh khi hover */
        }

        .thumbnail-container:hover .thumbnail-img {
            transform: scale(1.1);
            /* Phóng to ảnh khi hover */
        }
    </style>
@endsection

@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Danh sách ảnh {{ $property->name }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách ảnh {{ $property->name }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <a href="{{ route('admin.property.images.add', $property->id) }}" class="btn btn-primary">Thêm
                            Ảnh</a>

                        <div class="row">
                            @foreach ($property->images as $image)
                                <!-- Thumbnail với tên ảnh và hiệu ứng hover -->
                                <div class="thumbnail-container">
                                    <img src="{{ asset($image->image_path) }}" class="thumbnail-img" alt="Tên ảnh"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        data-bs-image="{{ asset($image->image_path) }}">
                                    <div class="thumbnail-caption">{{ basename($image->image_path) }}</div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Modal phóng to ảnh -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <!-- Hiển thị ảnh lớn ở đây -->
                                        <img id="modalImage" src="" class="img-fluid" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection

    @section('scripts')
        <script>
            // Khi mở modal, thay đổi hình ảnh trong modal
            var modal = document.getElementById('imageModal');
            var modalImage = document.getElementById('modalImage');

            modal.addEventListener('show.bs.modal', function(event) {
                // Lấy thông tin ảnh từ data-bs-image của thumbnail được nhấp
                var button = event.relatedTarget; // nút hoặc ảnh đã nhấp
                var imageUrl = button.getAttribute('data-bs-image'); // Lấy url ảnh
                modalImage.src = imageUrl; // Đặt ảnh vào modal
            });
        </script>
    @endsection
