@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/assets/vendors/summernote/summernote-lite.min.css">
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
                        <h3>Thêm Bất Động Sản</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Bất Động Sản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông Tin Bất Động Sản</h4>
                            </div>
                            <div class="card-body">
                                {{-- Hiển thị thông báo lỗi --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- Form thêm Bất Động Sản --}}
                                <form action="{{ route('admin.property.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="unit_code" class="form-label">Mã Bất Động Sản</label>
                                            <input type="text" class="form-control" id="unit_code" name="unit_code"
                                                value="{{ old('unit_code') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Tên Bất Động Sản</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}" required>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="project_id" class="form-label">Thuộc Dự Án</label>
                                            <select class="form-select" id="project_id" name="project_id">
                                                @foreach ($projects as $project)
                                                    <option value="{{ old('project_id', $project->id) }}">
                                                        {{ $project->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="type_id" class="form-label">Loại Hình Bất Động Sản</label>
                                            <select class="form-select" id="type_id" name="type_id">
                                                @foreach ($propertyTypes as $propertyType)
                                                    <option value="{{ old('type_id', $propertyType->id) }}">
                                                        {{ $propertyType->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="area" class="form-label">Tổng Diện Tích</label>
                                            <input type="number" class="form-control" id="area" name="area"
                                                value="{{ old('area') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="frontage" class="form-label">Mặt Tiền Sử Dụng</label>
                                            <input type="number" class="form-control" id="frontage" name="frontage"
                                                value="{{ old('frontage') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="floor_1_area" class="form-label">Diện Tích Sàn Tầng 1</label>
                                            <input type="number" class="form-control" id="floor_1_area" name="floor_1_area"
                                                value="{{ old('floor_1_area') }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="bedrooms" class="form-label">Số Phòng Ngủ</label>
                                            <input type="number" class="form-control" id="bedrooms" name="bedrooms"
                                                value="{{ old('bedrooms') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bathrooms" class="form-label">Số Phòng Tắm</label>
                                            <input type="number" class="form-control" id="bathrooms" name="bathrooms"
                                                value="{{ old('bathrooms') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="parking" class="form-label">Chỗ Đậu Xe</label>
                                            <input type="number" class="form-control" id="parking" name="parking"
                                                value="{{ old('parking') }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="price" class="form-label">Giá Bất Động Sản</label>
                                            <input type="number" class="form-control" id="price" name="price"
                                                value="{{ old('price') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Tình Trạng</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="available"
                                                    {{ old('status') == 'available' ? 'selected' : '' }}>
                                                    Đang giao bán</option>
                                                <option value="sold" {{ old('sold') == 'sold' ? 'selected' : '' }}>
                                                    Đã bán</option>
                                                <option value="rented" {{ old('rented') == 'rented' ? 'selected' : '' }}>
                                                    Đang cho thuê</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô Tả</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Ảnh bất động sản</label>
                                        <input class="form-control" type="file" id="image" name="image"
                                            accept="image/*" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội Dung Chi Tiết</label>
                                        <div id="summernote" class="form-control" name="content">{{ old('content') }}
                                        </div>
                                    </div>
                                    <input type="hidden" name="content" id="content">
                                    <button type="submit" class="btn btn-primary">Thêm Bất Động Sản</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection

    @section('scripts')
        <script src="{{ url('') }}/assets/vendors/summernote/summernote-lite.min.js"></script>
        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 300,
                placeholder: 'Nhập nội dung chi tiết của Bất Động Sản...',
                callbacks: {
                    onChange: function(contents, $editable) {
                        // Cập nhật giá trị của trường ẩn mỗi khi có thay đổi
                        $('#content').val(contents);
                    }
                }
            });

            // Trước khi submit form, đảm bảo nội dung Summernote được lưu vào trường ẩn
            $('form').on('submit', function() {
                var content = $('#summernote').summernote('code'); // Lấy nội dung HTML từ Summernote
                $('#content').val(content); // Gán nội dung vào trường ẩn
            });
        </script>
    @endsection