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
                                            <label for="name" class="form-label">Tiêu Đề</label>
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
                                        <div class="col-md-6">
                                            <label for="area" class="form-label">Diện Tích Đất (m2)</label>
                                            <input type="number" class="form-control" id="area" name="area"
                                                value="{{ old('area') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="floor_1_area" class="form-label">Diện Tích Xây Dựng (m2)</label>
                                            <input type="number" class="form-control" id="floor_1_area" name="floor_1_area"
                                                value="{{ old('floor_1_area') }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="frontage" class="form-label">Mặt Tiền Sử Dụng</label>
                                            <input type="number" class="form-control" id="frontage" name="frontage"
                                                value="{{ old('frontage') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="number_of_floors" class="form-label">Số tầng</label>
                                            <input type="number" class="form-control" id="number_of_floors"
                                                name="number_of_floors" value="{{ old('number_of_floors') }}">
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
                                            <label for="status" class="form-label">Tình Trạng</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="red book"
                                                    {{ old('status') == 'red book' ? 'selected' : '' }}>
                                                    Đã có sổ đỏ</option>
                                                <option value="pending red book"
                                                    {{ old('status') == 'pending red book' ? 'selected' : '' }}>
                                                    Đang chờ sổ đỏ</option>
                                                <option value="sale contract"
                                                    {{ old('status') == 'sale contract' ? 'selected' : '' }}>
                                                    Hợp đồng mua bán</option>
                                                <option value="land measurement extract"
                                                    {{ old('status') == 'land measurement extract' ? 'selected' : '' }}>
                                                    Trích đo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="deal_type" class="form-label">Loại hình giao dịch</label>
                                            <select class="form-select" id="deal_type" name="deal_type">
                                                <option value="sell" {{ old('deal_type') == 'sell' ? 'selected' : '' }}>
                                                    Giao bán</option>
                                                <option value="rent" {{ old('deal_type') == 'rent' ? 'selected' : '' }}>
                                                    Cho thuê</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="price_type" class="form-label">Đơn vị</label>
                                            <select class="form-select" id="price_type" name="price_type">
                                                <option value="1" {{ old('price_type') == '1' ? 'selected' : '' }}>
                                                    VND</option>
                                                <option value="2" {{ old('price_type') == '2' ? 'selected' : '' }}>
                                                    m2</option>
                                                <option value="3" {{ old('price_type') == '3' ? 'selected' : '' }}>
                                                    Thỏa thuận</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="price" class="form-label">Giá Bất Động Sản</label>
                                            <input type="number" class="form-control" id="price" name="price"
                                                value="{{ old('price') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label"></label>
                                            <div id="calculated-price" class="mt-2 text-muted" style="display: none;">
                                                <i class="bi bi-info-circle"></i>
                                                <span id="price-calculation-result"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô Tả</label>
                                        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
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

            document.addEventListener('DOMContentLoaded', function() {
                const priceTypeSelect = document.getElementById('price_type');
                const priceInput = document.getElementById('price');
                const areaInput = document.getElementById('area'); // Lấy diện tích đất
                const calculatedPrice = document.getElementById('calculated-price');
                const priceCalculationResult = document.getElementById('price-calculation-result');

                // Hàm định dạng tiền VND
                function formatVND(value) {
                    return new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND',
                        maximumFractionDigits: 0
                    }).format(value);
                }

                function updatePriceInfo() {
                    const selectedValue = priceTypeSelect.value;
                    const priceValue = parseFloat(priceInput.value) || 0;
                    const areaValue = parseFloat(areaInput.value) || 1; // Giá trị mặc định tránh chia cho 0

                    calculatedPrice.style.display = 'none'; // Ẩn mặc định

                    // Khi chọn "Thỏa thuận", vô hiệu hóa ô nhập giá và đặt giá trị bằng 0
                    if (selectedValue === '3') { // Thỏa thuận
                        priceInput.readOnly = true;
                        priceInput.value = 0; // Đặt giá trị của ô input là 0 khi bị readOnly
                        calculatedPrice.style.display = 'none';
                    } else {
                        priceInput.readOnly = false; // Kích hoạt lại ô nhập giá
                        if (selectedValue === '1') { // VND
                            calculatedPrice.style.display = 'block';
                            const pricePerSquareMeter = priceValue / areaValue;
                            priceCalculationResult.textContent = `Giá trên m2: ${formatVND(pricePerSquareMeter)}`;
                        } else if (selectedValue === '2') { // m2
                            calculatedPrice.style.display = 'block';
                            const totalPrice = priceValue * areaValue;
                            priceCalculationResult.textContent = `Tổng giá bất động sản: ${formatVND(totalPrice)}`;
                        }
                    }
                }

                // Gắn sự kiện
                priceTypeSelect.addEventListener('change', updatePriceInfo);
                priceInput.addEventListener('input', updatePriceInfo);
                areaInput.addEventListener('input', updatePriceInfo);

                // Kích hoạt logic ban đầu nếu đã có giá trị
                priceTypeSelect.dispatchEvent(new Event('change'));
            });
        </script>
    @endsection
