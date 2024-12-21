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
                        <h3>Sửa Dự Án</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sửa Dự Án</li>
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
                                <h4 class="card-title">Thông Tin Dự Án</h4>
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

                                {{-- Form sửa dự án --}}
                                <form action="{{ route('admin.property.update', $property->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') {{-- Method spoofing để gửi PUT request --}}
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="unit_code" class="form-label">Mã Bất Động Sản</label>
                                            <input type="text" class="form-control" id="unit_code" name="unit_code"
                                                value="{{ old('unit_code', $property->unit_code) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $property->name) }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="project_id" class="form-label">Thuộc Dự Án</label>
                                            <select class="form-select" id="project_id" name="project_id">
                                                @foreach ($projects as $project)
                                                    <option value="{{ old('project_id', $project->id) }}"
                                                        {{ old('project_id', $property->project_id) == $project->id ? 'selected' : '' }}>
                                                        {{ $project->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="type_id" class="form-label">Loại Hình Bất Động Sản</label>
                                            <select class="form-select" id="type_id" name="type_id">
                                                @foreach ($propertyTypes as $propertyType)
                                                    <option value="{{ old('type_id', $propertyType->id) }}"
                                                        {{ old('type_id', $property->type_id) == $propertyType->id ? 'selected' : '' }}>
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
                                                value="{{ old('area', $property->area) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="floor_1_area" class="form-label">Diện Tích Xây Dựng (m2)</label>
                                            <input type="number" class="form-control" id="floor_1_area" name="floor_1_area"
                                                value="{{ old('floor_1_area', $property->floor_1_area) }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="frontage" class="form-label">Mặt Tiền Sử Dụng</label>
                                            <input type="number" class="form-control" id="frontage" name="frontage"
                                                value="{{ old('frontage', $property->frontage) }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="number_of_floors" class="form-label">Số tầng</label>
                                            <input type="number" class="form-control" id="number_of_floors"
                                                name="number_of_floors"
                                                value="{{ old('number_of_floors', $property->number_of_floors) }}"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bedrooms" class="form-label">Số Phòng Ngủ</label>
                                            <input type="number" class="form-control" id="bedrooms" name="bedrooms"
                                                value="{{ old('bedrooms', $property->bedrooms) }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="furniture" class="form-label">Nội Thất</label>
                                            <select class="form-select" id="furniture" name="furniture">
                                                <option value="Bare Shell"
                                                    {{ old('furniture', $property->furniture) == 'Bare Shell' ? 'selected' : '' }}>
                                                    Bàn giao thô</option>
                                                <option value="Basic Furnished"
                                                    {{ old('furniture', $property->furniture) == 'Basic Furnished' ? 'selected' : '' }}>
                                                    Nội thất cơ bản</option>
                                                <option value="Fully Furnished"
                                                    {{ old('furniture', $property->furniture) == 'Fully Furnished' ? 'selected' : '' }}>
                                                    Nội thất đầy đủ</option>
                                                <option value="Luxury Furnished"
                                                    {{ old('furniture', $property->furniture) == 'Luxury Furnished' ? 'selected' : '' }}>
                                                    Nội thất cao cấp</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="direction" class="form-label">Hướng Nhà</label>
                                            <select class="form-select" id="direction" name="direction">
                                                <option value="East"
                                                    {{ old('direction', $property->direction) == 'East' ? 'selected' : '' }}>
                                                    Đông</option>
                                                <option value="West"
                                                    {{ old('direction', $property->direction) == 'West' ? 'selected' : '' }}>
                                                    Tây</option>
                                                <option value="South"
                                                    {{ old('direction', $property->direction) == 'South' ? 'selected' : '' }}>
                                                    Nam</option>
                                                <option value="North"
                                                    {{ old('direction', $property->direction) == 'North' ? 'selected' : '' }}>
                                                    Bắc</option>
                                                <option value="Southeast"
                                                    {{ old('direction', $property->direction) == 'Southeast' ? 'selected' : '' }}>
                                                    Đông Nam</option>
                                                <option value="Northeast"
                                                    {{ old('direction', $property->direction) == 'Northeast' ? 'selected' : '' }}>
                                                    Đông Bắc</option>
                                                <option value="Southwest"
                                                    {{ old('direction', $property->direction) == 'Southwest' ? 'selected' : '' }}>
                                                    Tây Nam</option>
                                                <option value="Northwest"
                                                    {{ old('direction', $property->direction) == 'Northwest' ? 'selected' : '' }}>
                                                    Tây Bắc</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Tình Trạng</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="red book"
                                                    {{ old('status', $property->status) == 'red book' ? 'selected' : '' }}>
                                                    Đã có sổ đỏ</option>
                                                <option value="pending red book"
                                                    {{ old('status', $property->status) == 'pending red book' ? 'selected' : '' }}>
                                                    Đang chờ sổ đỏ</option>
                                                <option value="sale contract"
                                                    {{ old('status', $property->status) == 'sale contract' ? 'selected' : '' }}>
                                                    Hợp đồng mua bán</option>
                                                <option value="land measurement extract"
                                                    {{ old('status', $property->status) == 'land measurement extract' ? 'selected' : '' }}>
                                                    Trích đo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="deal_type" class="form-label">Loại hình giao dịch</label>
                                            <select class="form-select" id="deal_type" name="deal_type">
                                                <option value="sell"
                                                    {{ old('deal_type', $property->deal_type) == 'sell' ? 'selected' : '' }}>
                                                    Giao bán</option>
                                                <option value="rent"
                                                    {{ old('deal_type', $property->deal_type) == 'rent' ? 'selected' : '' }}>
                                                    Cho thuê</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="price" class="form-label">Giá Bất Động Sản</label>
                                            <input type="number" class="form-control" id="price" name="price"
                                                value="{{ old('price', $property->price) }}" required>
                                        </div>
                                        <div class="col-md-3" id="price_type_form">
                                            <label for="price_type" class="form-label">Đơn vị</label>
                                            <select class="form-select" id="price_type" name="price_type">
                                                <option value="1"
                                                    {{ old('price_type', $property->price_type) == '1' ? 'selected' : '' }}>
                                                    VND</option>
                                                <option value="2"
                                                    {{ old('price_type', $property->price_type) == '2' ? 'selected' : '' }}>
                                                    m2</option>
                                                <option value="3"
                                                    {{ old('price_type', $property->price_type) == '3' ? 'selected' : '' }}>
                                                    Thỏa thuận</option>
                                            </select>
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
                                        <textarea class="form-control" id="description" name="description" rows="5" required>
                                            {{ old('description', $property->description) }}
                                        </textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Ảnh bất động sản</label>
                                        <input class="form-control" type="file" id="image" name="image"
                                            accept="image/*" {{ $property->primaryImage == null ? 'required' : '' }}>
                                        <div id="image-preview-container" class="mt-3"
                                            style="display:none; text-align: center;">
                                            <img id="image-preview"
                                                src="{{ asset($property->primaryImage->image_path ?? '') }}"
                                                alt="Image preview" alt="Image preview"
                                                style="max-width: 100%; max-height: 500px; display: block; margin: 0 auto; object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội Dung Chi Tiết</label>
                                        <div id="summernote" class="form-control" name="content">
                                            {!! old('content', $property->content) !!}
                                        </div>
                                    </div>

                                    <input type="hidden" name="content" id="content">

                                    <button type="submit" class="btn btn-primary">Cập Nhật Bất Động Sản</button>
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
                placeholder: 'Nhập nội dung chi tiết của dự án...',
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
                const priceTypeForm = document.getElementById('price_type_form');
                const priceTypeSelect = document.getElementById('price_type');
                const priceInput = document.getElementById('price');
                const areaInput = document.getElementById('area'); // Lấy diện tích đất
                const dealTypeSelect = document.getElementById('deal_type');
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
                    const selectedDealType = dealTypeSelect.value; // Loại hình giao dịch
                    const selectedPriceType = priceTypeSelect.value; // Đơn vị giá
                    const priceValue = parseFloat(priceInput.value) || 0;
                    const areaValue = parseFloat(areaInput.value) || 1; // Giá trị mặc định tránh chia cho 0

                    calculatedPrice.style.display = 'none'; // Ẩn thông báo giá mặc định

                    // Logic khi loại hình giao dịch là "Cho thuê"
                    if (selectedDealType === 'rent') {
                        priceTypeSelect.value = '1'; // Đặt giá trị VND
                        priceTypeForm.hidden = true; // Ẩn trường select đơn vị
                        priceInput.readOnly = false; // Cho phép nhập giá
                        calculatedPrice.style.display = 'block';
                        priceCalculationResult.textContent = `Giá thuê: ${formatVND(priceValue)}/tháng`;
                    } else {
                        priceTypeForm.hidden = false; // Hiện trường select đơn vị
                        if (selectedPriceType === '3') { // Nếu là "Thỏa thuận"
                            priceInput.readOnly = true; // Vô hiệu hóa nhập giá
                            priceInput.value = 0; // Đặt giá trị về 0
                            calculatedPrice.style.display = 'none'; // Ẩn thông báo giá
                        } else {
                            priceInput.readOnly = false; // Kích hoạt lại ô nhập giá
                            if (selectedPriceType === '1') { // VND
                                calculatedPrice.style.display = 'block';
                                const pricePerSquareMeter = priceValue / areaValue;
                                priceCalculationResult.textContent = `Giá trên m2: ${formatVND(pricePerSquareMeter)}`;
                            } else if (selectedPriceType === '2') { // m2
                                calculatedPrice.style.display = 'block';
                                const totalPrice = priceValue * areaValue;
                                priceCalculationResult.textContent = `Tổng giá bất động sản: ${formatVND(totalPrice)}`;
                            }
                        }
                    }
                }

                // Gắn sự kiện
                priceTypeSelect.addEventListener('change', updatePriceInfo);
                priceInput.addEventListener('input', updatePriceInfo);
                areaInput.addEventListener('input', updatePriceInfo);
                dealTypeSelect.addEventListener('change', updatePriceInfo);

                // Kích hoạt logic ban đầu nếu đã có giá trị
                dealTypeSelect.dispatchEvent(new Event('change'));
            });

            document.addEventListener('DOMContentLoaded', function() {
                const previewContainer = document.getElementById('image-preview-container');
                const previewImage = document.getElementById('image-preview');
                const imageInput = document.getElementById('image');

                // Hiển thị ảnh mặc định khi mở form
                if (previewImage.src && previewImage.src !== 'https://placehold.co/600x400') {
                    previewContainer.style.display = 'block'; // Hiển thị ảnh nếu có ảnh mặc định
                }

                // Lắng nghe sự kiện change khi người dùng chọn ảnh mới
                imageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            previewImage.src = e.target.result; // Cập nhật src của ảnh mới
                            previewContainer.style.display = 'block'; // Hiển thị khu vực xem trước
                        };

                        reader.readAsDataURL(file); // Đọc tệp ảnh và chuyển đổi thành URL để hiển thị
                    } else {
                        // Nếu không có tệp ảnh mới, kiểm tra xem có ảnh cũ không
                        if (previewImage.src) {
                            previewContainer.style.display = 'block'; // Giữ ảnh cũ hiển thị
                        } else {
                            previewContainer.style.display = 'none'; // Ẩn khu vực xem trước nếu không có ảnh
                        }
                    }
                });
            });
        </script>
    @endsection
