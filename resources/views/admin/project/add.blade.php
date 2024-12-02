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
                        <h3>Thêm Dự Án</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Dự Án</li>
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

                                {{-- Form thêm dự án --}}
                                <form action="{{ route('admin.project.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên Dự Án</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Địa Điểm</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            value="{{ old('location') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="handover_date" class="form-label">Ngày Bàn Giao</label>
                                        <input type="date" class="form-control" id="handover_date" name="handover_date"
                                            value="{{ old('handover_date') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Tình Trạng</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Đang
                                                tiến hành</option>
                                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                                Đã hoàn thành</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô Tả</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội Dung Chi Tiết</label>
                                        <div id="summernote" class="form-control" name="content">{{ old('content') }}</div>
                                    </div>
                                    <input type="hidden" name="content" id="content">
                                    <button type="submit" class="btn btn-primary">Thêm Dự Án</button>
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
        </script>
    @endsection
